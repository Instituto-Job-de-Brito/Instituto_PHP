@php($title = 'Novo post — Admin')
@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="row">
      <h1 style="margin:0;">Novo post</h1>
      <a class="btn right" href="{{ route('admin.posts.index') }}">Voltar</a>
    </div>

    <form method="post" action="{{ route('admin.posts.store') }}">
      @csrf
      @include('admin.posts.form')

      <div class="row" style="margin-top: 14px;">
        <button class="btn" type="submit">Salvar</button>
      </div>
    </form>
  </div>
@endsection

