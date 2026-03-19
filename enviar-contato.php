<?php
/**
 * Endpoint: processa formulário de contato (AJAX).
 * Retorna JSON para uso com fetch().
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
  http_response_code(405);
  echo json_encode(['sucesso' => false, 'erro' => 'Método não permitido']);
  exit;
}

$nome = htmlspecialchars(strip_tags($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$mensagem = htmlspecialchars(strip_tags($_POST['mensagem'] ?? ''), ENT_QUOTES, 'UTF-8');

if (!$nome || !$email || !$mensagem) {
  http_response_code(400);
  echo json_encode(['sucesso' => false, 'erro' => 'Preencha todos os campos corretamente.']);
  exit;
}

$para = 'mateus@institutojob.com.br';
$assunto = "Contato via site — $nome";
$corpo = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem";

// Nota: "From" no mesmo domínio costuma reduzir rejeição em cPanel/SMTP local.
$replyTo = str_replace(["\r", "\n"], '', (string)$email);
$headers = "From: noreply@institutojob.com.br\r\nReply-To: $replyTo\r\nX-Mailer: PHP/" . phpversion();

$enviado = @mail($para, $assunto, $corpo, $headers);
echo json_encode(['sucesso' => (bool)$enviado]);

