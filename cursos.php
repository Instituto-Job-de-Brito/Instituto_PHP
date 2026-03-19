<?php
// Página: Cursos
$pageTitle = 'Cursos — Instituto Job';
$pageDescription = 'Cursos do Instituto Job de Pesquisa e Educação: metodologia, plataforma própria e compromisso com o ECA Digital. Em desenvolvimento.';
$ogTitle = 'Cursos — Instituto Job';
$ogDescription = $pageDescription;
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>

<section class="section page-hero" aria-label="Cursos">
  <div class="container">
    <header class="section-head reveal">
      <p class="kicker">Formação</p>
      <h1 class="page-title">Cursos</h1>
      <p class="page-subtitle">Conhecimento para todas as idades, com respeito e responsabilidade.</p>
    </header>
  </div>
</section>

<section class="section page" aria-label="Conteúdo de Cursos">
  <div class="container page-narrow">
    <div class="features">
      <div class="feature reveal">
        <div class="feature__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="22" height="22">
            <path d="M4 7.5c5-3 11-3 16 0v10c-5-3-11-3-16 0v-10Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
            <path d="M12 5v14" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
        </div>
        <div class="feature__body">
          <h2 class="block__title">Nossa metodologia</h2>
          <p>No Instituto Job de Pesquisa e Educação, acreditamos que a educação de qualidade começa pelo respeito a quem aprende. Nossa metodologia parte de três princípios: clareza na comunicação, progressão lógica do conteúdo e conexão entre teoria e prática.</p>
          <p>Não produzimos cursos para encher currículo. Produzimos para transformar compreensão.</p>
        </div>
      </div>

      <div class="feature reveal">
        <div class="feature__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="22" height="22">
            <path d="M7 7h10a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2Z" fill="none" stroke="currentColor" stroke-width="1.6"/>
            <path d="M9 11h6M9 14h6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
        </div>
        <div class="feature__body">
          <h2 class="block__title">A plataforma</h2>
          <p>Estamos desenvolvendo uma plataforma própria de ensino — pensada desde o início para ser acessível, intuitiva e pedagogicamente sólida. A plataforma contemplará cursos para diferentes faixas etárias e perfis de aprendizado, com atenção especial à inclusão digital e à experiência do estudante.</p>
        </div>
      </div>

      <div class="feature reveal">
        <div class="feature__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="22" height="22">
            <path d="M12 3l7 4v6c0 5-3.5 8-7 8s-7-3-7-8V7l7-4Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
            <path d="M9.5 12.2l1.6 1.7 3.6-3.8" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="feature__body">
          <h2 class="block__title">ECA Digital</h2>
          <p>Todos os nossos cursos voltados ao público infantil e juvenil são desenvolvidos com respeito integral ao <strong>Estatuto da Criança e do Adolescente (ECA)</strong> e às diretrizes de proteção digital. Acreditamos que ambientes de aprendizado online devem ser seguros, éticos e adequados à faixa etária — sem exceções.</p>
        </div>
      </div>
    </div>

    <div class="dev-note reveal">
      <span class="pill pill--gold">Em desenvolvimento</span>
      <p class="dev-note__p">Os primeiros cursos serão anunciados quando a plataforma estiver pronta. Acompanhe nossas redes sociais para ser o primeiro a saber.</p>
      <a class="btn btn--outline" href="https://instagram.com/institutojob" target="_blank" rel="noopener noreferrer">Acompanhe o Instagram do Instituto</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
