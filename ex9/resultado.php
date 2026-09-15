<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex9');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$linhas = $dado['linhas'];

$base   = '../';
$titulo = 'Resultado - Notas da Turma';
require __DIR__ . '/../includes/header.php';
?>
<div class="card" style="max-width:560px;">
  <span class="card-icon">🏫</span>
  <h1>Médias da Turma</h1>
  <table>
    <thead><tr><th>Aluno</th><th>Nota 1</th><th>Nota 2</th><th>Média</th></tr></thead>
    <tbody><?php echo $linhas; ?></tbody>
  </table>

  <div class="acoes">
    <a class="voltar" href="index.php">↻ Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
