<?php
$dias = ["Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado","Domingo"];
$vendas = isset($_POST['vendas']) ? array_map('floatval', $_POST['vendas']) : [];

$total = array_sum($vendas);
$media = count($vendas) > 0 ? $total / count($vendas) : 0;

$maiorValor = max($vendas);
$indiceMaior = array_search($maiorValor, $vendas);
$diaMaior = $dias[$indiceMaior];

$diasAcimaMedia = 0;
foreach ($vendas as $v) {
    if ($v > $media) {
        $diasAcimaMedia++;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Faturamento</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:460px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
p{font-size:16px;}
a{display:inline-block;margin-top:15px;color:#2d6cdf;}
</style>
</head>
<body>
<div class="box">
<h1>Resultado</h1>
<p>Total vendido na semana: <strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></p>
<p>Média diária de vendas: R$ <?php echo number_format($media, 2, ',', '.'); ?></p>
<p>Dia de maior faturamento: <strong><?php echo $diaMaior; ?></strong> (R$ <?php echo number_format($maiorValor, 2, ',', '.'); ?>)</p>
<p>Dias acima da média semanal: <strong><?php echo $diasAcimaMedia; ?></strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
