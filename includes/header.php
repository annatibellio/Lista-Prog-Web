<?php
/**
 * Espera (opcionalmente) definidas antes do include:
 *   $base   -> prefixo relativo até a raiz do site ('' na raiz, '../' dentro de exN/)
 *   $titulo -> título da aba do navegador
 */
$base   = $base   ?? '';
$titulo = $titulo ?? 'Lista de Exercícios';
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
<header class="topbar">
  <a href="<?php echo $base; ?>index.php" class="brand">📚 Lista de Exercícios</a>
  <a href="<?php echo $base; ?>index.php" class="btn-menu">🏠 Menu</a>
</header>
<main class="wrapper">
