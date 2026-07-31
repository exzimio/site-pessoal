@extends('admin.layout')

@section('title', 'Nova tecnologia')

@section('content')
  <div class="mb-6">
    <a href="{{ route('admin.technologies.index') }}" class="text-sm text-muted transition-colors hover:text-accent">← Tecnologias</a>
  </div>

  <h1 class="mb-8 font-display text-2xl font-semibold">Nova tecnologia</h1>

  <form method="POST" action="{{ route('admin.technologies.store') }}" class="card mx-auto max-w-xl space-y-6 p-6 sm:p-8">
    @csrf
    @include('admin.technologies._form')
    <button type="submit" class="btn btn-primary">Criar tecnologia</button>
  </form>
@endsection
