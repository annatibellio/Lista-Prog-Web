<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex7');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$notas = $dado['notas']; $media = $dado['media'];
$situacao = $dado['situacao']; $classeBadge = $dado['classeBadge'];

$base   = '../';
$titulo = 'Resultado - Média';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">🎓</span>
  <h1>Resultado</h1>
  <p style="text-align:center;color:var(--text-soft);">Notas informadas: <?php echo implode(", ", $notas); ?></p>
  <div class="result-highlight">
    Média final
    <strong><?php echo number_format($media, 2, ',', '.'); ?></strong>
  </div>
  <p style="text-align:center;"><span class="badge <?php echo $classeBadge; ?>"><?php echo $situacao; ?></span></p>

  <div class="acoes">
    <a class="voltar" href="index.php">Calcular novamente</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
