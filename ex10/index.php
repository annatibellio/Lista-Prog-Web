<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 10 - Soma da Diagonal Principal';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">🔢</span>
  <h1>10. Soma dos Elementos da Diagonal Principal</h1>
  <form action="processar.php" method="POST">
    <div class="form-grid">
      <div>
        <label for="min">Valor mínimo da matriz:</label>
        <input type="number" step="1" id="min" name="min" value="1" required>
      </div>
      <div>
        <label for="max">Valor máximo da matriz:</label>
        <input type="number" step="1" id="max" name="max" value="50" required>
      </div>
    </div>
    <button type="submit">Gerar Matriz Aleatória</button>
    <span class="hint">A matriz 3x3 de inteiros aleatórios é gerada pelo PHP dentro do intervalo informado.</span>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
