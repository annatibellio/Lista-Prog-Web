<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nomes  = isset($_POST['nome'])  ? $_POST['nome']  : [];
$notas1 = isset($_POST['nota1']) ? $_POST['nota1'] : [];
$notas2 = isset($_POST['nota2']) ? $_POST['nota2'] : [];

$n = count($nomes);
if ($n === 0) {
    header('Location: index.php');
    exit;
}

$linhas = "";
for ($i = 0; $i < $n; $i++) {
    $nome  = htmlspecialchars($nomes[$i]);
    $n1    = numero($notas1[$i]);
    $n2    = numero($notas2[$i]);
    $media = ($n1 + $n2) / 2;
    $linhas .= "<tr><td>$nome</td><td>" . number_format($n1, 1, ',', '.') .
               "</td><td>" . number_format($n2, 1, ',', '.') .
               "</td><td><strong>" . number_format($media, 2, ',', '.') . "</strong></td></tr>";
}

salvarResultado('ex9', [
    'resumo' => "Médias calculadas para $n aluno(s) da turma",
    'linhas' => $linhas,
    'n'      => $n,
]);

header('Location: resultado.php');
exit;
