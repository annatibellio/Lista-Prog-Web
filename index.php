<?php
require __DIR__ . '/includes/config.php';
$base   = '';
$titulo = 'Menu - Lista de Exercícios';
require __DIR__ . '/includes/header.php';
?>
<div class="hero">
  <h1>Lista de Exercícios em PHP</h1>
  <p>Escolha um exercício abaixo para abrir a calculadora correspondente.</p>
</div>

<div class="menu-grid">
  <?php foreach ($GLOBALS['EXERCICIOS'] as $chave => $info):
        $numero = (int) substr($chave, 2); ?>
    <a class="menu-item" href="<?php echo $chave; ?>/index.php">
      <span class="icone"><?php echo $info['icone']; ?></span>
      <span class="num">EXERCÍCIO <?php echo $numero; ?></span>
      <h3><?php echo htmlspecialchars($info['titulo']); ?></h3>
      <p><?php echo htmlspecialchars($info['desc']); ?></p>
      <span class="abrir">Abrir exercício</span>
    </a>
  <?php endforeach; ?>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
