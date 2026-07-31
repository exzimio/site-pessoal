@extends('admin.layout')

@section('title', 'Entrar')

@section('content')
  <div class="mx-auto max-w-md pt-12">
    <div class="mb-8 text-center">
      <span class="mx-auto grid h-11 w-11 place-items-center rounded-lg bg-accent font-display text-lg font-bold text-accent-contrast">A</span>
      <h1 class="mt-5 font-display text-2xl font-semibold">Backoffice</h1>
      <p class="mt-2 text-sm text-muted">Só tu tens acesso a esta área.</p>
    </div>

    <form method="POST" action="{{ route('admin.login.store') }}" class="card space-y-5 p-6 sm:p-8">
      @csrf

      <div>
        <label class="label" for="email">Email</label>
        <input
          class="field"
          type="email"
          id="email"
          name="email"
          value="{{ old('email') }}"
          required
          autocomplete="username"
          autofocus
        />
        @error('email')
          <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="label" for="password">Palavra-passe</label>
        <input
          class="field"
          type="password"
          id="password"
          name="password"
          required
          autocomplete="current-password"
        />
      </div>

      <label class="flex items-center gap-2 text-sm text-muted">
        <input type="checkbox" name="remember" value="1" class="rounded border-line-strong accent-[var(--accent)]" @checked(old('remember')) />
        Manter sessão
      </label>

      <button type="submit" class="btn btn-primary w-full">Entrar</button>
    </form>
  </div>
@endsection
