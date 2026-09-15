<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex3');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$peso = $dado['peso']; $altura = $dado['altura'];
$imc = $dado['imc']; $categoria = $dado['categoria'];

$base   = '../';
$titulo = 'Resultado - IMC';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">⚖️</span>
  <h1>Resultado</h1>
  <div class="result-list">
    <p>Peso: <strong><?php echo $peso; ?> kg</strong></p>
    <p>Altura: <strong><?php echo $altura; ?> m</strong></p>
  </div>
  <div class="result-highlight">
    IMC calculado
    <strong><?php echo number_format($imc, 2, ',', '.'); ?> (<?php echo $categoria; ?>)</strong>
  </div>

  <?php if ($altura > 0): ?>
  <div class="conexao">
    💡 Já usou sua altura aqui? Aproveite no <strong>Exercício 6 (Estatística de Alturas)</strong> como a primeira pessoa do grupo.
    <br>
    <a href="../ex6/index.php?altura=<?php echo $altura; ?>&origem=ex3">Usar altura <?php echo $altura; ?> m no Exercício 6</a>
  </div>
  <?php endif; ?>

  <div class="acoes">
    <a class="voltar" href="index.php">Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
