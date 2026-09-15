<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$a = isset($_POST['a']) ? numero($_POST['a']) : 0;
$b = isset($_POST['b']) ? numero($_POST['b']) : 0;
$c = isset($_POST['c']) ? numero($_POST['c']) : 0;

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

salvarResultado('ex2', [
    'resumo' => $valido
        ? "Lados $a, $b, $c → $classificacao"
        : "Lados $a, $b, $c → não formam um triângulo válido",
    'a' => $a, 'b' => $b, 'c' => $c,
    'valido' => $valido,
    'classificacao' => $classificacao,
]);

header('Location: resultado.php');
exit;
