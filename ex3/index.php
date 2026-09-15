<?php
require __DIR__ . '/../includes/config.php';
$base   = '../';
$titulo = 'Questão 3 - Cálculo de IMC';
require __DIR__ . '/../includes/header.php';

$erroAltura = isset($_GET['erro']) && $_GET['erro'] === 'altura';
?>
<div class="card">
  <span class="card-icon">⚖️</span>
  <h1>3. Cálculo de IMC com Categoria</h1>

  <?php if ($erroAltura): ?>
    <p class="aviso">A altura precisa estar em metros, entre 0,30 e 2,50 (por exemplo <strong>1,57</strong>). O valor informado não parece uma altura válida — tente de novo.</p>
  <?php endif; ?>

  <form action="processar.php" method="POST">
    <div class="form-grid">
      <div>
        <label for="peso">Peso (kg):</label>
        <input type="text" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ex: 60" id="peso" name="peso" required>
      </div>
      <div>
        <label for="altura">Altura em metros (ex: 1,57):</label>
        <input type="text" inputmode="numeric" placeholder="1,57" id="altura" name="altura" maxlength="4" required aria-describedby="altura-erro">
        <span class="hint">Digite só os números: para 1 metro e 57 cm, digite 157 e o campo forma "1,57" sozinho.</span>
        <span class="erro-campo" id="altura-erro">Isso não parece uma altura válida em metros (ex: 1,57).</span>
      </div>
    </div>
    <button type="submit">Calcular</button>
  </form>
</div>
<script src="<?php echo $base; ?>assets/js/mascara-altura.js"></script>
<?php require __DIR__ . '/../includes/footer.php'; ?>
