<?php
// Página: Revista
$pageTitle = 'Revista RCBC — Instituto Job';
$pageDescription = 'Revista Científica Benedito Coscia (RCBC), publicação científica do Instituto Job de Pesquisa e Educação. Lançamento em breve.';
$ogTitle = 'Revista Científica Benedito Coscia — RCBC';
$ogDescription = $pageDescription;
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>

<section class="section page-hero page-hero--surface" aria-label="Revista RCBC">
  <div class="container">
    <header class="section-head reveal">
      <p class="kicker">Publicação</p>
      <h1 class="page-title">Revista Científica Benedito Coscia — RCBC</h1>
      <p class="page-subtitle">Publicação científica do Instituto Job de Pesquisa e Educação</p>
    </header>
  </div>
</section>

<section class="section page page--surface" aria-label="Conteúdo da Revista">
  <div class="container">
    <div class="page-narrow">
      <div class="block reveal">
        <h2 class="block__title">O que é a RCBC</h2>
        <p>A Revista Científica Benedito Coscia (RCBC) é uma publicação acadêmica vinculada ao Instituto Job de Pesquisa e Educação. Nasce com o compromisso de divulgar pesquisas originais, revisões de literatura e estudos de caso nas áreas de educação, pedagogia, tecnologia educacional e ciências humanas aplicadas.</p>
        <p>A RCBC valoriza o rigor metodológico e a clareza na comunicação científica — acreditando que pesquisa séria não precisa ser inacessível ao leitor não especializado.</p>
      </div>

      <div class="cards cards--two">
        <article class="card reveal">
          <p class="card__tag">Para Pesquisadores</p>
          <h3 class="card__title">Submissões</h3>
          <p class="card__text">Diretrizes de submissão e processo de avaliação por pares estarão disponíveis em breve.</p>
          <a class="card__link" href="contato.php">Fale com a editoria</a>
        </article>

        <article class="card reveal">
          <p class="card__tag">Para Leitores</p>
          <h3 class="card__title">Leitura e acesso</h3>
          <p class="card__text">Edições, dossiês e artigos selecionados — com experiência de leitura e metadados bem cuidados.</p>
          <a class="card__link" href="contato.php">Receber novidades</a>
        </article>
      </div>

      <div class="launch reveal" aria-label="Lançamento">
        <span class="launch__badge">
          <span class="launch__icon" aria-hidden="true">⌁</span>
          <span class="launch__text">Lançamento em breve</span>
        </span>
        <p class="launch__p">A RCBC está em fase final de preparação. O lançamento oficial está previsto para em breve, com a publicação do primeiro volume e abertura das submissões.</p>
      </div>

      <div class="center reveal">
        <button class="btn btn--disabled" type="button" disabled aria-disabled="true">Acessar a Revista (em breve)</button>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

