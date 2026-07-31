@extends('admin.layout')

@section('title', 'Editar projeto')

@section('content')
  <div class="mb-6">
    <a href="{{ route('admin.projects.index') }}" class="text-sm text-muted transition-colors hover:text-accent">← Projetos</a>
  </div>

  <h1 class="mb-8 font-display text-2xl font-semibold">Editar projeto</h1>

  <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="card mx-auto max-w-3xl space-y-6 p-6 sm:p-8">
    @csrf
    @method('PUT')
    @include('admin.projects._form')
    <button type="submit" class="btn btn-primary">Guardar alterações</button>
  </form>
@endsection
