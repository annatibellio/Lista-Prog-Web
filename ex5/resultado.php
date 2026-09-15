<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex5');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$inicial = $dado['inicial']; $taxa = $dado['taxa']; $meses = $dado['meses'];
$linhas = $dado['linhas']; $saldo = $dado['saldo'];

$base   = '../';
$titulo = 'Resultado - Juros Compostos';
require __DIR__ . '/../includes/header.php';
?>
<div class="card" style="max-width:620px;">
  <span class="card-icon">📈</span>
  <h1>Simulação de Investimento</h1>
  <p style="text-align:center;color:var(--text-soft);">
    Valor inicial: R$ <?php echo number_format($inicial, 2, ',', '.'); ?> · Taxa: <?php echo $taxa; ?>% a.m. · Período: <?php echo $meses; ?> meses
  </p>
  <div class="result-list">
    <?php foreach ($linhas as $l): ?>
      <p><?php echo $l; ?></p>
    <?php endforeach; ?>
  </div>
  <div class="result-highlight">
    Saldo final
    <strong>R$ <?php echo number_format($saldo, 2, ',', '.'); ?></strong>
  </div>

  <div class="acoes">
    <a class="voltar" href="index.php">Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
