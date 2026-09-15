<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$notas = isset($_POST['notas']) ? $_POST['notas'] : [];
$notas = array_map('floatval', $notas);

if (count($notas) === 0) {
    header('Location: index.php');
    exit;
}

$media = array_sum($notas) / count($notas);

if ($media >= 7) {
    $situacao = "Aprovado";
    $classeBadge = "success";
} elseif ($media >= 5) {
    $situacao = "Recuperação";
    $classeBadge = "warning";
} else {
    $situacao = "Reprovado";
    $classeBadge = "danger";
}

salvarResultado('ex7', [
    'resumo'      => "Média " . number_format($media, 2, ',', '.') . " → $situacao",
    'notas'       => $notas,
    'media'       => $media,
    'situacao'    => $situacao,
    'classeBadge' => $classeBadge,
]);

header('Location: resultado.php');
exit;
