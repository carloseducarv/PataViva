<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "pataviva";

// Criando a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificando se houve erro
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Ajustando para aceitar acentos (UTF-8)
$conn->set_charset("utf8");
?>