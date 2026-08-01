<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\SyncsTranslations;
use App\Http\Controllers\Controller;
use App\Models\Commitment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommitmentController extends Controller
{
    use SyncsTranslations;

    public function index(): View
    {
        $commitments = Commitment::query()
            ->with('translations')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.commitments.index', compact('commitments'));
    }

    public function create(): View
    {
        $commitment = new Commitment(['is_active' => true, 'sort_order' => 0]);
        $commitment->setRelation('translations', collect());

        return view('admin.commitments.create', [
            'commitment' => $commitment,
            'locales' => self::LOCALES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $commitment = Commitment::create($data['attrs']);
        $this->syncTranslations($commitment, $data['translations']);

        return redirect()
            ->route('admin.commitments.index')
            ->with('status', 'Compromisso criado.');
    }

    public function edit(Commitment $commitment): View
    {
        $commitment->load('translations');

        return view('admin.commitments.edit', [
            'commitment' => $commitment,
            'locales' => self::LOCALES,
        ]);
    }

    public function update(Request $request, Commitment $commitment): RedirectResponse
    {
        $data = $this->validated($request);

        $commitment->update($data['attrs']);
        $this->syncTranslations($commitment, $data['translations']);

        return redirect()
            ->route('admin.commitments.index')
            ->with('status', 'Compromisso atualizado.');
    }

    public function destroy(Commitment $commitment): RedirectResponse
    {
        $commitment->delete();

        return redirect()
            ->route('admin.commitments.index')
            ->with('status', 'Compromisso apagado.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'sort_order' => ['required', 'integer', 'min:0', 'max:65535'],
            'is_active' => ['nullable', 'boolean'],
            ...$this->localeRules([
                'label' => ['required', 'string', 'max:120'],
                'title' => ['required', 'string', 'max:255'],
                'subtitle' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
            ]),
        ]);

        $translations = [];
        foreach (self::LOCALES as $locale) {
            $row = $validated['translations'][$locale];
            $translations[$locale] = [
                'label' => $row['label'],
                'title' => $row['title'],
                'subtitle' => $row['subtitle'],
                'body' => $row['body'],
            ];
        }

        return [
            'attrs' => [
                'sort_order' => (int) $validated['sort_order'],
                'is_active' => $request->boolean('is_active'),
            ],
            'translations' => $translations,
        ];
    }
}
