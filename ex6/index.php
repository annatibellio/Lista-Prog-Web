<?php
require __DIR__ . '/../includes/config.php';

$alturaPre = isset($_GET['altura']) ? numero($_GET['altura']) : null;
$origem    = $_GET['origem'] ?? null;

// o enunciado pede 10 pessoas, então esse é o padrão. mas dá pra ajustar
// (mínimo 2, só pra não ficar sem sentido, e um teto de 30 pra não virar bagunça)
$qtd = isset($_GET['qtd']) ? intval($_GET['qtd']) : 10;
if ($qtd < 2) { $qtd = 2; }
if ($qtd > 30) { $qtd = 30; }

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

  <form action="index.php" method="GET" class="form-qtd">
    <label for="qtd">Quantidade de pessoas (padrão do exercício: 10):</label>
    <input type="number" step="1" min="2" max="30" id="qtd" name="qtd" value="<?php echo $qtd; ?>">
    <button type="submit" class="btn-secundario">Atualizar tabela</button>
  </form>

  <form action="processar.php" method="POST">
    <div class="tabela-scroll">
    <table class="tabela-responsiva">
      <thead><tr><th>Pessoa</th><th>Idade</th><th>Altura (m)</th></tr></thead>
      <tbody>
      <?php for ($i = 1; $i <= $qtd; $i++): ?>
        <tr>
          <td data-label="Pessoa"><?php echo $i; ?></td>
          <td data-label="Idade"><input type="number" step="1" min="0" name="idade[]" required></td>
          <td data-label="Altura (m)"><input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 1,70" name="altura[]"
                     value="<?php echo ($i === 1 && $alturaPre) ? htmlspecialchars(number_format($alturaPre, 2, ',', '.')) : ''; ?>" required></td>
        </tr>
      <?php endfor; ?>
      </tbody>
    </table>
    </div>
    <button type="submit">Calcular Estatísticas</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
