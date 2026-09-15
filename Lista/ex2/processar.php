<?php
$a = isset($_POST['a']) ? floatval($_POST['a']) : 0;
$b = isset($_POST['b']) ? floatval($_POST['b']) : 0;
$c = isset($_POST['c']) ? floatval($_POST['c']) : 0;

$valido = ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a);

if ($valido) {
    if ($a == $b && $b == $c) {
        $classificacao = "Equilátero (três lados iguais)";
    } elseif ($a == $b || $a == $c || $b == $c) {
        $classificacao = "Isósceles (dois lados iguais)";
    } else {
        $classificacao = "Escaleno (três lados diferentes)";
    }
} else {
    $classificacao = null;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Triângulo</title>
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
<p>Lados informados: A=<?php echo $a; ?>, B=<?php echo $b; ?>, C=<?php echo $c; ?></p>
<?php if ($valido): ?>
  <p><strong>Triângulo válido!</strong></p>
  <p>Classificação: <strong><?php echo $classificacao; ?></strong></p>
<?php else: ?>
  <p><strong>Os valores informados NÃO formam um triângulo válido.</strong></p>
<?php endif; ?>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
