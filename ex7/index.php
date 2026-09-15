<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 7 - Média e Aprovação';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">🎓</span>
  <h1>7. Calculadora de Média e Aprovação</h1>
  <form action="processar.php" method="POST">
    <div class="form-grid">
      <?php for ($i = 1; $i <= 4; $i++): ?>
        <div>
          <label for="nota<?php echo $i; ?>">Nota <?php echo $i; ?>:</label>
          <input type="number" step="0.1" min="0" max="10" id="nota<?php echo $i; ?>" name="notas[]" required>
        </div>
      <?php endfor; ?>
    </div>
    <button type="submit">Calcular</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
