@extends('admin.layout')

@section('title', $message->name)

@section('content')
  <div class="mb-6">
    <a href="{{ route('admin.messages.index') }}" class="text-sm text-muted transition-colors hover:text-accent">← Mensagens</a>
  </div>

  <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div>
      <h1 class="font-display text-2xl font-semibold">{{ $message->name }}</h1>
      <p class="mt-1 text-sm text-muted">
        <a href="mailto:{{ $message->email }}" class="hover:text-accent">{{ $message->email }}</a>
        @if ($message->company)
          · {{ $message->company }}
        @endif
      </p>
      <p class="mt-2 text-xs text-subtle">
        Recebida em {{ $message->created_at->format('d/m/Y') }} às {{ $message->created_at->format('H:i') }}
        @if ($message->locale)
          · idioma {{ strtoupper($message->locale) }}
        @endif
      </p>
    </div>

    <form method="POST" action="{{ route('admin.messages.status', $message) }}" class="flex flex-wrap items-center gap-2">
      @csrf
      @method('PATCH')
      <label class="sr-only" for="status">Estado</label>
      <select id="status" name="status" class="field w-auto">
        @foreach (['new' => 'Nova', 'read' => 'Lida', 'replied' => 'Respondida', 'spam' => 'Spam'] as $value => $label)
          <option value="{{ $value }}" @selected($message->status === $value)>{{ $label }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-ghost text-sm">Guardar estado</button>
    </form>
  </div>

  <div class="grid gap-6 lg:grid-cols-[1fr_16rem]">
    <article class="card p-6 sm:p-8">
      <dl class="grid gap-4 text-sm sm:grid-cols-2">
        <div>
          <dt class="text-xs uppercase tracking-wider text-subtle">Tipo de projeto</dt>
          <dd class="mt-1">{{ $message->project_type ?: '—' }}</dd>
        </div>
        <div>
          <dt class="text-xs uppercase tracking-wider text-subtle">Orçamento</dt>
          <dd class="mt-1">{{ $message->budget ?: '—' }}</dd>
        </div>
      </dl>

      <div class="rule my-6" aria-hidden="true"></div>

      <h2 class="text-xs font-semibold uppercase tracking-wider text-subtle">Mensagem</h2>
      <p class="mt-3 whitespace-pre-wrap text-base leading-relaxed text-muted">{{ $message->body }}</p>

      <div class="mt-8">
        <a
          href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: o seu pedido de projeto') }}"
          class="btn btn-primary"
        >
          Responder por email
        </a>
      </div>
    </article>

    <aside class="space-y-4 text-sm">
      <div class="card p-5">
        <h2 class="text-xs font-semibold uppercase tracking-wider text-subtle">Metadados</h2>
        <dl class="mt-4 space-y-3 text-muted">
          <div>
            <dt class="text-xs text-subtle">IP</dt>
            <dd class="mt-0.5 font-mono text-xs">{{ $message->ip_address ?: '—' }}</dd>
          </div>
          <div>
            <dt class="text-xs text-subtle">Consentimento RGPD</dt>
            <dd class="mt-0.5">{{ $message->rgpd_consent_at?->format('d/m/Y H:i') ?: '—' }}</dd>
          </div>
          <div>
            <dt class="text-xs text-subtle">User agent</dt>
            <dd class="mt-0.5 break-all text-xs">{{ \Illuminate\Support\Str::limit($message->user_agent, 120) ?: '—' }}</dd>
          </div>
        </dl>
      </div>

      <form
        method="POST"
        action="{{ route('admin.messages.destroy', $message) }}"
        onsubmit="return confirm('Apagar esta mensagem?')"
      >
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full rounded-lg border border-red-500/30 px-4 py-2.5 text-sm text-red-400 transition-colors hover:bg-red-500/10">
          Apagar mensagem
        </button>
      </form>
    </aside>
  </div>
@endsection
