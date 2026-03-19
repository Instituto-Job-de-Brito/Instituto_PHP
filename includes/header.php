<?php
/**
 * Cabeçalho HTML + meta tags.
 *
 * Uso (em cada página):
 *   $pageTitle = '...';
 *   $pageDescription = '...';
 *   include __DIR__ . '/includes/header.php';
 *   include __DIR__ . '/includes/nav.php';
 */

$pageTitle = $pageTitle ?? 'Instituto Job de Pesquisa e Educação';
$pageDescription = $pageDescription ?? 'Instituto Job de Pesquisa e Educação — educação com rigor, pesquisa com propósito. Jataí, Goiás, Brasil.';
$ogTitle = $ogTitle ?? $pageTitle;
$ogDescription = $ogDescription ?? $pageDescription;
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />

  <meta property="og:title" content="<?php echo htmlspecialchars($ogTitle, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta property="og:description" content="<?php echo htmlspecialchars($ogDescription, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="assets/img/og-placeholder.svg" />

  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Playfair+Display:wght@400;500;600&family=Source+Serif+4:opsz,wght@8..60,300;8..60,400;8..60,600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
  <main id="conteudo">
