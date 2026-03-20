@php($title = 'Editar post — Admin')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Editar post">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Admin</p>
        <h1 class="page-title">Editar</h1>
        <p class="page-subtitle">Ajuste o texto e publique quando quiser.</p>
      </header>

      <div class="hero__actions reveal" style="margin-top: 16px;">
        <a class="btn btn--outline" href="{{ route('admin.posts.index') }}">Voltar</a>
        <a class="btn btn--solid" href="{{ route('blog.show', $post) }}" target="_blank" rel="noreferrer">Abrir público</a>
      </div>
    </div>
  </section>

  <section class="section page" aria-label="Editor de post (editar)">
    <div class="container">
      <form class="form reveal" method="post" action="{{ route('admin.posts.update', $post) }}">
        @csrf
        @method('put')
        @include('admin.posts.form', ['post' => $post])

        <div class="form__actions" style="margin-top: 14px;">
          <button class="btn btn--solid" type="submit">Salvar</button>
        </div>
      </form>
    </div>
  </section>
@endsection
