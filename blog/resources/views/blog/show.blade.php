@php($title = $post->title . ' — Blog')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Post do blog">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Blog</p>
        <h1 class="page-title">{{ $post->title }}</h1>
        <p class="page-subtitle">
          Publicado em {{ optional($post->published_at)->format('d/m/Y') }}
        </p>
      </header>
    </div>
  </section>

  <section class="section page" aria-label="Conteúdo do post">
    <div class="container page-grid">
      <article class="page-article">
        @if ($post->excerpt)
          <div class="block block--decor reveal">
            <h2 class="block__title">Resumo</h2>
            <p>{{ $post->excerpt }}</p>
          </div>
        @endif

        <div class="block reveal">
          <div class="prose">
            {!! $post->body !!}
          </div>
        </div>

        <div class="home-cta reveal">
          <a class="arrow-link" href="{{ route('blog.index') }}">← Voltar para o Blog</a>
        </div>
      </article>

      <aside class="page-aside reveal" aria-label="Ações">
        <div class="aside-card">
          <p class="aside-card__kicker">Instituto Job</p>
          <p class="aside-card__title">Blog</p>
          <p class="aside-card__text">Publicações com método, sem pressa e com clareza.</p>
          <a class="arrow-link" href="/contato.php">Falar com o Instituto →</a>
        </div>
      </aside>
    </div>
  </section>
@endsection
