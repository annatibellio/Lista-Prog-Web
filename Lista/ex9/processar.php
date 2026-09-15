<?php
$nomes  = isset($_POST['nome'])  ? $_POST['nome']  : [];
$notas1 = isset($_POST['nota1']) ? $_POST['nota1'] : [];
$notas2 = isset($_POST['nota2']) ? $_POST['nota2'] : [];

$linhas = "";
$n = count($nomes);
for ($i = 0; $i < $n; $i++) {
    $nome  = htmlspecialchars($nomes[$i]);
    $n1    = floatval($notas1[$i]);
    $n2    = floatval($notas2[$i]);
    $media = ($n1 + $n2) / 2;
    $linhas .= "<tr><td>$nome</td><td>" . number_format($n1,1,',','.') .
               "</td><td>" . number_format($n2,1,',','.') .
               "</td><td><strong>" . number_format($media,2,',','.') . "</strong></td></tr>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Notas da Turma</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:480px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
table{width:100%;border-collapse:collapse;margin-top:15px;}
th,td{padding:8px;border-bottom:1px solid #eee;text-align:center;}
a{display:inline-block;margin-top:15px;color:#2d6cdf;}
</style>
</head>
<body>
<div class="box">
<h1>Médias da Turma</h1>
<table>
<tr><th>Aluno</th><th>Nota 1</th><th>Nota 2</th><th>Média</th></tr>
<?php echo $linhas; ?>
</table>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
