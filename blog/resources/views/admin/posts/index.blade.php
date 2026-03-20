@php($title = 'Posts — Admin Blog')
@extends('layouts.app')

@section('content')
  <section class="section page-hero page-hero--surface" aria-label="Admin de posts">
    <div class="container">
      <header class="section-head reveal">
        <p class="kicker">Painel Admin</p>
        <h1 class="page-title">Posts</h1>
        <p class="page-subtitle">Crie, edite e publique posts sem escrever código.</p>
      </header>

      <div class="hero__actions reveal" style="margin-top: 20px;">
        <a class="btn btn--solid" href="{{ route('admin.posts.create') }}">+ Novo post</a>
        <a class="btn btn--outline" href="{{ route('blog.index') }}" target="_blank" rel="noreferrer">Abrir Blog</a>
        <form method="post" action="{{ route('admin.logout') }}">
          @csrf
          <button class="btn btn--outline" type="submit">Sair</button>
        </form>
      </div>
    </div>
  </section>

  <section class="section page" aria-label="Lista de posts (admin)">
    <div class="container">

      @if ($posts->isEmpty())
        <div class="mission reveal">
          <p class="mission__text">Nenhum post ainda. Crie o primeiro!</p>
        </div>
      @else
        <div class="admin-post-list">
          @foreach ($posts as $post)
            <div class="admin-post-item reveal">
              <div class="admin-post-item__info">
                <span class="admin-post-item__status {{ $post->published_at ? 'admin-post-item__status--pub' : 'admin-post-item__status--draft' }}">
                  {{ $post->published_at ? 'Publicado' : 'Rascunho' }}
                </span>
                <h2 class="admin-post-item__title">{{ $post->title }}</h2>
                @if ($post->excerpt)
                  <p class="admin-post-item__excerpt">{{ $post->excerpt }}</p>
                @endif
                @if ($post->published_at)
                  <p class="admin-post-item__date">
                    {{ $post->published_at->format('d/m/Y \à\s H:i') }}
                  </p>
                @endif
              </div>

              <div class="admin-post-item__actions">
                <a class="btn btn--outline btn--sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>

                @if ($post->published_at)
                  <form method="post" action="{{ route('admin.posts.unpublish', $post) }}">
                    @csrf
                    <button class="btn btn--outline btn--sm" type="submit">Despublicar</button>
                  </form>
                  <a class="btn btn--solid btn--sm" href="{{ route('blog.show', $post) }}" target="_blank" rel="noreferrer">Ver →</a>
                @else
                  <form method="post" action="{{ route('admin.posts.publish', $post) }}">
                    @csrf
                    <button class="btn btn--solid btn--sm" type="submit">Publicar</button>
                  </form>
                @endif

                <form method="post" action="{{ route('admin.posts.destroy', $post) }}"
                      onsubmit="return confirm('Remover permanentemente: "{{ addslashes($post->title) }}"?')">
                  @csrf
                  @method('delete')
                  <button class="btn btn--outline btn--sm admin-btn-danger" type="submit">Remover</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      @endif

      @include('partials.pager', ['paginator' => $posts])
    </div>
  </section>

  @push('head')
  <style>
    .admin-post-list { display: grid; gap: 12px; }

    .admin-post-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      padding: 20px 22px;
      background: linear-gradient(180deg, rgba(16,24,40,.42), rgba(10,15,30,.2));
      border: 1px solid rgba(30,45,69,.7);
      border-radius: var(--radius);
      box-shadow: 0 8px 28px rgba(0,0,0,.2);
      transition: border-color .3s var(--ease), transform .3s var(--ease);
    }
    .admin-post-item:hover {
      border-color: rgba(201,168,76,.4);
      transform: translateY(-2px);
    }

    .admin-post-item__info { flex: 1; min-width: 0; }

    .admin-post-item__status {
      display: inline-block;
      font-family: var(--font-mono);
      font-size: .65rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      padding: 4px 10px;
      border-radius: 999px;
      margin-bottom: 8px;
    }
    .admin-post-item__status--pub {
      background: rgba(201,168,76,.15);
      border: 1px solid rgba(201,168,76,.5);
      color: rgba(226,196,122,.95);
    }
    .admin-post-item__status--draft {
      background: rgba(30,45,69,.45);
      border: 1px solid rgba(30,45,69,.75);
      color: rgba(138,154,181,.9);
    }

    .admin-post-item__title {
      margin: 0 0 6px;
      font-family: var(--font-titulos);
      font-weight: 500;
      font-size: 1.4rem;
      line-height: 1.15;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .admin-post-item__excerpt {
      margin: 0 0 4px;
      font-size: .92rem;
      color: rgba(232,228,220,.65);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .admin-post-item__date {
      margin: 0;
      font-family: var(--font-mono);
      font-size: .68rem;
      letter-spacing: .08em;
      color: rgba(138,154,181,.75);
    }

    .admin-post-item__actions {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      flex-shrink: 0;
    }
    .admin-btn-danger { color: rgba(232,100,100,.85); border-color: rgba(232,100,100,.35); }
    .admin-btn-danger:hover { border-color: rgba(232,100,100,.65); }

    @media (max-width: 700px) {
      .admin-post-item { flex-direction: column; align-items: flex-start; }
      .admin-post-item__title { white-space: normal; }
      .admin-post-item__excerpt { white-space: normal; }
    }
  </style>
  @endpush
@endsection
