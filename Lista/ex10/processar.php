<?php
$min = isset($_POST['min']) ? intval($_POST['min']) : 1;
$max = isset($_POST['max']) ? intval($_POST['max']) : 50;
if ($min > $max) { $tmp = $min; $min = $max; $max = $tmp; }

$matriz = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $matriz[$i][$j] = rand($min, $max);
    }
}

$somaDiagonal = 0;
for ($i = 0; $i < 3; $i++) {
    $somaDiagonal += $matriz[$i][$i];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Diagonal Principal</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:420px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
table{border-collapse:collapse;margin:15px auto;}
td{border:1px solid #ccc;width:45px;height:45px;text-align:center;font-size:16px;}
.diag{background:#dbe9ff;font-weight:bold;}
p{font-size:16px;text-align:center;}
a{display:inline-block;margin-top:15px;color:#2d6cdf;}
</style>
</head>
<body>
<div class="box">
<h1>Matriz 3x3 Gerada</h1>
<table>
<?php for ($i = 0; $i < 3; $i++): ?>
  <tr>
  <?php for ($j = 0; $j < 3; $j++): ?>
    <td class="<?php echo ($i == $j) ? 'diag' : ''; ?>"><?php echo $matriz[$i][$j]; ?></td>
  <?php endfor; ?>
  </tr>
<?php endfor; ?>
</table>
<p><strong>Soma da diagonal principal: <?php echo $somaDiagonal; ?></strong></p>
<a href="index.php">&laquo; Voltar</a> <a href="index.php">&laquo; Voltar</a>nbsp;|<a href="index.php">&laquo; Voltar</a>nbsp; <a href="../menu/index.php">Menu</a>
</div>
</body>
</html>
