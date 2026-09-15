<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 2 - Classificação de Triângulos';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">📐</span>
  <h1>2. Classificação de Triângulos</h1>
  <form action="processar.php" method="POST">
    <div class="form-grid">
      <div>
        <label for="a">Lado A:</label>
        <input type="number" step="0.01" min="0" id="a" name="a" required>
      </div>
      <div>
        <label for="b">Lado B:</label>
        <input type="number" step="0.01" min="0" id="b" name="b" required>
      </div>
      <div class="full">
        <label for="c">Lado C:</label>
        <input type="number" step="0.01" min="0" id="c" name="c" required>
      </div>
    </div>
    <button type="submit">Classificar</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
