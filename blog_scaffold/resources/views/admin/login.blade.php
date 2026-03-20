@php($title = 'Login — Admin')
@extends('layouts.app')

@section('content')
  <div class="card">
    <h1>Entrar no Admin</h1>
    <p class="muted">Use as credenciais do `.env` (`BLOG_ADMIN_USER` e `BLOG_ADMIN_PASSWORD`).</p>

    <form method="post" action="{{ route('admin.login.post') }}">
      @csrf

      <label for="user">Usuário</label>
      <input id="user" name="user" value="{{ old('user', 'admin') }}" autocomplete="username" required>
      @error('user')<div class="muted" style="margin-top:6px;">{{ $message }}</div>@enderror

      <label for="password">Senha</label>
      <input id="password" type="password" name="password" autocomplete="current-password" required>
      @error('password')<div class="muted" style="margin-top:6px;">{{ $message }}</div>@enderror

      <div class="row" style="margin-top:14px;">
        <button class="btn" type="submit">Entrar</button>
        <a class="btn" href="{{ route('blog.index') }}">Voltar</a>
      </div>
    </form>
  </div>
@endsection

