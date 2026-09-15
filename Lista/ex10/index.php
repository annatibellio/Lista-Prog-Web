<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Questão 10 - Soma da Diagonal Principal</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:420px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
label{display:block;margin-top:12px;font-weight:bold;}
input{width:100%;padding:8px;margin-top:5px;box-sizing:border-box;}
button{margin-top:18px;padding:10px 20px;background:#2d6cdf;color:#fff;border:none;border-radius:5px;cursor:pointer;}
button:hover{background:#1e4fa3;}
small{color:#777;}
</style>
</head>
<body>
<div class="box">
<h1>10. Soma dos Elementos da Diagonal Principal</h1>
<form action="processar.php" method="POST">
  <label for="min">Valor mínimo para gerar a matriz 3x3:</label>
  <input type="number" step="1" id="min" name="min" value="1" required>
  <label for="max">Valor máximo para gerar a matriz 3x3:</label>
  <input type="number" step="1" id="max" name="max" value="50" required>
  <button type="submit">Gerar Matriz Aleatória</button>
  <br><small>A matriz 3x3 de inteiros aleatórios é gerada pelo PHP dentro do intervalo informado.</small>
</form>
</div>
</body>
</html>
