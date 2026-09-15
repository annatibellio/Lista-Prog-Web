<?php
/**
 * Configuração central do site.
 * Todo exercício inclui este arquivo primeiro: ele inicia a sessão e
 * disponibiliza as funções usadas para os exercícios "conversarem" entre si
 * (cada cálculo pode salvar seu resultado na sessão e ser lido por outro
 * exercício, ou apenas aparecer no painel de resultados do menu).
 */

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

/**
 * Salva o resultado de um exercício na sessão do usuário.
 * $chave  = 'ex1', 'ex2', ... (bate com o índice de $GLOBALS['EXERCICIOS'])
 * $dados  = array associativo livre; deve conter pelo menos 'resumo' (texto
 *           curto exibido no painel de resultados) e pode conter outros
 *           valores brutos que outro exercício queira reaproveitar.
 */
function salvarResultado($chave, array $dados)
{
    $_SESSION['resultados'][$chave] = array_merge($dados, [
        'quando' => date('d/m/Y H:i'),
    ]);
}

/** Lê o resultado salvo de um exercício específico (ou null se não existe). */
function obterResultado($chave)
{
    return $_SESSION['resultados'][$chave] ?? null;
}

/** Lê todos os resultados já calculados nesta sessão. */
function todosResultados()
{
    return $_SESSION['resultados'] ?? [];
}
