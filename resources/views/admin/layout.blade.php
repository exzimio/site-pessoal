<!DOCTYPE html>
<html lang="pt-PT" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Backoffice') · Alexandre Magno</title>
    @vite(['resources/css/app.css'])
  </head>
  <body class="min-h-svh bg-bg text-fg antialiased">
    @auth
      <header class="border-b border-line">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
          <div class="flex items-center gap-6">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 text-sm font-semibold">
              <span class="grid h-8 w-8 place-items-center rounded-lg bg-accent font-display text-sm font-bold text-accent-contrast">A</span>
              <span>Backoffice</span>
            </a>
            <nav class="hidden items-center gap-4 text-sm sm:flex">
              <a href="{{ route('admin.dashboard') }}" class="text-muted transition-colors hover:text-fg {{ request()->routeIs('admin.dashboard') ? 'text-fg' : '' }}">Painel</a>
              <a href="{{ route('admin.messages.index') }}" class="text-muted transition-colors hover:text-fg {{ request()->routeIs('admin.messages.*') ? 'text-fg' : '' }}">Mensagens</a>
              <a href="{{ route('home') }}" class="text-muted transition-colors hover:text-fg" target="_blank" rel="noopener">Ver site</a>
            </nav>
          </div>
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="text-sm text-muted transition-colors hover:text-fg">Sair</button>
          </form>
        </div>
      </header>
    @endauth

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6">
      @if (session('status'))
        <p class="mb-6 rounded-lg border border-accent/30 bg-accent/10 px-4 py-3 text-sm text-accent">
          {{ session('status') }}
        </p>
      @endif

      @yield('content')
    </main>
  </body>
</html>
