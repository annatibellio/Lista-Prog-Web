<?php
$notas = isset($_POST['notas']) ? $_POST['notas'] : [];
$notas = array_map('floatval', $notas);

$media = count($notas) > 0 ? array_sum($notas) / count($notas) : 0;

if ($media >= 7) {
    $situacao = "Aprovado";
} elseif ($media >= 5) {
    $situacao = "Recuperação";
} else {
    $situacao = "Reprovado";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Média</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:420px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
p{font-size:16px;}
a{display:inline-block;margin-top:15px;color:#2d6cdf;}
</style>
</head>
<body>
<div class="box">
<h1>Resultado</h1>
<p>Notas informadas: <?php echo implode(", ", $notas); ?></p>
<p>Média: <strong><?php echo number_format($media, 2, ',', '.'); ?></strong></p>
<p>Situação: <strong><?php echo $situacao; ?></strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
