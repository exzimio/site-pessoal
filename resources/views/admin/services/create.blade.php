@extends('admin.layout')

@section('title', 'Novo serviço')

@section('content')
  <div class="mb-6">
    <a href="{{ route('admin.services.index') }}" class="text-sm text-muted transition-colors hover:text-accent">← Serviços</a>
  </div>

  <h1 class="mb-8 font-display text-2xl font-semibold">Novo serviço</h1>

  <form method="POST" action="{{ route('admin.services.store') }}" class="card mx-auto max-w-3xl space-y-6 p-6 sm:p-8">
    @csrf
    @include('admin.services._form')
    <button type="submit" class="btn btn-primary">Criar serviço</button>
  </form>
@endsection
