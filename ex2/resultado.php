<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex2');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$a = $dado['a']; $b = $dado['b']; $c = $dado['c'];
$valido = $dado['valido'];
$classificacao = $dado['classificacao'];

$base   = '../';
$titulo = 'Resultado - Triângulo';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">📐</span>
  <h1>Resultado</h1>
  <p style="text-align:center;color:var(--text-soft);">Lados informados: A=<?php echo $a; ?>, B=<?php echo $b; ?>, C=<?php echo $c; ?></p>

  <?php if ($valido): ?>
    <div class="result-highlight">
      Classificação do triângulo
      <strong><?php echo $classificacao; ?></strong>
    </div>
  <?php else: ?>
    <div class="result-highlight" style="border-color:#fca5a5;background:#fef2f2;">
      <strong style="color:var(--danger);">Os valores informados NÃO formam um triângulo válido.</strong>
    </div>
  <?php endif; ?>

  <div class="acoes">
    <a class="voltar" href="index.php">↻ Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
