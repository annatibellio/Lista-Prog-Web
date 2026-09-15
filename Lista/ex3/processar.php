<?php
$peso   = isset($_POST['peso'])   ? floatval($_POST['peso'])   : 0;
$altura = isset($_POST['altura']) ? floatval($_POST['altura']) : 0;

$imc = ($altura > 0) ? $peso / ($altura * $altura) : 0;

if ($imc < 18.5) {
    $categoria = "Abaixo do peso";
} elseif ($imc < 25) {
    $categoria = "Peso normal";
} elseif ($imc < 30) {
    $categoria = "Sobrepeso";
} else {
    $categoria = "Obesidade";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - IMC</title>
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
<p>Peso: <?php echo $peso; ?> kg</p>
<p>Altura: <?php echo $altura; ?> m</p>
<p>IMC calculado: <strong><?php echo number_format($imc, 2, ',', '.'); ?></strong></p>
<p>Classificação: <strong><?php echo $categoria; ?></strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
