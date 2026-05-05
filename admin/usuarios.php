<?php
// Certifique-se de que a sessão está iniciada, se necessário para a autenticação.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../backend/auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel - Pataviva</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>

  <div class="container">
    <!-- SIDEBAR -->
    <aside class="sidebar">
  <h2 class="logo">
    <img src="logo.png" alt="Logo Pataviva">
    Pataviva
  </h2>

  <nav>
    <ul>
          <li><a href="index.php">🏠 Início</a></li>
          <li><a href="animais.php">🐶 Animais</a></li>
          <li><a href="adocoes.php">📋 Adoções</a></li>
          <li><a href="doacoes.php">💰 Doações</a></li>
          <li><a href="usuarios.php">👤 Usuários</a></li>
          <li><a href="perfil.php">⚙️ Perfil</a></li>
          <li><a href="../backend/logout.php">🚪 Sair</a></li>
        </ul>
      </nav>
    </aside>

    </body>