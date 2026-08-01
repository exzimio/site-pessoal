<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request): JsonResponse
    {
        // honeypot: fingir sucesso
        if (filled($request->input('_gotcha'))) {
            return response()->json(['ok' => true]);
        }

        Message::create([
            'name' => $request->string('nome')->trim()->toString(),
            'email' => $request->string('email')->trim()->lower()->toString(),
            'company' => $request->filled('empresa')
                ? $request->string('empresa')->trim()->toString()
                : null,
            'project_type' => $request->input('tipo'),
            'budget' => $request->input('orcamento'),
            'body' => $request->string('mensagem')->trim()->toString(),
            'status' => 'new',
            'locale' => $request->route('locale')
                ?? $request->input('locale', 'pt'),
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
            'rgpd_consent_at' => now(),
        ]);

        return response()->json(['ok' => true]);
    }
}
