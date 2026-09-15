<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$idades  = isset($_POST['idade'])  ? $_POST['idade']  : [];
$alturas = isset($_POST['altura']) ? $_POST['altura'] : [];

$n = count($alturas);
if ($n === 0) {
    header('Location: index.php');
    exit;
}

$maiorAltura = null;
$menorAltura = null;
$somaMaiores = 0;
$qtdMaiores  = 0;

for ($i = 0; $i < $n; $i++) {
    $idade  = intval($idades[$i]);
    $altura = floatval($alturas[$i]);

    if ($maiorAltura === null || $altura > $maiorAltura) {
        $maiorAltura = $altura;
    }
    if ($menorAltura === null || $altura < $menorAltura) {
        $menorAltura = $altura;
    }
    if ($idade > 18) {
        $somaMaiores += $altura;
        $qtdMaiores++;
    }
}

$mediaMaiores = ($qtdMaiores > 0) ? $somaMaiores / $qtdMaiores : 0;

salvarResultado('ex6', [
    'resumo'       => "Maior altura " . number_format($maiorAltura, 2, ',', '.') . "m, menor " . number_format($menorAltura, 2, ',', '.') . "m",
    'maiorAltura'  => $maiorAltura,
    'menorAltura'  => $menorAltura,
    'qtdMaiores'   => $qtdMaiores,
    'mediaMaiores' => $mediaMaiores,
]);

header('Location: resultado.php');
exit;
