<?php
session_start();
session_unset();   // Remove todas as variáveis da sessão
session_destroy(); // Destrói a sessão

// Redireciona para a página de login ou home
header("Location: ../admin/login.html");
exit;
?>
