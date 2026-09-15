<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$peso   = isset($_POST['peso'])   ? numero($_POST['peso'])   : 0;
$altura = isset($_POST['altura']) ? numero($_POST['altura']) : 0;

// Alguém pode digitar "157" pensando em centímetros mesmo com a máscara
// (ex: colando o valor, ou com JS desativado). Uma altura fora da faixa
// humana normal (0,30m a 2,50m) não é válida, então barramos aqui também,
// e não só no JavaScript do formulário.
if ($altura <= 0 || $altura < 0.3 || $altura > 2.5) {
    header('Location: index.php?erro=altura');
    exit;
}

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
