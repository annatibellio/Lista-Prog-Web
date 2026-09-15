<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex1');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$valor      = $dado['valor'];
$percentual = $dado['percentual'];
$desconto   = $dado['desconto'];
$valorFinal = $dado['valorFinal'];

$base   = '../';
$titulo = 'Resultado - Desconto';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">💰</span>
  <h1>Resultado</h1>
  <div class="result-list">
    <p>Valor da compra: <strong>R$ <?php echo number_format($valor, 2, ',', '.'); ?></strong></p>
    <p>Percentual de desconto aplicado: <strong><?php echo $percentual; ?>%</strong></p>
    <p>Valor do desconto: <strong>R$ <?php echo number_format($desconto, 2, ',', '.'); ?></strong></p>
  </div>
  <div class="result-highlight">
    Valor final a pagar
    <strong>R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?></strong>
  </div>

  <div class="conexao">
    💡 Quer ver esse valor rendendo? Simule um investimento com ele no <strong>Exercício 5 (Juros Compostos)</strong>.
    <br>
    <a href="../ex5/index.php?inicial=<?php echo $valorFinal; ?>&origem=ex1">Usar R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?> no Exercício 5 →</a>
  </div>

  <div class="acoes">
    <a class="voltar" href="index.php">↻ Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
