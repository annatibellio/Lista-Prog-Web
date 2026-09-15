<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 1 - Desconto em Compra';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">💰</span>
  <h1>1. Cálculo de Desconto em Compra</h1>
  <form action="processar.php" method="POST">
    <label for="valor">Valor total da compra (R$):</label>
    <input type="number" step="0.01" min="0" id="valor" name="valor" required>

    <label for="codigo">Código do cliente:</label>
    <select id="codigo" name="codigo">
      <option value="1">1 - Cliente Comum (5%)</option>
      <option value="2">2 - VIP (10%)</option>
      <option value="3">3 - Funcionário (15%)</option>
    </select>

    <button type="submit">Calcular</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
