<?php
// Página: Contato
$pageTitle = 'Contato — Instituto Job';
$pageDescription = 'Contato do Instituto Job de Pesquisa e Educação. Jataí, Goiás, Brasil — institutojob.com.br.';
$ogTitle = 'Contato — Instituto Job';
$ogDescription = $pageDescription;
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>

<section class="section page-hero" aria-label="Contato">
  <div class="container">
    <header class="section-head reveal">
      <p class="kicker">Contato</p>
      <h1 class="page-title">Contato</h1>
      <p class="page-subtitle">Fale com o Instituto</p>
    </header>
  </div>
</section>

<section class="section contact" aria-label="Fale com o Instituto">
  <div class="container contact__inner">
    <div class="contact__info reveal">
      <p class="section-lead">Estamos em Jataí, mas o conhecimento não tem fronteiras.</p>

      <div class="contact-lines">
        <p><span class="label">E-mail</span><br /><a href="mailto:mateus@institutojob.com.br">mateus@institutojob.com.br</a></p>
        <p><span class="label">Instagram</span><br /><a href="https://instagram.com/institutojob" target="_blank" rel="noopener noreferrer">@institutojob</a></p>
        <p><span class="label">Localização</span><br />Jataí, Goiás, Brasil</p>
      </div>

      <div class="map reveal" aria-label="Mapa de Jataí, Goiás">
        <iframe
          title="Mapa — Jataí, Goiás"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps?q=-17.8792,-51.7158&z=12&output=embed"
          width="100%"
          height="320"
          style="border:0;"
          allowfullscreen=""
        ></iframe>
      </div>
    </div>

    <div class="contact__form reveal">
      <form class="form" id="contactForm" action="enviar-contato.php" method="post" novalidate>
        <div class="field">
          <label for="nome">Nome</label>
          <input id="nome" name="nome" type="text" autocomplete="name" required placeholder="Seu nome" />
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" autocomplete="email" required placeholder="seuemail@exemplo.com" />
        </div>
        <div class="field">
          <label for="mensagem">Mensagem</label>
          <textarea id="mensagem" name="mensagem" rows="6" required placeholder="Escreva sua mensagem com clareza."></textarea>
        </div>

        <div class="form__actions">
          <button class="btn btn--solid" id="contactSubmit" type="submit">
            <span class="btn__text">Enviar mensagem</span>
            <span class="btn__spinner" aria-hidden="true"></span>
          </button>
          <p class="form__status" id="contactStatus" role="status" aria-live="polite"></p>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
