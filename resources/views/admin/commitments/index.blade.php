@extends('admin.layout')

@section('title', 'Compromissos')

@section('content')
  <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="font-display text-2xl font-semibold">Compromissos</h1>
      <p class="mt-1 text-sm text-muted">Pontos da secção de parceria.</p>
    </div>
    <a href="{{ route('admin.commitments.create') }}" class="btn btn-primary text-sm">Novo compromisso</a>
  </div>

  @if ($commitments->isEmpty())
    <p class="text-sm text-muted">Ainda não há compromissos.</p>
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
          @foreach ($commitments as $commitment)
            <tr class="transition-colors hover:bg-surface">
              <td class="px-4 py-3">
                <a href="{{ route('admin.commitments.edit', $commitment) }}" class="font-medium hover:text-accent">
                  {{ $commitment->t('title', 'pt') ?: '—' }}
                </a>
                <p class="mt-0.5 text-xs text-muted">{{ $commitment->t('label', 'pt') }}</p>
              </td>
              <td class="px-4 py-3 text-muted">{{ $commitment->sort_order }}</td>
              <td class="px-4 py-3">
                <span class="text-xs uppercase tracking-wider {{ $commitment->is_active ? 'text-accent' : 'text-subtle' }}">
                  {{ $commitment->is_active ? 'Ativo' : 'Inativo' }}
                </span>
              </td>
              <td class="px-4 py-3 text-right whitespace-nowrap">
                <a href="{{ route('admin.commitments.edit', $commitment) }}" class="text-sm text-muted hover:text-accent">Editar</a>
                <form method="POST" action="{{ route('admin.commitments.destroy', $commitment) }}" class="ml-3 inline" onsubmit="return confirm('Apagar este compromisso?')">
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
