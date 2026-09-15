<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 8 - Análise de Faturamento Diário';
require __DIR__ . '/../includes/header.php';
$dias = ["Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado","Domingo"];
?>
<div class="card">
  <span class="card-icon">💵</span>
  <h1>8. Análise de Faturamento Diário</h1>
  <form action="processar.php" method="POST">
    <div class="form-grid">
      <?php foreach ($dias as $i => $dia): ?>
        <div class="<?php echo $i === 6 ? 'full' : ''; ?>">
          <label><?php echo $dia; ?> (R$):</label>
          <input type="number" step="0.01" min="0" name="vendas[]" required>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="submit">Analisar</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
