<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\SyncsTranslations;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    use SyncsTranslations;

    public function index(): View
    {
        $projects = Project::query()
            ->with('translations')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        $project = new Project([
            'status' => 'published',
            'sort_order' => 0,
            'year' => (int) date('Y'),
        ]);
        $project->setRelation('translations', collect());

        return view('admin.projects.create', [
            'project' => $project,
            'technologies' => Technology::query()->orderBy('sort_order')->orderBy('name')->get(),
            'selectedTech' => [],
            'locales' => self::LOCALES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $project = Project::create($data['attrs']);
        $this->syncTranslations($project, $data['translations']);
        $project->technologies()->sync($data['technologies']);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Projeto criado.');
    }

    public function edit(Project $project): View
    {
        $project->load(['translations', 'technologies']);

        $selectedTech = $project->technologies
            ->mapWithKeys(fn ($tech) => [$tech->id => (int) $tech->pivot->sort_order])
            ->all();

        return view('admin.projects.edit', [
            'project' => $project,
            'technologies' => Technology::query()->orderBy('sort_order')->orderBy('name')->get(),
            'selectedTech' => $selectedTech,
            'locales' => self::LOCALES,
        ]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $this->validated($request, $project);

        $project->update($data['attrs']);
        $this->syncTranslations($project, $data['translations']);
        $project->technologies()->sync($data['technologies']);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Projeto atualizado.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Projeto apagado.');
    }

    private function validated(Request $request, ?Project $project = null): array
    {
        $validated = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:120',
                Rule::unique('projects', 'slug')->ignore($project?->id)->whereNull('deleted_at'),
            ],
            'category' => ['required', 'in:'.implode(',', Project::CATEGORIES)],
            'media_key' => ['required', 'in:'.implode(',', Project::MEDIA_KEYS)],
            'year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:65535'],
            'status' => ['required', 'in:draft,published'],
            'technology_ids' => ['nullable', 'array'],
            'technology_ids.*' => ['integer', 'exists:technologies,id'],
            'sort_orders' => ['nullable', 'array'],
            'sort_orders.*' => ['nullable', 'integer', 'min:0', 'max:65535'],
            ...$this->localeRules([
                'badge' => ['required', 'string', 'max:120'],
                'title' => ['required', 'string', 'max:255'],
                'subtitle' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'media_alt' => ['nullable', 'string', 'max:255'],
            ]),
        ]);

        $translations = [];
        foreach (self::LOCALES as $locale) {
            $row = $validated['translations'][$locale];
            $translations[$locale] = [
                'badge' => $row['badge'],
                'title' => $row['title'],
                'subtitle' => $row['subtitle'],
                'description' => $row['description'],
                'media_alt' => $row['media_alt'] ?: null,
            ];
        }

        $technologies = [];
        foreach ($validated['technology_ids'] ?? [] as $id) {
            $technologies[(int) $id] = [
                'sort_order' => (int) ($validated['sort_orders'][$id] ?? 0),
            ];
        }

        return [
            'attrs' => [
                'slug' => Str::slug($validated['slug']),
                'category' => $validated['category'],
                'media_key' => $validated['media_key'],
                'year' => (int) $validated['year'],
                'sort_order' => (int) $validated['sort_order'],
                'status' => $validated['status'],
            ],
            'translations' => $translations,
            'technologies' => $technologies,
        ];
    }
}
