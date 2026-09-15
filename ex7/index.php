<?php
require __DIR__ . '/../includes/config.php';

// o enunciado pede 4 notas, então continua sendo o padrão quando a página
// abre. mas, como no exercício 6 e 9, dá pra ajustar a quantidade
// (mínimo 2 notas pra fazer sentido de "média", teto de 15 pra não virar bagunça)
$qtd = isset($_GET['qtd']) ? intval($_GET['qtd']) : 4;
if ($qtd < 2) { $qtd = 2; }
if ($qtd > 15) { $qtd = 15; }

$base   = '../';
$titulo = 'Questão 7 - Média e Aprovação';
require __DIR__ . '/../includes/header.php';
?>
<div class="card">
  <span class="card-icon">🎓</span>
  <h1>7. Calculadora de Média e Aprovação</h1>

  <form action="index.php" method="GET" class="form-qtd">
    <label for="qtd">Quantidade de notas (padrão do exercício: 4):</label>
    <input type="number" step="1" min="2" max="15" id="qtd" name="qtd" value="<?php echo $qtd; ?>">
    <button type="submit" class="btn-secundario">Atualizar</button>
  </form>

  <form action="processar.php" method="POST">
    <div class="form-grid">
      <?php for ($i = 1; $i <= $qtd; $i++): ?>
        <div>
          <label for="nota<?php echo $i; ?>">Nota <?php echo $i; ?>:</label>
          <input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 7,5" id="nota<?php echo $i; ?>" name="notas[]" required>
        </div>
      <?php endfor; ?>
    </div>
    <button type="submit">Calcular</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
