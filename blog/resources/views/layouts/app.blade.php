@php
  $pageTitle       = $title ?? 'Blog — Instituto Job';
  $pageDescription = $description ?? 'Blog do Instituto Job de Pesquisa e Educação.';
  $isBlog          = request()->routeIs('blog.*');
  $site            = 'https://institutojob.com.br';
@endphp
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="{{ $pageDescription }}" />

  <meta property="og:title"       content="{{ $pageTitle }}" />
  <meta property="og:description" content="{{ $pageDescription }}" />
  <meta property="og:type"        content="website" />
  <meta property="og:url"         content="{{ url()->current() }}" />

  <title>{{ $pageTitle }}</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Playfair+Display:wght@400;500;600&family=Source+Serif+4:opsz,wght@8..60,300;8..60,400;8..60,600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" />

  {{-- CSS do site (copiado para public/ do blog) --}}
  <link rel="stylesheet" href="{{ asset('style.css') }}" />

  @stack('head')
</head>
<body>
  <a class="skip-link" href="#conteudo">Pular para o conteúdo</a>

  <header class="site-header" id="topo">
    <div class="container header-inner">
      <a class="brand" href="{{ $site }}" aria-label="Ir para o início">
        <span class="brand__top">
          <span class="brand__sigla" aria-hidden="true">IJPE</span>
        </span>
      </a>

      <nav class="nav" aria-label="Navegação principal">
        <a class="nav__link" href="{{ $site }}">Início</a>
        <a class="nav__link" href="{{ $site }}/sobre.php">Sobre</a>
        <a class="nav__link" href="{{ $site }}/revista.php">Revista</a>
        <a class="nav__link" href="{{ $site }}/cursos.php">Cursos</a>
        <a class="nav__link{{ $isBlog ? ' ativo' : '' }}" href="{{ route('blog.index') }}">Blog</a>
        <a class="nav__link" href="{{ $site }}/contato.php">Contato</a>
        @if (session('blog_admin'))
          <a class="nav__link" href="{{ route('admin.posts.index') }}">Admin</a>
        @endif
      </nav>

      <button class="hamburger" type="button" aria-label="Abrir menu" aria-controls="menuMobile" aria-expanded="false">
        <span class="hamburger__bar" aria-hidden="true"></span>
        <span class="hamburger__bar" aria-hidden="true"></span>
        <span class="hamburger__bar" aria-hidden="true"></span>
      </button>
    </div>

    <div class="mobile-menu" id="menuMobile" hidden>
      <div class="mobile-menu__panel" role="dialog" aria-modal="true" aria-label="Menu">
        <div class="mobile-menu__top">
          <div class="mobile-menu__brand">
            <span class="mobile-menu__sigla" aria-hidden="true">IJPE</span>
          </div>
          <button class="mobile-menu__close" type="button" aria-label="Fechar menu">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="mobile-menu__links">
          <a class="mobile-menu__link" href="{{ $site }}">Início</a>
          <a class="mobile-menu__link" href="{{ $site }}/sobre.php">Sobre</a>
          <a class="mobile-menu__link" href="{{ $site }}/revista.php">Revista RCBC</a>
          <a class="mobile-menu__link" href="{{ $site }}/cursos.php">Cursos</a>
          <a class="mobile-menu__link{{ $isBlog ? ' ativo' : '' }}" href="{{ route('blog.index') }}">Blog</a>
          <a class="mobile-menu__link" href="{{ $site }}/contato.php">Contato</a>
          @if (session('blog_admin'))
            <a class="mobile-menu__link" href="{{ route('admin.posts.index') }}">Admin</a>
          @endif
        </div>

        <div class="mobile-menu__foot">
          <p class="fineprint">Jataí — Goiás, Brasil</p>
        </div>
      </div>
      <button class="mobile-menu__backdrop" type="button" aria-label="Fechar menu"></button>
    </div>
  </header>

  <main id="conteudo">
    @if (session('status'))
      <div class="container" aria-label="Status" style="padding-top: calc(var(--header-h) + 18px);">
        <div class="mission">
          <p class="mission__text" style="margin:0;">{{ session('status') }}</p>
        </div>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <div class="footer-top">
        <div class="footer-brand">
          <span class="footer-brand__name">Instituto Job</span>
          <span class="footer-brand__sub">Pesquisa e Educação</span>
        </div>

        <div class="footer-links" aria-label="Links rápidos">
          <a href="{{ $site }}">Início</a>
          <a href="{{ $site }}/sobre.php">Sobre</a>
          <a href="{{ $site }}/revista.php">Revista</a>
          <a href="{{ $site }}/cursos.php">Cursos</a>
          <a href="{{ route('blog.index') }}">Blog</a>
          <a href="{{ $site }}/contato.php">Contato</a>
        </div>
      </div>

      <div class="footer-rule" aria-hidden="true"></div>

      <div class="footer-bottom">
        <p class="fineprint">© {{ date('Y') }} Instituto Job de Pesquisa e Educação</p>
        <p class="fineprint">Desenvolvido com rigor.</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('main.js') }}" defer></script>
  @stack('scripts')
</body>
</html>
