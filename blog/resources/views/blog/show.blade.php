@php($title = $post->title . ' — Blog Instituto Job')
@extends('layouts.app')

@section('content')
  {{-- Hero do post --}}
  <section class="section page-hero page-hero--surface" aria-label="Post do blog">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Blog</p>
        <h1 class="page-title">{{ $post->title }}</h1>
        <p class="page-subtitle">
          Publicado em
          <time datetime="{{ optional($post->published_at)->toDateString() }}">
            {{ optional($post->published_at)->format('d \d\e F \d\e Y') }}
          </time>
        </p>
      </header>
    </div>
  </section>

  {{-- Conteúdo --}}
  <section class="section page" aria-label="Conteúdo do post">
    <div class="container page-grid">

      <article class="page-article">

        @if ($post->excerpt)
          <div class="post-summary reveal">
            <p class="post-summary__text">{{ $post->excerpt }}</p>
          </div>
        @endif

        <div class="post-body reveal">
          <div class="prose">
            {!! $post->body !!}
          </div>
        </div>

        <div class="post-footer reveal">
          <div class="post-footer__rule" aria-hidden="true"></div>
          <a class="arrow-link" href="{{ route('blog.index') }}">← Voltar para o Blog</a>
        </div>
      </article>

      <aside class="page-aside reveal" aria-label="Sobre o Instituto">
        <div class="aside-card">
          <p class="aside-card__kicker">Instituto Job</p>
          <p class="aside-card__title">Pesquisa e Educação</p>
          <p class="aside-card__text">Publicações com método, sem pressa e com clareza.</p>
          <a class="arrow-link" href="/contato.php">Falar com o Instituto →</a>
        </div>

        <div class="aside-card" style="margin-top: 16px;">
          <p class="aside-card__kicker">Explore</p>
          <p class="aside-card__title" style="font-size:1.3rem;">Mais artigos</p>
          <a class="arrow-link" href="{{ route('blog.index') }}">Ver todos os posts →</a>
        </div>
      </aside>

    </div>
  </section>

  @push('head')
  <style>
    /* Resumo destacado */
    .post-summary {
      border-left: 4px solid rgba(201,168,76,.9);
      background: rgba(26,58,92,.28);
      border-radius: var(--radius);
      padding: 18px 20px;
      margin-bottom: 32px;
    }
    .post-summary__text {
      margin: 0;
      font-family: var(--font-sub);
      font-size: 1.18rem;
      font-style: italic;
      color: rgba(232,228,220,.92);
      line-height: 1.5;
    }

    /* Corpo do post */
    .post-body { margin-bottom: 32px; }

    .prose { font-size: 1.07rem; line-height: 1.72; color: rgba(232,228,220,.88); }
    .prose p  { margin: 0 0 18px; }
    .prose h2 { font-family: var(--font-titulos); font-weight: 500; font-size: 1.9rem; margin: 36px 0 14px; color: var(--cor-texto); line-height: 1.1; }
    .prose h3 { font-family: var(--font-titulos); font-weight: 500; font-size: 1.45rem; margin: 28px 0 10px; color: var(--cor-texto); }
    .prose h4 { font-family: var(--font-mono); font-size: .85rem; letter-spacing: .1em; text-transform: uppercase; margin: 22px 0 8px; color: rgba(138,154,181,.95); }
    .prose a  { color: rgba(226,196,122,.92); text-decoration: underline; text-underline-offset: 3px; }
    .prose a:hover { color: rgba(226,196,122,1); }
    .prose strong { color: rgba(232,228,220,.98); font-weight: 600; }
    .prose em { color: rgba(226,196,122,.88); font-style: italic; }
    .prose ul, .prose ol { margin: 0 0 18px; padding-left: 22px; }
    .prose li { margin-bottom: 6px; }
    .prose blockquote {
      margin: 0 0 22px;
      padding: 16px 18px;
      background: rgba(26,58,92,.38);
      border-left: 5px solid rgba(201,168,76,.9);
      border-radius: var(--radius);
      font-family: var(--font-sub);
      font-style: italic;
      font-size: 1.12rem;
      color: rgba(232,228,220,.92);
    }
    .prose blockquote p { margin: 0; }
    .prose pre {
      background: rgba(10,15,30,.55);
      border: 1px solid rgba(30,45,69,.72);
      border-radius: 12px;
      padding: 16px 18px;
      overflow-x: auto;
      margin: 0 0 20px;
      font-family: var(--font-mono);
      font-size: .88rem;
      color: rgba(226,196,122,.88);
    }
    .prose code {
      font-family: var(--font-mono);
      font-size: .88em;
      color: rgba(226,196,122,.88);
      background: rgba(10,15,30,.45);
      padding: 2px 6px;
      border-radius: 6px;
    }
    .prose pre code { background: none; padding: 0; color: inherit; }
    .prose hr {
      border: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(201,168,76,.35), transparent);
      margin: 32px 0;
    }
    .prose img {
      max-width: 100%;
      border-radius: var(--radius);
      border: 1px solid rgba(30,45,69,.65);
      margin: 8px 0 18px;
    }

    /* Rodapé do post */
    .post-footer { margin-top: 8px; }
    .post-footer__rule {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(201,168,76,.28), transparent);
      margin-bottom: 20px;
    }
  </style>
  @endpush
@endsection
