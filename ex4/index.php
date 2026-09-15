<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 4 - Tabuada Personalizada';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">✖️</span>
  <h1>4. Tabuada Personalizada</h1>
  <form action="processar.php" method="POST">
    <label for="numero">Número inteiro:</label>
    <input type="number" step="1" id="numero" name="numero" required>
    <button type="submit">Gerar Tabuada</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
