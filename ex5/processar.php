<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$inicial = isset($_POST['inicial']) ? floatval($_POST['inicial']) : 1000;
$taxa    = isset($_POST['taxa'])    ? floatval($_POST['taxa'])    : 1.5;
$meses   = isset($_POST['meses'])   ? intval($_POST['meses'])     : 12;
if ($meses < 1) { $meses = 1; }

$saldo  = $inicial;
$linhas = [];

for ($mes = 1; $mes <= $meses; $mes++) {
    $rendimento = $saldo * ($taxa / 100);
    $saldo += $rendimento;
    $linhas[] = "Mês $mes: rendimento de R$ " . number_format($rendimento, 2, ',', '.') .
                " | saldo acumulado: R$ " . number_format($saldo, 2, ',', '.');
}

salvarResultado('ex5', [
    'resumo'  => "Investimento de R$ " . number_format($inicial, 2, ',', '.') . " por $meses meses → saldo final R$ " . number_format($saldo, 2, ',', '.'),
    'inicial' => $inicial,
    'taxa'    => $taxa,
    'meses'   => $meses,
    'linhas'  => $linhas,
    'saldo'   => $saldo,
]);

header('Location: resultado.php');
exit;
