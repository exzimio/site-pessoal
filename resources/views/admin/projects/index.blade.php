@extends('admin.layout')

@section('title', 'Projetos')

@section('content')
  <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="font-display text-2xl font-semibold">Projetos</h1>
      <p class="mt-1 text-sm text-muted">Casos de trabalho no portefólio.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary text-sm">Novo projeto</a>
  </div>

  @if ($projects->isEmpty())
    <p class="text-sm text-muted">Ainda não há projetos.</p>
  @else
    <div class="overflow-x-auto rounded-xl border border-line">
      <table class="w-full min-w-[640px] text-left text-sm">
        <thead class="border-b border-line bg-bg-soft text-xs uppercase tracking-wider text-subtle">
          <tr>
            <th class="px-4 py-3 font-medium">Título (PT)</th>
            <th class="px-4 py-3 font-medium">Ordem</th>
            <th class="px-4 py-3 font-medium">Estado</th>
            <th class="px-4 py-3 font-medium text-right">Ações</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-line">
          @foreach ($projects as $project)
            <tr class="transition-colors hover:bg-surface">
              <td class="px-4 py-3">
                <a href="{{ route('admin.projects.edit', $project) }}" class="font-medium hover:text-accent">
                  {{ $project->t('title', 'pt') ?: '—' }}
                </a>
                <p class="mt-0.5 text-xs text-muted">{{ $project->slug }} · {{ $project->category }}</p>
              </td>
              <td class="px-4 py-3 text-muted">{{ $project->sort_order }}</td>
              <td class="px-4 py-3">
                <span class="text-xs uppercase tracking-wider {{ $project->status === 'published' ? 'text-accent' : 'text-subtle' }}">
                  {{ $project->status === 'published' ? 'Publicado' : 'Rascunho' }}
                </span>
              </td>
              <td class="px-4 py-3 text-right whitespace-nowrap">
                <a href="{{ route('admin.projects.edit', $project) }}" class="text-sm text-muted hover:text-accent">Editar</a>
                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="ml-3 inline" onsubmit="return confirm('Apagar este projeto?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-sm text-red-400 hover:text-red-300">Apagar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
