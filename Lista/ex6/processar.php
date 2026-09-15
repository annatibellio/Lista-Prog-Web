<?php
$idades  = isset($_POST['idade'])  ? $_POST['idade']  : [];
$alturas = isset($_POST['altura']) ? $_POST['altura'] : [];

$maiorAltura = null;
$menorAltura = null;
$somaMaiores = 0;
$qtdMaiores  = 0;

$n = count($alturas);
for ($i = 0; $i < $n; $i++) {
    $idade  = intval($idades[$i]);
    $altura = floatval($alturas[$i]);

    if ($maiorAltura === null || $altura > $maiorAltura) {
        $maiorAltura = $altura;
    }
    if ($menorAltura === null || $altura < $menorAltura) {
        $menorAltura = $altura;
    }
    if ($idade > 18) {
        $somaMaiores += $altura;
        $qtdMaiores++;
    }
}

$mediaMaiores = ($qtdMaiores > 0) ? $somaMaiores / $qtdMaiores : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Estatística de Alturas</title>
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
<p>Maior altura do grupo: <strong><?php echo number_format($maiorAltura, 2, ',', '.'); ?> m</strong></p>
<p>Menor altura do grupo: <strong><?php echo number_format($menorAltura, 2, ',', '.'); ?> m</strong></p>
<p>Média de altura (maiores de 18 anos):
<strong>
<?php echo $qtdMaiores > 0 ? number_format($mediaMaiores, 2, ',', '.') . " m" : "nenhuma pessoa maior de 18 anos"; ?>
</strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
