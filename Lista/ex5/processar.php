<?php
$inicial = isset($_POST['inicial']) ? floatval($_POST['inicial']) : 1000;
$taxa    = isset($_POST['taxa'])    ? floatval($_POST['taxa'])    : 1.5;
$meses   = isset($_POST['meses'])   ? intval($_POST['meses'])     : 12;

$saldo = $inicial;
$linhas = [];

for ($mes = 1; $mes <= $meses; $mes++) {
    $rendimento = $saldo * ($taxa / 100);
    $saldo += $rendimento;
    $linhas[] = "Mês $mes: rendimento de R$ " . number_format($rendimento, 2, ',', '.') .
                " | saldo acumulado: R$ " . number_format($saldo, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Juros Compostos</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:520px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
p{font-size:15px;margin:3px 0;}
a{display:inline-block;margin-top:15px;color:#2d6cdf;}
</style>
</head>
<body>
<div class="box">
<h1>Simulação de Investimento</h1>
<p>Valor inicial: R$ <?php echo number_format($inicial, 2, ',', '.'); ?> | Taxa: <?php echo $taxa; ?>% a.m. | Período: <?php echo $meses; ?> meses</p>
<hr>
<?php foreach ($linhas as $l): ?>
  <p><?php echo $l; ?></p>
<?php endforeach; ?>
<hr>
<p><strong>Saldo final: R$ <?php echo number_format($saldo, 2, ',', '.'); ?></strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
