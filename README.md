# Lista de Exercícios em PHP

Projeto feito pra resolver a lista de exercícios de Estruturas Condicionais, Laços de Repetição, Arrays Unidimensionais e Arrays Bidimensionais (Matrizes). São 10 exercícios, cada um com sua própria página, formulário e resultado.

## Sobre o projeto

A ideia foi não fazer 10 arquivos PHP soltos, mas montar um "mini site" onde dá pra abrir cada exercício por um menu, ver o resultado numa página separada e, em alguns casos, aproveitar o resultado de um exercício em outro (tipo usar o valor final do desconto do exercício 1 como valor inicial no exercício 5, de juros compostos). Isso não estava pedido no enunciado, mas achei que dava pra mostrar de um jeito mais interessante e ainda assim usando exatamente os conceitos da lista.

Conceitos praticados: if/else e switch (condicional), for/while (laço), arrays de uma dimensão (vetores) e arrays de duas dimensões (matrizes), manipulação de sessão em PHP, formulários POST e GET.

## Exercícios

1. **Desconto em Compra** (condicional): calcula desconto de 5%, 10% ou 15% conforme o tipo de cliente.
2. **Classificação de Triângulos** (condicional): recebe 3 lados, verifica se formam triângulo válido e classifica em equilátero, isósceles ou escaleno.
3. **IMC com Categoria** (condicional): calcula IMC = peso / altura² e mostra a classificação (abaixo do peso, peso normal, sobrepeso, obesidade).
4. **Tabuada Personalizada** (laço): gera a tabuada de 1 a 10 de um número.
5. **Juros Compostos** (laço): simula mês a mês o crescimento de um investimento.
6. **Estatística de Alturas** (laço): a partir de idade e altura de um grupo de pessoas, acha a maior altura, a menor e a média de altura de quem tem mais de 18 anos.
7. **Média e Aprovação** (array unidimensional): calcula a média de 4 notas e diz se o aluno está aprovado, em recuperação ou reprovado.
8. **Análise de Faturamento Diário** (array unidimensional): a partir das vendas de 7 dias, acha o total da semana, o dia de maior faturamento e quantos dias ficaram acima da média.
9. **Tabela de Notas de uma Turma** (array bidimensional): monta uma matriz com nome e 2 notas de cada aluno e calcula a média individual.
10. **Soma da Diagonal Principal** (array bidimensional): gera uma matriz 3x3 de números aleatórios e soma os valores da diagonal principal.

## Tecnologias

- **PHP** puro (sem framework), pra tratar os formulários e fazer os cálculos.
- **Sessão do PHP** (`$_SESSION`), pra guardar o resultado de cada exercício e mostrar no painel de resultados no rodapé das páginas.
- **HTML** pros formulários e estrutura das páginas.
- **CSS** puro num arquivo só (`assets/css/style.css`), com variáveis CSS (`:root`) pra manter cor e espaçamento padronizados em todo o site.
- Google Fonts (Poppins) só pra fonte.

Não usei banco de dados, JS de framework nem nada além disso. Não precisava pra esse escopo.

## Estrutura

```
ENTREGA/
├── index.php              menu principal com os 10 exercícios
├── includes/
│   ├── config.php          inicia a sessão e tem as funções compartilhadas
│   ├── header.php          topo comum de todas as páginas
│   └── footer.php          rodapé comum + painel de resultados
├── assets/css/style.css    todo o CSS do site
└── ex1/ ... ex10/          uma pasta por exercício, sempre com:
    ├── index.php            formulário
    ├── processar.php        recebe o POST, calcula e salva na sessão
    └── resultado.php        mostra o resultado calculado
```

Cada exercício segue o mesmo padrão (index → processar → resultado), então depois que entende um, entende todos. Isso ajuda a manter o código organizado sem repetir estrutura diferente em cada pasta.

## Decisões de implementação

Algumas coisas ficaram um pouco diferentes do jeito mais "cru" que o enunciado pede, mas por escolha, não por engano. Documentando aqui pra ficar claro:

- **Exercício 6 (10 pessoas) e Exercício 9 (3 alunos):** o enunciado pede uma quantidade fixa (10 pessoas no exercício 6, 3 alunos no exercício 9) e isso continua sendo o valor padrão quando a página abre. Mas adicionei um campo pra ajustar essa quantidade antes de preencher a tabela (de 2 a 30 pessoas no exercício 6, de 1 a 20 alunos no exercício 9). A lógica de cálculo em si não mudou nada, só passou a se adaptar ao tamanho do array recebido em vez de assumir um número fixo no código. Fiz isso pra deixar o exercício reutilizável sem descaracterizar o que foi pedido.
- **Exercício 10 (matriz 3x3):** esse eu deixei fixo em 3x3 mesmo. Aqui o "3x3" não é só uma quantidade de entradas, é o próprio conceito sendo praticado (percorrer índice de linha igual a índice de coluna pra achar a diagonal principal), então mudar isso ia fugir do que o exercício quer mostrar.
- **Exercício 8 (faturamento):** o campo de venda de cada dia aceita valor negativo, porque no contexto do exercício um dia pode ter mais devolução/prejuízo do que venda. Os outros campos numéricos do site (valor de compra, notas, idade, altura, peso etc.) continuam exigindo valor positivo, porque negativo não faz sentido pra eles.
- **Vírgula ou ponto nos campos decimais:** os campos de peso, altura, valores em R$, notas e taxa são campos de texto (não `type="number"`), porque o `input type="number"` do navegador às vezes só aceita ponto dependendo do idioma configurado no navegador, o que confunde quem vai digitar com vírgula (foi exatamente isso que causou o IMC errado ao testar: um "1,57" que não foi aceito virou "157"). Agora esses campos aceitam vírgula ou ponto igual, têm um exemplo escrito no placeholder (tipo "Ex: 1,57") e o PHP também trata os dois formatos antes de calcular.
- **Ligação entre exercícios:** o valor final do exercício 1 pode ser usado como valor inicial no exercício 5, e a altura do exercício 3 pode ser reaproveitada como a primeira linha do exercício 6. Isso é opcional, aparece só como um link sugerido na tela de resultado, e não interfere em nada se a pessoa ignorar e preencher os exercícios separados.

Fora essas decisões, o resto segue o enunciado igual, sem inventar nada.
