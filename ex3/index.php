<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 3 - Cálculo de IMC';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">⚖️</span>
  <h1>3. Cálculo de IMC com Categoria</h1>
  <form action="processar.php" method="POST">
    <div class="form-grid">
      <div>
        <label for="peso">Peso (kg):</label>
        <input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 60" id="peso" name="peso" required>
      </div>
      <div>
        <label for="altura">Altura (m):</label>
        <input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 1,57" id="altura" name="altura" required>
      </div>
    </div>
    <button type="submit">Calcular</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
