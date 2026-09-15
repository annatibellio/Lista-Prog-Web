<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$peso   = isset($_POST['peso'])   ? floatval($_POST['peso'])   : 0;
$altura = isset($_POST['altura']) ? floatval($_POST['altura']) : 0;

$imc = ($altura > 0) ? $peso / ($altura * $altura) : 0;

if ($imc < 18.5) {
    $categoria = "Abaixo do peso";
} elseif ($imc < 25) {
    $categoria = "Peso normal";
} elseif ($imc < 30) {
    $categoria = "Sobrepeso";
} else {
    $categoria = "Obesidade";
}

salvarResultado('ex3', [
    'resumo' => "Peso {$peso}kg, altura {$altura}m → IMC " . number_format($imc, 2, ',', '.') . " ($categoria)",
    'peso' => $peso,
    'altura' => $altura,
    'imc' => $imc,
    'categoria' => $categoria,
]);

header('Location: resultado.php');
exit;
