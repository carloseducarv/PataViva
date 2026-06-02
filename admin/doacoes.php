<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../backend/auth.php';
require '../backend/conexao.php';

$sql = "
SELECT
    d.doacao_id,
    u.nome,
    d.valor,
    d.pix_feito,
    d.dt_doacao
FROM doacoes d
INNER JOIN usuarios u
ON d.usuario_id = u.usuario_id
ORDER BY d.dt_doacao DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Doações - Pataviva</title>
  <link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="style.css<?php echo "?v=" . time(); ?>">
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

  <!-- CONTEÚDO -->
  <main class="content">
    <main class="content">
    <div class="tabela-container">

    <h2>Doações Recebidas</h2>

    <table>
        ...
    </table>

</div>

    <div class="tabela-container">

    <table>
     <thead>
    <tr>
        <th>ID</th>
        <th>Doador</th>
        <th>Valor</th>
        <th>PIX Confirmado</th>
        <th>Data</th>
    </tr>
</thead>

<tbody>
<?php if ($result && $result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['doacao_id'] ?></td>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td>R$ <?= number_format($row['valor'], 2, ',', '.') ?></td>
            <td><?= ucfirst($row['pix_feito']) ?></td>
            <td><?= date('d/m/Y H:i', strtotime($row['dt_doacao'])) ?></td>
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="5">Nenhuma doação encontrada.</td>
    </tr>
<?php endif; ?>
</tbody>
    </table>

  </main>

</div>

</body>
</html>
