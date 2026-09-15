<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex6');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$maiorAltura = $dado['maiorAltura']; $menorAltura = $dado['menorAltura'];
$qtdMaiores = $dado['qtdMaiores']; $mediaMaiores = $dado['mediaMaiores'];

$base   = '../';
$titulo = 'Resultado - Estatística de Alturas';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">📏</span>
  <h1>Resultado</h1>
  <div class="result-list">
    <p>Maior altura do grupo: <strong><?php echo number_format($maiorAltura, 2, ',', '.'); ?> m</strong></p>
    <p>Menor altura do grupo: <strong><?php echo number_format($menorAltura, 2, ',', '.'); ?> m</strong></p>
  </div>
  <div class="result-highlight">
    Média de altura (maiores de 18 anos)
    <strong><?php echo $qtdMaiores > 0 ? number_format($mediaMaiores, 2, ',', '.') . " m" : "nenhuma pessoa maior de 18 anos"; ?></strong>
  </div>

  <div class="acoes">
    <a class="voltar" href="index.php">Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
