@php($title = 'Posts — Admin')
@extends('layouts.app')

@section('content')
  <div class="row" style="margin-bottom: 12px;">
    <h1 style="margin:0;">Posts</h1>
    <a class="btn right" href="{{ route('admin.posts.create') }}">Novo post</a>
    <form method="post" action="{{ route('admin.logout') }}">
      @csrf
      <button class="btn" type="submit">Sair</button>
    </form>
  </div>

  <div class="grid">
    @foreach ($posts as $post)
      <div class="card">
        <div class="row">
          <strong>{{ $post->title }}</strong>
          <span class="right muted">
            @if ($post->published_at)
              Publicado em {{ $post->published_at->format('d/m/Y H:i') }}
            @else
              Rascunho
            @endif
          </span>
        </div>

        <div class="row" style="margin-top: 12px;">
          <a class="btn" href="{{ route('admin.posts.edit', $post) }}">Editar</a>

          @if ($post->published_at)
            <form method="post" action="{{ route('admin.posts.unpublish', $post) }}">
              @csrf
              <button class="btn" type="submit">Despublicar</button>
            </form>
            <a class="btn" href="{{ route('blog.show', $post) }}" target="_blank" rel="noreferrer">Ver</a>
          @else
            <form method="post" action="{{ route('admin.posts.publish', $post) }}">
              @csrf
              <button class="btn" type="submit">Publicar</button>
            </form>
          @endif

          <form method="post" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Remover este post?');">
            @csrf
            @method('delete')
            <button class="btn" type="submit">Remover</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

  <div class="pagination">
    {{ $posts->links() }}
  </div>
@endsection

