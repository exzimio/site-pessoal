@extends('admin.layout')

@section('title', 'Mensagens')

@section('content')
  <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="font-display text-2xl font-semibold">Mensagens</h1>
      <p class="mt-1 text-sm text-muted">Pedidos que chegaram pelo formulário de contacto.</p>
    </div>
    <a
      href="{{ route('admin.messages.export', array_filter(['status' => $status ?: null, 'q' => $q ?: null])) }}"
      class="btn btn-ghost text-sm"
    >
      Exportar CSV
    </a>
  </div>

  <form method="GET" action="{{ route('admin.messages.index') }}" class="mb-6 flex flex-col gap-3 sm:flex-row">
    <input
      type="search"
      name="q"
      value="{{ $q }}"
      placeholder="Pesquisar por nome, email ou texto…"
      class="field sm:max-w-sm"
    />
    <select name="status" class="field sm:w-44">
      <option value="">Todos os estados</option>
      @foreach (['new' => 'Novas', 'read' => 'Lidas', 'replied' => 'Respondidas', 'spam' => 'Spam'] as $value => $label)
        <option value="{{ $value }}" @selected($status === $value)>{{ $label }} ({{ $counts[$value] }})</option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Filtrar</button>
  </form>

  <p class="mb-4 text-xs text-subtle">{{ $counts['all'] }} no total · {{ $counts['new'] }} por ler</p>

  @if ($messages->isEmpty())
    <p class="text-sm text-muted">Nenhuma mensagem com estes critérios.</p>
  @else
    <div class="overflow-x-auto rounded-xl border border-line">
      <table class="w-full min-w-[640px] text-left text-sm">
        <thead class="border-b border-line bg-bg-soft text-xs uppercase tracking-wider text-subtle">
          <tr>
            <th class="px-4 py-3 font-medium">De</th>
            <th class="px-4 py-3 font-medium">Assunto</th>
            <th class="px-4 py-3 font-medium">Estado</th>
            <th class="px-4 py-3 font-medium">Data</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-line">
          @foreach ($messages as $message)
            <tr class="transition-colors hover:bg-surface">
              <td class="px-4 py-3 align-top">
                <a href="{{ route('admin.messages.show', $message) }}" class="font-medium hover:text-accent">
                  @if ($message->isNew())
                    <span class="mr-1.5 inline-block h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                  @endif
                  {{ $message->name }}
                </a>
                <p class="mt-0.5 text-xs text-muted">{{ $message->email }}</p>
              </td>
              <td class="px-4 py-3 align-top text-muted">
                <a href="{{ route('admin.messages.show', $message) }}" class="hover:text-fg">
                  {{ \Illuminate\Support\Str::limit($message->body, 70) }}
                </a>
                @if ($message->project_type)
                  <p class="mt-1 text-xs text-subtle">{{ $message->project_type }}</p>
                @endif
              </td>
              <td class="px-4 py-3 align-top">
                <span class="text-xs uppercase tracking-wider text-subtle">{{ $message->status }}</span>
              </td>
              <td class="px-4 py-3 align-top text-xs text-subtle whitespace-nowrap">
                {{ $message->created_at->format('d/m/Y H:i') }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      {{ $messages->links() }}
    </div>
  @endif
@endsection
