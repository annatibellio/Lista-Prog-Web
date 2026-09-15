<?php
require __DIR__ . '/../includes/config.php';

$alturaPre = isset($_GET['altura']) ? floatval($_GET['altura']) : null;
$origem    = $_GET['origem'] ?? null;

$base   = '../';
$titulo = 'Questão 6 - Estatística de Alturas';
require __DIR__ . '/../includes/header.php';
?>
<div class="card" style="max-width:620px;">
  <span class="card-icon">📏</span>
  <h1>6. Estatística de Alturas</h1>

  <?php if ($alturaPre && $origem === 'ex3'): ?>
    <div class="info-preenchido">
      💡 Altura da Pessoa 1 preenchida automaticamente com o resultado do <strong>Exercício 3 (IMC)</strong>. Complete a idade dela e os dados das demais pessoas.
    </div>
  <?php endif; ?>

  <form action="processar.php" method="POST">
    <table>
      <thead><tr><th>Pessoa</th><th>Idade</th><th>Altura (m)</th></tr></thead>
      <tbody>
      <?php for ($i = 1; $i <= 10; $i++): ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><input type="number" step="1" min="0" name="idade[]" required></td>
          <td><input type="number" step="0.01" min="0" name="altura[]"
                     value="<?php echo ($i === 1 && $alturaPre) ? htmlspecialchars($alturaPre) : ''; ?>" required></td>
        </tr>
      <?php endfor; ?>
      </tbody>
    </table>
    <button type="submit">Calcular Estatísticas</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
