<?php
/**
 * Navegação principal (header fixo + menu mobile).
 * PHP puro, sem dependências.
 */
?>

<?php
// Detecta página atual para marcar link ativo.
$current = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$isActive = static function (string $file) use ($current): string {
  return $current === $file ? ' ativo' : '';
};
?>

<header class="site-header" id="topo">
  <div class="container header-inner">
    <a class="brand" href="index.php" aria-label="Ir para o início">
      <span class="brand__top">
        <span class="brand__sigla" aria-hidden="true">IJPE</span>
      </span>
    </a>

    <nav class="nav" aria-label="Navegação principal">
      <a class="nav__link<?php echo $isActive('index.php'); ?>" href="index.php">Início</a>
      <a class="nav__link<?php echo $isActive('sobre.php'); ?>" href="sobre.php">Sobre</a>
      <a class="nav__link<?php echo $isActive('revista.php'); ?>" href="revista.php">Revista</a>
      <a class="nav__link<?php echo $isActive('cursos.php'); ?>" href="cursos.php">Cursos</a>
      <a class="nav__link" href="blog/">Blog</a>
      <a class="nav__link<?php echo $isActive('contato.php'); ?>" href="contato.php">Contato</a>
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
        <a class="mobile-menu__link<?php echo $isActive('index.php'); ?>" href="index.php">Início</a>
        <a class="mobile-menu__link<?php echo $isActive('sobre.php'); ?>" href="sobre.php">Sobre</a>
        <a class="mobile-menu__link<?php echo $isActive('revista.php'); ?>" href="revista.php">Revista RCBC</a>
        <a class="mobile-menu__link<?php echo $isActive('cursos.php'); ?>" href="cursos.php">Cursos</a>
        <a class="mobile-menu__link" href="blog/">Blog</a>
        <a class="mobile-menu__link<?php echo $isActive('contato.php'); ?>" href="contato.php">Contato</a>
      </div>

      <div class="mobile-menu__foot">
        <p class="fineprint">Jataí — Goiás, Brasil</p>
      </div>
    </div>
    <button class="mobile-menu__backdrop" type="button" aria-label="Fechar menu"></button>
  </div>
</header>
