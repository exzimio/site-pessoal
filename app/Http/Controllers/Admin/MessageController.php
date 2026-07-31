<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MessageController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->string('status')->toString();
        $q = $request->string('q')->toString();

        $messages = Message::query()
            ->status($status ?: null)
            ->search($q ?: null)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $counts = [
            'all' => Message::count(),
            'new' => Message::where('status', 'new')->count(),
            'read' => Message::where('status', 'read')->count(),
            'replied' => Message::where('status', 'replied')->count(),
            'spam' => Message::where('status', 'spam')->count(),
        ];

        return view('admin.messages.index', compact('messages', 'counts', 'status', 'q'));
    }

    public function show(Message $message): View
    {
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function updateStatus(Request $request, Message $message): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:'.implode(',', Message::STATUSES)],
        ]);

        $message->update(['status' => $data['status']]);

        return back()->with('status', 'Estado atualizado.');
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('status', 'Mensagem apagada.');
    }

    public function export(Request $request): StreamedResponse
    {
        $status = $request->string('status')->toString();
        $q = $request->string('q')->toString();

        $filename = 'mensagens-'.now()->format('Y-m-d').'.csv';

        return response()->streamDownload(function () use ($status, $q) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // BOM para o Excel ler o UTF-8
            fputcsv($out, [
                'id', 'nome', 'email', 'empresa', 'tipo', 'orcamento',
                'mensagem', 'estado', 'idioma', 'ip', 'rgpd_em', 'criada_em',
            ], ';');

            Message::query()
                ->status($status ?: null)
                ->search($q ?: null)
                ->latest()
                ->chunk(200, function ($chunk) use ($out) {
                    foreach ($chunk as $message) {
                        fputcsv($out, [
                            $message->id,
                            $message->name,
                            $message->email,
                            $message->company,
                            $message->project_type,
                            $message->budget,
                            $message->body,
                            $message->status,
                            $message->locale,
                            $message->ip_address,
                            optional($message->rgpd_consent_at)->toDateTimeString(),
                            optional($message->created_at)->toDateTimeString(),
                        ], ';');
                    }
                });

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
