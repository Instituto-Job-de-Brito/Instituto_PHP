@php($title = 'Editar post — Admin')
@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="row">
      <h1 style="margin:0;">Editar</h1>
      <a class="btn right" href="{{ route('admin.posts.index') }}">Voltar</a>
    </div>

    <form method="post" action="{{ route('admin.posts.update', $post) }}">
      @csrf
      @method('put')
      @include('admin.posts.form', ['post' => $post])

      <div class="row" style="margin-top: 14px;">
        <button class="btn" type="submit">Salvar</button>
        <a class="btn" href="{{ route('blog.show', $post) }}" target="_blank" rel="noreferrer">Abrir público</a>
      </div>
    </form>
  </div>
@endsection

