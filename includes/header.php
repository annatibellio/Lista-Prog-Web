<?php
// $base e $titulo podem vir definidos antes do include (senão usa o padrão).
// $base é '' na raiz e '../' quando a página está dentro de uma pasta exN/
$base   = $base   ?? '';
$titulo = $titulo ?? 'Lista de Exercícios';

// só estamos "dentro" de um exercício quando $base != '' (ex1/, ex2/ etc.)
// Na página inicial não faz sentido mostrar um botão "Menu" ao lado da marca
// "Lista de Exercícios" (os dois levariam pro mesmo lugar), então esse botão
// só aparece quando já se está dentro de um exercício.
$dentroDeExercicio = $base !== '';
$exercicioAtual     = null;
if ($dentroDeExercicio && preg_match('#/(ex\d+)/#', $_SERVER['SCRIPT_NAME'] ?? '', $m)) {
    $exercicioAtual = $m[1];
}
$catalogo = $GLOBALS['EXERCICIOS'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
<a href="#conteudo" class="pular-conteudo">Pular para o conteúdo</a>
<header class="topbar">
  <a href="<?php echo $base; ?>index.php" class="brand">
    <span class="brand-emoji">📚</span>
    <span class="brand-texto">Lista de Exercícios</span>
  </a>

  <?php if ($dentroDeExercicio): ?>
    <div class="topbar-acoes">
      <?php if (!empty($catalogo)): ?>
        <div class="seletor-exercicio">
          <select onchange="if(this.value) window.location.href = this.value;" aria-label="Ir para outro exercício">
            <option value="">Ir para...</option>
            <?php foreach ($catalogo as $chave => $info):
              $num = (int) substr($chave, 2); ?>
              <option value="<?php echo $base . $chave; ?>/index.php" <?php echo ($chave === $exercicioAtual) ? 'selected' : ''; ?>>
                <?php echo $num . '. ' . htmlspecialchars($info['titulo']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php endif; ?>
      <a href="<?php echo $base; ?>index.php" class="btn-menu">🏠 <span class="texto">Menu</span></a>
    </div>
  <?php endif; ?>
</header>
<main class="wrapper" id="conteudo">
