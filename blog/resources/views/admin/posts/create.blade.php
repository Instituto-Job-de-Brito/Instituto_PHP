@php($title = 'Novo post — Admin')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Novo post">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Admin</p>
        <h1 class="page-title">Novo post</h1>
        <p class="page-subtitle">Escreva e publique com editor visual.</p>
      </header>

      <div class="hero__actions reveal" style="margin-top: 16px;">
        <a class="btn btn--outline" href="{{ route('admin.posts.index') }}">Voltar</a>
      </div>
    </div>
  </section>

  <section class="section page" aria-label="Editor de post">
    <div class="container">
      <form class="form reveal" method="post" action="{{ route('admin.posts.store') }}">
        @csrf
        @include('admin.posts.form')

        <div class="form__actions" style="margin-top: 14px;">
          <button class="btn btn--solid" type="submit">Salvar</button>
        </div>
      </form>
    </div>
  </section>
@endsection
