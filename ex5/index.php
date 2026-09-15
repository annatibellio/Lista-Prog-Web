<?php
require __DIR__ . '/../includes/config.php';

// Recebe (opcionalmente) um valor inicial vindo de outro exercício (ex1 ou ex8).
$origemNomes = ['ex1' => 'Exercício 1 (Desconto em Compra)', 'ex8' => 'Exercício 8 (Faturamento Diário)'];
$origem      = $_GET['origem'] ?? null;
$inicialPre  = isset($_GET['inicial']) ? numero($_GET['inicial']) : 1000;

$base   = '../';
$titulo = 'Questão 5 - Juros Compostos';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">📈</span>
  <h1>5. Cálculo de Juros Compostos</h1>

  <?php if ($origem && isset($origemNomes[$origem])): ?>
    <div class="info-preenchido">
      💡 Valor inicial preenchido automaticamente com o resultado do <strong><?php echo $origemNomes[$origem]; ?></strong>.
    </div>
  <?php endif; ?>

  <form action="processar.php" method="POST">
    <label for="inicial">Valor inicial do investimento (R$):</label>
    <input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 1000,00" id="inicial" name="inicial" value="<?php echo htmlspecialchars(number_format($inicialPre, 2, ',', '.')); ?>" required>

    <label for="taxa">Taxa de juros ao mês (%):</label>
    <input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 1,5" id="taxa" name="taxa" value="1,5" required>

    <label for="meses">Período (meses):</label>
    <input type="number" step="1" min="1" id="meses" name="meses" value="12" required>

    <button type="submit">Simular</button>
    <span class="hint">Valores padrão conforme o enunciado (R$ 1.000,00 a 1,5% a.m. por 12 meses).</span>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
