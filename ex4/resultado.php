<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex4');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$numero = $dado['numero'];

$base   = '../';
$titulo = 'Resultado - Tabuada';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">✖️</span>
  <h1>Tabuada do <?php echo $numero; ?></h1>
  <div class="result-list">
    <?php for ($i = 1; $i <= 10; $i++): ?>
      <p><?php echo $numero . " × " . $i . " = " . ($numero * $i); ?></p>
    <?php endfor; ?>
  </div>

  <div class="acoes">
    <a class="voltar" href="index.php">Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
