<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$numero = isset($_POST['numero']) ? intval($_POST['numero']) : 0;

salvarResultado('ex4', [
    'resumo' => "Tabuada do $numero gerada (1 a 10)",
    'numero' => $numero,
]);

header('Location: resultado.php');
exit;
