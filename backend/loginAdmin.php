<?php 
session_start();
require "conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

//consulta do adm
$sql = "SELECT * FROM administrador WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $admin = $result->fetch_assoc();

    // Verifica a senha com hash
    if (password_verify($senha, $admin["senha"])) {

        // Guarda os dados na sessão
        $_SESSION["admin_id"] = $admin["admin_id"];
        $_SESSION["admin_email"] = $admin["email"];

        header("Location: ../admin/index.php");
        exit;
    } else {
        echo "<script>alert('Senha incorreta!');window.location='../admin/login.html';</script>";
    }
} else {
    echo "<script>alert('Login inválido!');window.location='../admin/login.html';</script>";
}
?>