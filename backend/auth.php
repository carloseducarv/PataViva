<?php
// Inicia a sessão apenas se ainda não estiver iniciada
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Verifica se o usuário NÃO está logado
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../admin/login.html");
    exit;
}
?>