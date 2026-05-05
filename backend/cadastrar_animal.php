<?php
require "conexao.php";


$nome = $_POST['nome'];
$especie = $_POST['especie']; 
$sexo = $_POST['sexo'];
$porte = $_POST['porte'];
$idade = $_POST['idade'];
$descricao = $_POST['descricao'];

// Processar upload da foto
$foto = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    $fileTmpPath = $_FILES['foto']['tmp_name'];
    $fileName = basename($_FILES['foto']['name']);
    
    // Gerar nome único para evitar conflitos
    $nomeArquivo  = uniqid() . '_' . $fileName;
    $caminhoCompleto  = $uploadDir . $nomeArquivo;

    if (move_uploaded_file($fileTmpPath, $caminhoCompleto )) {
        $foto = $caminhoCompleto ; // Salvar caminho da foto no banco
    } 
}

$sql = "INSERT INTO animais (nome, especie, sexo, porte, idade, descricao, foto) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssiss", $nome, $especie, $sexo, $porte, $idade, $descricao, $foto);

if ($stmt->execute()) {
    echo "<script>alert('Animal cadastrado com sucesso!'); window.location='../admin/animais.php';</script>";
    exit;
} else {
    echo "<script>alert('Erro ao cadastrar animal!'); window.location='../admin/animais.php';</script>";
    exit;
}