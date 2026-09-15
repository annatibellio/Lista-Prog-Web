<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex8');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$total = $dado['total']; $media = $dado['media']; $diaMaior = $dado['diaMaior'];
$maiorValor = $dado['maiorValor']; $diasAcimaMedia = $dado['diasAcimaMedia'];

$base   = '../';
$titulo = 'Resultado - Faturamento';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">💵</span>
  <h1>Resultado</h1>
  <div class="result-highlight">
    Total vendido na semana
    <strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong>
  </div>
  <div class="result-list">
    <p>Média diária de vendas: <strong>R$ <?php echo number_format($media, 2, ',', '.'); ?></strong></p>
    <p>Dia de maior faturamento: <strong><?php echo $diaMaior; ?></strong> (R$ <?php echo number_format($maiorValor, 2, ',', '.'); ?>)</p>
    <p>Dias acima da média semanal: <strong><?php echo $diasAcimaMedia; ?></strong></p>
  </div>

  <div class="conexao">
    💡 Quer simular esse faturamento rendendo com juros? Use-o no <strong>Exercício 5 (Juros Compostos)</strong>.
    <br>
    <a href="../ex5/index.php?inicial=<?php echo $total; ?>&origem=ex8">Usar R$ <?php echo number_format($total, 2, ',', '.'); ?> no Exercício 5</a>
  </div>

  <div class="acoes">
    <a class="voltar" href="index.php">Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
