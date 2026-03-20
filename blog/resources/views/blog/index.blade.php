@php($title = 'Blog — Instituto Job')
@extends('layouts.app')

@section('content')
  {{-- Hero --}}
  <section class="section page-hero page-hero--surface" aria-label="Blog do Instituto">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Publicações</p>
        <h1 class="page-title">Blog</h1>
        <p class="page-subtitle">Artigos e notas do Instituto Job — <em>com rigor e clareza.</em></p>
      </header>
    </div>
  </section>

  {{-- Lista de posts --}}
  <section class="section page" aria-label="Lista de posts">
    <div class="container">

      @forelse ($posts as $post)
        <article class="blog-post-row reveal">
          <div class="blog-post-row__meta">
            <time class="blog-post-row__date" datetime="{{ optional($post->published_at)->toDateString() }}">
              {{ optional($post->published_at)->format('d/m/Y') }}
            </time>
          </div>

          <div class="blog-post-row__body">
            <h2 class="blog-post-row__title">
              <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
            </h2>
            @if ($post->excerpt)
              <p class="blog-post-row__excerpt">{{ $post->excerpt }}</p>
            @endif
            <a class="arrow-link" href="{{ route('blog.show', $post) }}" aria-label="Ler: {{ $post->title }}">
              Ler artigo →
            </a>
          </div>
        </article>
      @empty
        <div class="mission reveal">
          <p class="mission__text">Ainda não há posts publicados. Em breve, novos conteúdos.</p>
        </div>
      @endforelse

      @include('partials.pager', ['paginator' => $posts])
    </div>
  </section>

  @push('head')
  <style>
    .blog-post-row {
      display: grid;
      grid-template-columns: 100px 1fr;
      gap: 24px;
      align-items: start;
      padding: 28px 0;
      border-bottom: 1px solid rgba(30,45,69,.55);
    }
    .blog-post-row:first-of-type { border-top: 1px solid rgba(30,45,69,.55); }

    .blog-post-row__meta {
      padding-top: 6px;
    }
    .blog-post-row__date {
      font-family: var(--font-mono);
      font-size: .72rem;
      letter-spacing: .1em;
      color: rgba(138,154,181,.9);
      text-transform: uppercase;
      display: block;
      line-height: 1.4;
    }

    .blog-post-row__title {
      margin: 0 0 10px;
      font-family: var(--font-titulos);
      font-weight: 500;
      font-size: clamp(1.45rem, 2.4vw, 2rem);
      line-height: 1.1;
    }
    .blog-post-row__title a {
      transition: color .25s var(--ease);
    }
    .blog-post-row__title a:hover { color: var(--cor-ouro-claro); }

    .blog-post-row__excerpt {
      margin: 0 0 12px;
      color: rgba(232,228,220,.78);
      font-size: 1.02rem;
      max-width: 68ch;
    }

    @media (max-width: 600px) {
      .blog-post-row {
        grid-template-columns: 1fr;
        gap: 6px;
      }
      .blog-post-row__meta { padding-top: 0; }
    }
  </style>
  @endpush
@endsection
