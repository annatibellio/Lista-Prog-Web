<?php
require __DIR__ . '/../includes/config.php';

$dado = obterResultado('ex10');
if (!$dado) {
    header('Location: index.php');
    exit;
}
$matriz = $dado['matriz']; $somaDiagonal = $dado['somaDiagonal'];

$base   = '../';
$titulo = 'Resultado - Diagonal Principal';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">🔢</span>
  <h1>Matriz 3x3 Gerada</h1>
  <table class="matrix-table">
    <?php for ($i = 0; $i < 3; $i++): ?>
      <tr>
      <?php for ($j = 0; $j < 3; $j++): ?>
        <td class="<?php echo ($i == $j) ? 'diag' : ''; ?>"><?php echo $matriz[$i][$j]; ?></td>
      <?php endfor; ?>
      </tr>
    <?php endfor; ?>
  </table>
  <div class="result-highlight">
    Soma da diagonal principal
    <strong><?php echo $somaDiagonal; ?></strong>
  </div>

  <div class="acoes">
    <a class="voltar" href="index.php">↻ Gerar outra matriz</a>
    <a class="ir-menu" href="../index.php">🏠 Voltar ao menu</a>
  </div>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
