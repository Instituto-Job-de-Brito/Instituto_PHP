@php($title = 'Blog — Instituto Job')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Blog do Instituto">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Publicações</p>
        <h1 class="page-title">Blog</h1>
        <p class="page-subtitle">Artigos e notas do Instituto Job — com rigor e clareza.</p>
      </header>
    </div>
  </section>

  <section class="section page" aria-label="Lista de posts">
    <div class="container">
      <div class="cards">
        @forelse ($posts as $post)
          <article class="card reveal">
            <p class="card__tag">
              {{ optional($post->published_at)->format('d/m/Y') }}
            </p>
            <h2 class="card__title">
              <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
            </h2>
            @if ($post->excerpt)
              <p class="card__text">{{ $post->excerpt }}</p>
            @endif
            <a class="card__link" href="{{ route('blog.show', $post) }}">Ler post →</a>
          </article>
        @empty
          <article class="card reveal">
            <p class="card__text">Ainda não há posts publicados.</p>
          </article>
        @endforelse
      </div>

      @include('partials.pager', ['paginator' => $posts])
    </div>
  </section>
@endsection
