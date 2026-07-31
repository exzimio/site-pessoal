@extends('admin.layout')

@section('title', 'Tecnologias')

@section('content')
  <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="font-display text-2xl font-semibold">Tecnologias</h1>
      <p class="mt-1 text-sm text-muted">Stack e tags dos projetos.</p>
    </div>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary text-sm">Nova tecnologia</a>
  </div>

  @if ($technologies->isEmpty())
    <p class="text-sm text-muted">Ainda não há tecnologias.</p>
  @else
    <div class="overflow-x-auto rounded-xl border border-line">
      <table class="w-full min-w-[640px] text-left text-sm">
        <thead class="border-b border-line bg-bg-soft text-xs uppercase tracking-wider text-subtle">
          <tr>
            <th class="px-4 py-3 font-medium">Nome</th>
            <th class="px-4 py-3 font-medium">Ordem</th>
            <th class="px-4 py-3 font-medium">Estado</th>
            <th class="px-4 py-3 font-medium text-right">Ações</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-line">
          @foreach ($technologies as $technology)
            <tr class="transition-colors hover:bg-surface">
              <td class="px-4 py-3">
                <a href="{{ route('admin.technologies.edit', $technology) }}" class="font-medium hover:text-accent">
                  {{ $technology->name }}
                </a>
                <p class="mt-0.5 text-xs text-muted">{{ $technology->slug }} · {{ $technology->icon }}</p>
              </td>
              <td class="px-4 py-3 text-muted">{{ $technology->sort_order }}</td>
              <td class="px-4 py-3">
                <span class="text-xs uppercase tracking-wider {{ $technology->show_in_stack ? 'text-accent' : 'text-subtle' }}">
                  {{ $technology->show_in_stack ? 'Na stack' : 'Oculta' }}
                </span>
              </td>
              <td class="px-4 py-3 text-right whitespace-nowrap">
                <a href="{{ route('admin.technologies.edit', $technology) }}" class="text-sm text-muted hover:text-accent">Editar</a>
                <form method="POST" action="{{ route('admin.technologies.destroy', $technology) }}" class="ml-3 inline" onsubmit="return confirm('Apagar esta tecnologia?')">
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
