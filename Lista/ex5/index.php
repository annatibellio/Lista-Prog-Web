<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Questão 5 - Juros Compostos</title>
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
<h1>5. Cálculo de Juros Compostos</h1>
<form action="processar.php" method="POST">
  <label for="inicial">Valor inicial do investimento (R$):</label>
  <input type="number" step="0.01" min="0" id="inicial" name="inicial" value="1000" required>

  <label for="taxa">Taxa de juros ao mês (%):</label>
  <input type="number" step="0.01" min="0" id="taxa" name="taxa" value="1.5" required>

  <label for="meses">Período (meses):</label>
  <input type="number" step="1" min="1" id="meses" name="meses" value="12" required>

  <button type="submit">Simular</button>
  <br><small>Valores padrão conforme o enunciado (R$1.000,00 a 1,5% a.m. por 12 meses).</small>
</form>
</div>
</body>
</html>
