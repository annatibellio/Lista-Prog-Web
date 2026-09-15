<?php
require __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$dias   = ["Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado","Domingo"];
$vendas = isset($_POST['vendas']) ? array_map('floatval', $_POST['vendas']) : [];

if (count($vendas) === 0) {
    header('Location: index.php');
    exit;
}

$total = array_sum($vendas);
$media = $total / count($vendas);

$maiorValor  = max($vendas);
$indiceMaior = array_search($maiorValor, $vendas);
$diaMaior    = $dias[$indiceMaior] ?? '-';

$diasAcimaMedia = 0;
foreach ($vendas as $v) {
    if ($v > $media) {
        $diasAcimaMedia++;
    }
}

salvarResultado('ex8', [
    'resumo'         => "Faturamento semanal R$ " . number_format($total, 2, ',', '.') . ", pico em $diaMaior",
    'total'          => $total,
    'media'          => $media,
    'diaMaior'       => $diaMaior,
    'maiorValor'     => $maiorValor,
    'diasAcimaMedia' => $diasAcimaMedia,
]);

header('Location: resultado.php');
exit;
