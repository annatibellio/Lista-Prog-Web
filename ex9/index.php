<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 9 - Tabela de Notas de uma Turma';
require __DIR__ . '/../includes/header.php';
?>
<div class="card" style="max-width:560px;">
  <span class="card-icon">🏫</span>
  <h1>9. Tabela de Notas de uma Turma</h1>
  <form action="processar.php" method="POST">
    <table>
      <thead><tr><th>Aluno</th><th>Nome</th><th>Nota 1</th><th>Nota 2</th></tr></thead>
      <tbody>
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><input type="text" name="nome[]" required></td>
          <td><input type="number" step="0.1" min="0" max="10" name="nota1[]" required></td>
          <td><input type="number" step="0.1" min="0" max="10" name="nota2[]" required></td>
        </tr>
      <?php endfor; ?>
      </tbody>
    </table>
    <button type="submit">Calcular Médias</button>
  </form>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
