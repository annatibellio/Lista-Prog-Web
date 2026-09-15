<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Questão 1 - Desconto em Compra</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:420px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
label{display:block;margin-top:12px;font-weight:bold;}
input,select{width:100%;padding:8px;margin-top:5px;box-sizing:border-box;}
button{margin-top:18px;padding:10px 20px;background:#2d6cdf;color:#fff;border:none;border-radius:5px;cursor:pointer;}
button:hover{background:#1e4fa3;}
</style>
</head>
<body>
<div class="box">
<h1>1. Cálculo de Desconto em Compra</h1>
<form action="processar.php" method="POST">
  <label for="valor">Valor total da compra (R$):</label>
  <input type="number" step="0.01" min="0" id="valor" name="valor" required>

  <label for="codigo">Código do cliente:</label>
  <select id="codigo" name="codigo">
    <option value="1">1 - Cliente Comum (5%)</option>
    <option value="2">2 - VIP (10%)</option>
    <option value="3">3 - Funcionário (15%)</option>
  </select>

  <button type="submit">Calcular</button>
</form>
</div>
</body>
</html>
