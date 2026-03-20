@php($title = 'Login — Admin')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Admin do blog">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Admin</p>
        <h1 class="page-title">Entrar</h1>
        <p class="page-subtitle">Use as credenciais do `.env` (`BLOG_ADMIN_USER` e `BLOG_ADMIN_PASSWORD`).</p>
      </header>
    </div>
  </section>

  <section class="section page" aria-label="Formulário de login">
    <div class="container">
      <form class="form reveal" method="post" action="{{ route('admin.login.post') }}">
        @csrf

        <div class="field">
          <label for="user">Usuário</label>
          <input id="user" name="user" value="{{ old('user', 'admin') }}" autocomplete="username" required>
          @error('user')<p class="fineprint">{{ $message }}</p>@enderror
        </div>

        <div class="field">
          <label for="password">Senha</label>
          <input id="password" type="password" name="password" autocomplete="current-password" required>
          @error('password')<p class="fineprint">{{ $message }}</p>@enderror
        </div>

        <div class="form__actions">
          <button class="btn btn--solid" type="submit">Entrar</button>
          <a class="btn btn--outline" href="{{ route('blog.index') }}">Voltar ao Blog</a>
        </div>
      </form>
    </div>
  </section>
@endsection
