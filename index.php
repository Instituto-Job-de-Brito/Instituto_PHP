<?php
// Home com seções resumidas e links para páginas internas.
$pageTitle = 'Instituto Job — Pesquisa e Educação';
$pageDescription = 'Instituto Job de Pesquisa e Educação — Jataí, Goiás. Educação com rigor. Pesquisa com propósito.';
$ogTitle = 'Instituto Job de Pesquisa e Educação';
$ogDescription = $pageDescription;
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>

<section class="section hero" id="inicio" aria-label="Início">
  <!-- Ruído sutil (SVG inline) -->
  <svg class="hero-noise" width="0" height="0" aria-hidden="true" focusable="false">
    <filter id="noiseFilter">
      <feTurbulence type="fractalNoise" baseFrequency="0.85" numOctaves="3" stitchTiles="stitch" />
      <feColorMatrix type="saturate" values="0" />
    </filter>
  </svg>

  <div class="hero__bg" aria-hidden="true"></div>

  <div class="container hero__inner">
    <div class="hero__copy">
      <p class="kicker hero__kicker reveal">Instituto Job de Pesquisa e Educação</p>

      <h1 class="hero__title" aria-label="Instituto Job de Pesquisa e Educação">
        <span class="headline-line is-animated" style="--d: 0ms;">Instituto Job</span>
        <span class="headline-line is-animated" style="--d: 120ms;">de Pesquisa</span>
        <span class="headline-line is-animated" style="--d: 240ms;">e Educação</span>
      </h1>

      <p class="hero__subtitle reveal">Educação com rigor. <em>Pesquisa com propósito.</em></p>

      <div class="hero__actions reveal">
        <a class="btn btn--outline" href="sobre.php">Conheça o Instituto</a>
        <a class="btn btn--solid" href="revista.php">Acesse a Revista</a>
      </div>

      <div class="hero__meta reveal">
        <span class="meta-pill">Jataí — Goiás</span>
        <span class="meta-dot" aria-hidden="true"></span>
        <span class="meta-pill">Brasil</span>
      </div>
    </div>

    <!-- Elemento visual: mapa conceitual (SVG) assimétrico -->
    <div class="hero__visual" aria-hidden="true">
      <svg class="concept-map" viewBox="0 0 720 520" role="img" aria-label="">
        <defs>
          <linearGradient id="gGold" x1="0" x2="1" y1="0" y2="1">
            <stop offset="0" stop-color="#e2c47a" stop-opacity="0.55" />
            <stop offset="1" stop-color="#c9a84c" stop-opacity="0.22" />
          </linearGradient>
          <filter id="softGlow" x="-20%" y="-20%" width="140%" height="140%">
            <feGaussianBlur stdDeviation="2" result="blur" />
            <feMerge>
              <feMergeNode in="blur" />
              <feMergeNode in="SourceGraphic" />
            </feMerge>
          </filter>
        </defs>
        <g fill="none" stroke="url(#gGold)" stroke-width="1.2" opacity="0.75" filter="url(#softGlow)">
          <path d="M78 130 L210 78 L340 138 L455 92 L610 148" />
          <path d="M120 260 L250 210 L350 260 L470 206 L600 274" />
          <path d="M165 392 L305 340 L410 400 L545 332" />
          <path d="M210 78 L250 210" />
          <path d="M340 138 L350 260" />
          <path d="M455 92 L470 206" />
          <path d="M305 340 L250 210" />
          <path d="M410 400 L350 260" />
          <path d="M545 332 L470 206" />
        </g>
        <g fill="#c9a84c" opacity="0.6">
          <circle cx="210" cy="78" r="3" />
          <circle cx="340" cy="138" r="3" />
          <circle cx="455" cy="92" r="3" />
          <circle cx="610" cy="148" r="3" />
          <circle cx="250" cy="210" r="3" />
          <circle cx="350" cy="260" r="3" />
          <circle cx="470" cy="206" r="3" />
          <circle cx="600" cy="274" r="3" />
          <circle cx="305" cy="340" r="3" />
          <circle cx="410" cy="400" r="3" />
          <circle cx="545" cy="332" r="3" />
        </g>
        <g opacity="0.14" stroke="#c9a84c" stroke-width="1">
          <path d="M30 40 H690" />
          <path d="M30 120 H690" />
          <path d="M30 200 H690" />
          <path d="M30 280 H690" />
          <path d="M30 360 H690" />
          <path d="M30 440 H690" />
          <path d="M100 20 V500" />
          <path d="M220 20 V500" />
          <path d="M340 20 V500" />
          <path d="M460 20 V500" />
          <path d="M580 20 V500" />
        </g>
      </svg>
    </div>

    <div class="scroll-indicator" aria-hidden="true">
      <span class="scroll-indicator__line"></span>
    </div>
  </div>
</section>

<section class="section about" aria-label="Sobre o Instituto">
  <div class="container about__inner">
    <div class="about__copy">
      <header class="section-head reveal">
        <p class="kicker">Sobre</p>
        <h2 class="section-title">Um instituto com memória — e método.</h2>
      </header>

      <div class="prose reveal">
        <p>O Instituto Job de Pesquisa e Educação nasce como homenagem a Job de Brito e como compromisso com uma ideia simples: rigor intelectual e integridade pessoal caminham juntos.</p>
        <p>Produzimos e difundimos conhecimento com seriedade, sem abrir mão da clareza — em cursos, pesquisas e publicações científicas.</p>
      </div>

      <a class="arrow-link reveal" href="sobre.php">Saiba mais sobre o Instituto →</a>
    </div>

    <aside class="quote reveal" aria-label="Citação em destaque">
      <p class="quote__text">“Nomear um instituto em sua memória é um ato de coerência.”</p>
      <p class="quote__by">— Instituto Job</p>
    </aside>
  </div>
</section>

<section class="section journal" aria-label="Revista RCBC">
  <div class="container">
    <header class="section-head reveal">
      <p class="kicker">Revista</p>
      <h2 class="section-title section-title--rule">Revista Científica Benedito Coscia (RCBC)</h2>
      <p class="section-lead">Publicação científica do Instituto Job: rigor metodológico, clareza editorial e circulação responsável do conhecimento.</p>
    </header>

    <div class="home-journal reveal">
      <p class="home-journal__p">A RCBC está em fase final de preparação. Em breve, o primeiro volume estará disponível e as submissões serão abertas.</p>
      <p class="home-journal__p">Enquanto isso, organizamos diretrizes, fluxo de avaliação por pares e padrões de referência com atenção aos detalhes.</p>
      <span class="pill pill--gold">Lançamento em breve</span>
    </div>

    <div class="home-cta reveal">
      <a class="arrow-link" href="revista.php">Conheça a Revista →</a>
    </div>
  </div>
</section>

<section class="section courses" aria-label="Cursos">
  <div class="container">
    <header class="section-head reveal">
      <p class="kicker">Cursos</p>
      <h2 class="section-title">Metodologia, plataforma e cuidado.</h2>
      <p class="section-lead">Estamos construindo uma plataforma própria de ensino: acessível, intuitiva e pedagogicamente sólida.</p>
    </header>

    <div class="prose reveal">
      <p>Assumimos compromisso com o <strong>ECA Digital</strong> e com cursos para todas as idades — com proteção, inclusão e ética como premissas, não como “extras”.</p>
    </div>

    <div class="home-cta reveal">
      <a class="arrow-link" href="cursos.php">Saiba mais sobre os Cursos →</a>
    </div>
  </div>
</section>

<section class="section contact" aria-label="Contato">
  <div class="container contact__inner contact__inner--simple">
    <div class="contact__info reveal">
      <header class="section-head">
        <p class="kicker">Contato</p>
        <h2 class="section-title">Uma mensagem bem escrita começa aqui.</h2>
      </header>
      <p class="section-lead">Fale diretamente com o Instituto. Responderemos com atenção e objetividade.</p>
      <p class="contact-line reveal"><span class="label">E-mail</span><br /><a href="mailto:mateus@institutojob.com.br">mateus@institutojob.com.br</a></p>
      <a class="arrow-link reveal" href="contato.php">Entre em contato →</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
