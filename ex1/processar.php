<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$valor  = isset($_POST['valor'])  ? floatval($_POST['valor'])  : 0;
$codigo = isset($_POST['codigo']) ? intval($_POST['codigo'])   : 0;

if ($codigo == 1) {
    $percentual = 5;
} elseif ($codigo == 2) {
    $percentual = 10;
} elseif ($codigo == 3) {
    $percentual = 15;
} else {
    $percentual = 0;
}

$desconto   = $valor * ($percentual / 100);
$valorFinal = $valor - $desconto;

salvarResultado('ex1', [
    'resumo'     => 'Compra de R$ ' . number_format($valor, 2, ',', '.') . ' com ' . $percentual . '% de desconto → total R$ ' . number_format($valorFinal, 2, ',', '.'),
    'valor'      => $valor,
    'percentual' => $percentual,
    'desconto'   => $desconto,
    'valorFinal' => $valorFinal,
]);

header('Location: resultado.php');
exit;
