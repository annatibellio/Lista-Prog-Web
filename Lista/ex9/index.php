<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Questão 9 - Tabela de Notas de uma Turma</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;padding:30px;}
.box{background:#fff;max-width:480px;margin:auto;padding:25px;border-radius:8px;box-shadow:0 0 10px #ccc;}
h1{font-size:20px;color:#333;}
table{width:100%;border-collapse:collapse;margin-top:15px;}
th,td{padding:6px;text-align:center;}
input{width:90%;padding:6px;box-sizing:border-box;}
button{margin-top:18px;padding:10px 20px;background:#2d6cdf;color:#fff;border:none;border-radius:5px;cursor:pointer;}
button:hover{background:#1e4fa3;}
</style>
</head>
<body>
<div class="box">
<h1>9. Tabela de Notas de uma Turma</h1>
<form action="processar.php" method="POST">
  <table>
    <tr><th>Aluno</th><th>Nome</th><th>Nota 1</th><th>Nota 2</th></tr>
    <?php for ($i = 1; $i <= 3; $i++): ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><input type="text" name="nome[]" required></td>
      <td><input type="number" step="0.1" min="0" max="10" name="nota1[]" required></td>
      <td><input type="number" step="0.1" min="0" max="10" name="nota2[]" required></td>
    </tr>
    <?php endfor; ?>
  </table>
  <button type="submit">Calcular Médias</button>
</form>
</div>
</body>
</html>
