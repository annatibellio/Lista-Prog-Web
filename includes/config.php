<?php
// config.php - todo exercício inclui esse arquivo primeiro.
// inicia a sessão e guarda as funções que os exercícios usam pra
// salvar/ler resultado (é assim que um exercício consegue reaproveitar
// o valor calculado em outro, tipo o total do ex1 indo pro ex5).

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Catálogo central dos exercícios: usado no menu e no painel de resultados.
$GLOBALS['EXERCICIOS'] = [
    'ex1'  => ['titulo' => 'Cálculo de Desconto em Compra',      'icone' => '💰', 'desc' => 'Calcule descontos de acordo com o tipo de cliente.'],
    'ex2'  => ['titulo' => 'Classificação de Triângulos',        'icone' => '📐', 'desc' => 'Descubra o tipo de triângulo a partir dos 3 lados.'],
    'ex3'  => ['titulo' => 'Cálculo de IMC com Categoria',       'icone' => '⚖️', 'desc' => 'Calcule o IMC e veja em qual categoria você está.'],
    'ex4'  => ['titulo' => 'Tabuada Personalizada',              'icone' => '✖️', 'desc' => 'Gere a tabuada completa de um número.'],
    'ex5'  => ['titulo' => 'Cálculo de Juros Compostos',         'icone' => '📈', 'desc' => 'Simule a evolução de um investimento mês a mês.'],
    'ex6'  => ['titulo' => 'Estatística de Alturas',             'icone' => '📏', 'desc' => 'Maior, menor e média de altura de um grupo.'],
    'ex7'  => ['titulo' => 'Calculadora de Média e Aprovação',   'icone' => '🎓', 'desc' => 'Calcule a média de 4 notas e a situação final.'],
    'ex8'  => ['titulo' => 'Análise de Faturamento Diário',      'icone' => '💵', 'desc' => 'Analise as vendas da semana e ache destaques.'],
    'ex9'  => ['titulo' => 'Tabela de Notas de uma Turma',       'icone' => '🏫', 'desc' => 'Monte a tabela de médias de até 3 alunos.'],
    'ex10' => ['titulo' => 'Soma da Diagonal Principal',         'icone' => '🔢', 'desc' => 'Gere uma matriz 3x3 e some a diagonal principal.'],
];

// salva o resultado de um exercício na sessão (chave tipo 'ex1', 'ex2'...)
// $dados precisa ter pelo menos 'resumo', que é o texto curto mostrado
// no painel de resultados do rodapé
function salvarResultado($chave, array $dados)
{
    $_SESSION['resultados'][$chave] = array_merge($dados, [
        'quando' => date('d/m/Y H:i'),
    ]);
}

// pega o resultado salvo de um exercício, ou null se ainda não calculou
function obterResultado($chave)
{
    return $_SESSION['resultados'][$chave] ?? null;
}

// pega todos os resultados já calculados na sessão atual
function todosResultados()
{
    return $_SESSION['resultados'] ?? [];
}

// converte texto de input em número, aceitando tanto "1.57" quanto "1,57".
// o input type="number" do navegador normalmente já manda com ponto, mas
// isso evita dor de cabeça se alguém colar um valor com vírgula ou digitar
// de outro jeito. usar essa função no lugar de floatval() direto nos campos
// decimais (peso, altura, valores em R$, notas, taxa etc).
function numero($valor)
{
    $valor = trim((string) $valor);
    $valor = str_replace(',', '.', $valor);
    return (float) $valor;
}
