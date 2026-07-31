<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    private const ICONS = [
        'html5', 'css3', 'javascript', 'php', 'python', 'mysql',
        'api', 'json', 'ajax', 'git', 'tailwind', 'terminal',
    ];

    public function index(): View
    {
        $technologies = Technology::query()
            ->withCount('projects')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    public function create(): View
    {
        return view('admin.technologies.create', [
            'technology' => new Technology(['show_in_stack' => true, 'sort_order' => 0]),
            'icons' => self::ICONS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        Technology::create($data);

        return redirect()
            ->route('admin.technologies.index')
            ->with('status', 'Tecnologia criada.');
    }

    public function edit(Technology $technology): View
    {
        return view('admin.technologies.edit', [
            'technology' => $technology,
            'icons' => self::ICONS,
        ]);
    }

    public function update(Request $request, Technology $technology): RedirectResponse
    {
        $data = $this->validated($request, $technology);

        $technology->update($data);

        return redirect()
            ->route('admin.technologies.index')
            ->with('status', 'Tecnologia atualizada.');
    }

    public function destroy(Technology $technology): RedirectResponse
    {
        $technology->projects()->detach();
        $technology->delete();

        return redirect()
            ->route('admin.technologies.index')
            ->with('status', 'Tecnologia apagada.');
    }

    private function validated(Request $request, ?Technology $technology = null): array
    {
        $validated = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:120',
                Rule::unique('technologies', 'slug')->ignore($technology?->id),
            ],
            'name' => ['required', 'string', 'max:120'],
            'icon' => ['required', 'in:'.implode(',', self::ICONS)],
            'sort_order' => ['required', 'integer', 'min:0', 'max:65535'],
            'show_in_stack' => ['nullable', 'boolean'],
        ]);

        return [
            'slug' => Str::slug($validated['slug']),
            'name' => $validated['name'],
            'icon' => $validated['icon'],
            'sort_order' => (int) $validated['sort_order'],
            'show_in_stack' => $request->boolean('show_in_stack'),
        ];
    }
}
