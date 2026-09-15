<?php
$valor  = isset($_POST['valor'])  ? floatval($_POST['valor'])  : 0;
$codigo = isset($_POST['codigo']) ? intval($_POST['codigo'])   : 0;

if ($codigo == 1) {
    $percentual = 5;
} elseif ($codigo == 2) {
    $percentual = 10;
} elseif ($codigo == 3) {
    $percentual = 15;
} else {
    $percentual = 0;
}

$desconto = $valor * ($percentual / 100);
$valorFinal = $valor - $desconto;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Desconto</title>
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
<p>Valor da compra: R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>
<p>Percentual de desconto aplicado: <?php echo $percentual; ?>%</p>
<p>Valor do desconto: R$ <?php echo number_format($desconto, 2, ',', '.'); ?></p>
<p><strong>Valor final a pagar: R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?></strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
