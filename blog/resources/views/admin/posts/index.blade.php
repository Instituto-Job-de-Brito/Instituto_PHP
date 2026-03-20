@php($title = 'Posts — Admin')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Admin de posts">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Admin</p>
        <h1 class="page-title">Posts</h1>
        <p class="page-subtitle">Crie, edite e publique posts sem escrever código.</p>
      </header>

      <div class="hero__actions reveal" style="margin-top: 16px;">
        <a class="btn btn--solid" href="{{ route('admin.posts.create') }}">Novo post</a>
        <a class="btn btn--outline" href="{{ route('blog.index') }}">Abrir Blog</a>
        <form method="post" action="{{ route('admin.logout') }}">
          @csrf
          <button class="btn btn--outline" type="submit">Sair</button>
        </form>
      </div>
    </div>
  </section>

  <section class="section page" aria-label="Lista de posts (admin)">
    <div class="container">
      <div class="cards">
        @foreach ($posts as $post)
          <article class="card reveal">
            <p class="card__tag">
              @if ($post->published_at)
                Publicado em {{ $post->published_at->format('d/m/Y H:i') }}
              @else
                Rascunho
              @endif
            </p>
            <h2 class="card__title" style="font-size:1.6rem;">{{ $post->title }}</h2>
            @if ($post->excerpt)
              <p class="card__text">{{ $post->excerpt }}</p>
            @endif

            <div class="hero__actions" style="margin: 14px 0 0;">
              <a class="btn btn--outline" href="{{ route('admin.posts.edit', $post) }}">Editar</a>

              @if ($post->published_at)
                <form method="post" action="{{ route('admin.posts.unpublish', $post) }}">
                  @csrf
                  <button class="btn btn--outline" type="submit">Despublicar</button>
                </form>
                <a class="btn btn--solid" href="{{ route('blog.show', $post) }}" target="_blank" rel="noreferrer">Ver</a>
              @else
                <form method="post" action="{{ route('admin.posts.publish', $post) }}">
                  @csrf
                  <button class="btn btn--solid" type="submit">Publicar</button>
                </form>
              @endif

              <form method="post" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Remover este post?');">
                @csrf
                @method('delete')
                <button class="btn btn--outline" type="submit">Remover</button>
              </form>
            </div>
          </article>
        @endforeach
      </div>

      @include('partials.pager', ['paginator' => $posts])
    </div>
  </section>
@endsection
