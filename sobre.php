<?php
// Página: Sobre
$pageTitle = 'Sobre — Instituto Job';
$pageDescription = 'Sobre o Instituto Job de Pesquisa e Educação: origem do nome, missão, visão e valores. Jataí, Goiás — Brasil.';
$ogTitle = 'Sobre o Instituto Job';
$ogDescription = $pageDescription;
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>

<section class="section page-hero" aria-label="Sobre o Instituto">
  <div class="container">
    <header class="section-head reveal">
      <p class="kicker">Instituto</p>
      <h1 class="page-title">Sobre o Instituto</h1>
      <p class="page-subtitle">Educação com rigor. <em>Pesquisa com propósito.</em></p>
    </header>
  </div>
</section>

<section class="section page" aria-label="Conteúdo Sobre">
  <div class="container page-grid">
    <article class="page-article">
      <div class="block block--decor reveal">
        <h2 class="block__title">A origem do nome</h2>
        <p>O Instituto Job de Pesquisa e Educação leva o nome de Job de Brito, um homem simples, trabalhador e referência de caráter ético. Não um acadêmico, não um homem de títulos — mas alguém cuja vida ensinou, pelo exemplo, o valor da honestidade, do esforço e da responsabilidade. Nomear um instituto de educação e pesquisa em sua memória é um ato de coerência: acreditamos que o rigor intelectual e a integridade pessoal caminham juntos.</p>
      </div>

      <div class="block reveal">
        <h2 class="block__title">Missão</h2>
        <p>Nossa missão é produzir e difundir conhecimento com seriedade — sem abrir mão da clareza. Desenvolvemos cursos, pesquisas e publicações científicas voltados para educadores, pesquisadores e profissionais que entendem que aprender bem exige esforço, mas não precisa ser inacessível.</p>
      </div>

      <blockquote class="blockquote reveal" aria-label="Missão destacada">
        <p>Promover educação de qualidade e pesquisa acadêmica rigorosa, com compromisso ético e foco na transformação real de quem aprende.</p>
      </blockquote>

      <div class="block reveal">
        <h2 class="block__title">Visão</h2>
        <p>Ser uma referência regional em produção de conhecimento acessível, ético e tecnicamente sólido.</p>
      </div>

      <div class="block reveal">
        <h2 class="block__title">Valores</h2>
        <p>Nosso trabalho é guiado pelo rigor intelectual, pela ética e pela transparência. Acreditamos que o conhecimento deve ser acessível sem perder profundidade, e que o compromisso com a transformação de quem aprende é o critério mais honesto para avaliar qualquer proposta educacional.</p>
      </div>
    </article>

    <aside class="page-aside reveal" aria-label="Nota lateral">
      <div class="aside-card">
        <p class="aside-card__kicker">Instituto Job</p>
        <p class="aside-card__title">Jataí — Goiás</p>
        <p class="aside-card__text">Um trabalho local, com ambição intelectual. Sem pressa. Com método.</p>
        <a class="arrow-link" href="contato.php">Falar com o Instituto →</a>
      </div>
    </aside>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

