<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$min = isset($_POST['min']) ? intval($_POST['min']) : 1;
$max = isset($_POST['max']) ? intval($_POST['max']) : 50;
if ($min > $max) {
    $tmp = $min;
    $min = $max;
    $max = $tmp;
}

$matriz = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $matriz[$i][$j] = rand($min, $max);
    }
}

$somaDiagonal = 0;
for ($i = 0; $i < 3; $i++) {
    $somaDiagonal += $matriz[$i][$i];
}

salvarResultado('ex10', [
    'resumo'       => "Matriz 3x3 gerada entre $min e $max → soma da diagonal $somaDiagonal",
    'matriz'       => $matriz,
    'somaDiagonal' => $somaDiagonal,
    'min'          => $min,
    'max'          => $max,
]);

header('Location: resultado.php');
exit;
