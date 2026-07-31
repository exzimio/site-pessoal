<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    private const ICONS = ['monitor', 'code', 'database', 'cart', 'wrench'];

    private const LOCALES = ['pt', 'en', 'es'];

    public function index(): View
    {
        $services = Service::query()
            ->with('translations')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        $service = new Service(['is_active' => true, 'sort_order' => 0]);
        $service->setRelation('translations', collect());

        return view('admin.services.create', [
            'service' => $service,
            'icons' => self::ICONS,
            'locales' => self::LOCALES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $service = Service::create($data['attrs']);
        $this->syncTranslations($service, $data['translations']);

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Serviço criado.');
    }

    public function edit(Service $service): View
    {
        $service->load('translations');

        return view('admin.services.edit', [
            'service' => $service,
            'icons' => self::ICONS,
            'locales' => self::LOCALES,
        ]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request, $service);

        $service->update($data['attrs']);
        $this->syncTranslations($service, $data['translations']);

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Serviço atualizado.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Serviço apagado.');
    }

    private function validated(Request $request, ?Service $service = null): array
    {
        $validated = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:120',
                Rule::unique('services', 'slug')->ignore($service?->id)->whereNull('deleted_at'),
            ],
            'icon' => ['required', 'in:'.implode(',', self::ICONS)],
            'price_euros' => ['required', 'numeric', 'min:0'],
            'is_monthly' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:65535'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['required', 'array'],
            'translations.pt.title' => ['required', 'string', 'max:255'],
            'translations.pt.description' => ['required', 'string'],
            'translations.pt.bullets' => ['nullable', 'string'],
            'translations.pt.duration_label' => ['nullable', 'string', 'max:120'],
            'translations.en.title' => ['required', 'string', 'max:255'],
            'translations.en.description' => ['required', 'string'],
            'translations.en.bullets' => ['nullable', 'string'],
            'translations.en.duration_label' => ['nullable', 'string', 'max:120'],
            'translations.es.title' => ['required', 'string', 'max:255'],
            'translations.es.description' => ['required', 'string'],
            'translations.es.bullets' => ['nullable', 'string'],
            'translations.es.duration_label' => ['nullable', 'string', 'max:120'],
        ]);

        $attrs = [
            'slug' => Str::slug($validated['slug']),
            'icon' => $validated['icon'],
            'price_cents' => (int) round(((float) $validated['price_euros']) * 100),
            'is_monthly' => $request->boolean('is_monthly'),
            'sort_order' => (int) $validated['sort_order'],
            'is_active' => $request->boolean('is_active'),
        ];

        $translations = [];
        foreach (self::LOCALES as $locale) {
            $row = $validated['translations'][$locale];
            $translations[$locale] = [
                'title' => $row['title'],
                'description' => $row['description'],
                'bullets' => $this->parseBullets($row['bullets'] ?? ''),
                'duration_label' => $row['duration_label'] ?: null,
            ];
        }

        return compact('attrs', 'translations');
    }

    private function syncTranslations(Service $service, array $translations): void
    {
        foreach ($translations as $locale => $fields) {
            $service->translations()->updateOrCreate(
                ['locale' => $locale],
                $fields
            );
        }
    }

    private function parseBullets(string $text): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $text) ?: [])
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}
