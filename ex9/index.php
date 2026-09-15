<?php
require __DIR__ . '/../includes/config.php';

// enunciado pede 3 alunos, fica como padrão, mas dá pra ajustar
$qtd = isset($_GET['qtd']) ? intval($_GET['qtd']) : 3;
if ($qtd < 1) { $qtd = 1; }
if ($qtd > 20) { $qtd = 20; }

$base   = '../';
$titulo = 'Questão 9 - Tabela de Notas de uma Turma';
require __DIR__ . '/../includes/header.php';
?>
<div class="card" style="max-width:560px;">
  <span class="card-icon">🏫</span>
  <h1>9. Tabela de Notas de uma Turma</h1>

  <form action="index.php" method="GET" class="form-qtd">
    <label for="qtd">Quantidade de alunos (padrão do exercício: 3):</label>
    <input type="number" step="1" min="1" max="20" id="qtd" name="qtd" value="<?php echo $qtd; ?>">
    <button type="submit" class="btn-secundario">Atualizar tabela</button>
  </form>

  <form action="processar.php" method="POST">
    <table>
      <thead><tr><th>Aluno</th><th>Nome</th><th>Nota 1</th><th>Nota 2</th></tr></thead>
      <tbody>
      <?php for ($i = 1; $i <= $qtd; $i++): ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><input type="text" name="nome[]" required></td>
          <td><input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 8,5" name="nota1[]" required></td>
          <td><input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 8,5" name="nota2[]" required></td>
        </tr>
      <?php endfor; ?>
      </tbody>
    </table>
    <button type="submit">Calcular Médias</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
