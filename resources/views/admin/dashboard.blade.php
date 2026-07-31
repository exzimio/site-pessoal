@extends('admin.layout')

@section('title', 'Painel')

@section('content')
  <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="font-display text-2xl font-semibold">Painel</h1>
      <p class="mt-1 text-sm text-muted">Resumo do conteúdo e das mensagens.</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-ghost text-sm">Ver mensagens</a>
  </div>

  <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    @foreach ([
      'services' => ['label' => 'Serviços', 'route' => 'admin.services.index'],
      'projects' => ['label' => 'Projetos', 'route' => 'admin.projects.index'],
      'commitments' => ['label' => 'Compromissos', 'route' => 'admin.commitments.index'],
      'messages' => ['label' => 'Mensagens', 'route' => 'admin.messages.index'],
    ] as $key => $item)
      <a href="{{ route($item['route']) }}" class="card block p-5 transition-colors hover:border-accent/40">
        <p class="text-xs uppercase tracking-wider text-subtle">{{ $item['label'] }}</p>
        <p class="mt-2 font-display text-3xl font-semibold {{ $key === 'messages' && $counts['new'] > 0 ? 'text-accent' : '' }}">
          {{ $counts[$key] }}
        </p>
        @if ($key === 'messages' && $counts['new'] > 0)
          <p class="mt-1 text-xs text-accent">{{ $counts['new'] }} novas</p>
        @endif
      </a>
    @endforeach
  </div>

  <section class="mt-10">
    <h2 class="text-sm font-semibold uppercase tracking-wider text-subtle">Últimas mensagens</h2>

    @if ($latest->isEmpty())
      <p class="mt-4 text-sm text-muted">Ainda não chegou nenhuma mensagem.</p>
    @else
      <ul class="mt-4 divide-y divide-line rounded-xl border border-line">
        @foreach ($latest as $message)
          <li>
            <a href="{{ route('admin.messages.show', $message) }}" class="flex flex-col gap-1 px-4 py-4 transition-colors hover:bg-surface sm:flex-row sm:items-center sm:justify-between">
              <div class="min-w-0">
                <p class="truncate font-medium">
                  @if ($message->isNew())
                    <span class="mr-2 inline-block h-1.5 w-1.5 rounded-full bg-accent" aria-hidden="true"></span>
                  @endif
                  {{ $message->name }}
                  <span class="font-normal text-muted">· {{ $message->email }}</span>
                </p>
                <p class="mt-1 truncate text-sm text-muted">{{ \Illuminate\Support\Str::limit($message->body, 90) }}</p>
              </div>
              <time class="shrink-0 text-xs text-subtle" datetime="{{ $message->created_at->toIso8601String() }}">
                {{ $message->created_at->timezone(config('app.timezone'))->format('d/m/Y H:i') }}
              </time>
            </a>
          </li>
        @endforeach
      </ul>
    @endif
  </section>
@endsection
