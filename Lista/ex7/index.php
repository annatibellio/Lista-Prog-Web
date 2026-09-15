<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Questão 7 - Média e Aprovação</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:420px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
label{display:block;margin-top:12px;font-weight:bold;}
input{width:100%;padding:8px;margin-top:5px;box-sizing:border-box;}
button{margin-top:18px;padding:10px 20px;background:#2d6cdf;color:#fff;border:none;border-radius:5px;cursor:pointer;}
button:hover{background:#1e4fa3;}
</style>
</head>
<body>
<div class="box">
<h1>7. Calculadora de Média e Aprovação</h1>
<form action="processar.php" method="POST">
  <?php for ($i = 1; $i <= 4; $i++): ?>
    <label for="nota<?php echo $i; ?>">Nota <?php echo $i; ?>:</label>
    <input type="number" step="0.1" min="0" max="10" id="nota<?php echo $i; ?>" name="notas[]" required>
  <?php endfor; ?>
  <button type="submit">Calcular</button>
</form>
</div>
</body>
</html>
