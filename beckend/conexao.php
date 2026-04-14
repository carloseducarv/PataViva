<?php
$conn = new mysqli("localhost", "root", "", "pataviva");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>