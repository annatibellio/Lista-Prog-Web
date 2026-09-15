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

## Identidade visual e decisões de UX/UI

Depois da primeira entrega, o projeto passou por uma revisão de estética, responsividade, acessibilidade e usabilidade. A ideia não foi refazer o site do zero — a identidade e a estrutura que já existiam foram mantidas, e sim resolver problemas reais de uso e dar mais personalidade ao visual. Principais decisões:

- **Paleta em tons de rosa:** a cor de destaque do site deixou de ser azul/indigo e passou a ser um rosa (`--primary`), com um dourado suave (`--accent`) como cor complementar para caixas de sugestão e detalhes. A ideia foi ter uma estética delicada e com personalidade, mas sem exagerar (nada de rosa neon nem site "infantil") e mantendo bom contraste de texto.
- **Simplificação da página inicial:** antes existiam dois caminhos fazendo a mesma coisa na primeira tela, o link "Lista de Exercícios" (marca) e o botão "Menu" — e os dois levavam pro mesmo lugar. O botão "Menu" foi removido da página inicial por ser redundante; ele só aparece quando você já está dentro de um exercício, onde de fato tem função (voltar pro menu). Os cards de exercício também ganharam um texto "Abrir exercício" no rodapé do card, deixando mais óbvio que são clicáveis.
- **Navegação entre exercícios:** dentro de cada exercício, o topo agora tem um seletor "Ir para..." com a lista dos 10 exercícios, pra trocar de exercício sem precisar voltar pro menu principal a cada vez.
- **Setas decorativas removidas:** algumas setas (↻, →) que só decoravam botões e links foram removidas, deixando o texto limpo (ex: "Calcular novamente" em vez de "↻ Calcular novamente"). Os ícones que representam cada exercício (💰, 📐, ⚖️ etc.) foram mantidos, porque ajudam a identificar cada card rapidamente e fazem parte da identidade visual que já existia.
- **Textos que cortavam ou quebravam feio:** os títulos, resultados e textos dentro das caixas de destaque agora usam `overflow-wrap: break-word` e tamanhos de fonte fluidos (`clamp()`), pra nenhuma informação sumir ou ficar cortada em telas estreitas.

## Acessibilidade

Foi adicionada uma barrinha de acessibilidade (botão ♿ flutuante no canto da tela, presente em todas as páginas), com só as opções que realmente fazem sentido pro tipo de conteúdo do site:

- **Aumentar/diminuir o tamanho do texto** (A- / A+), em 3 níveis, salvo no navegador da pessoa (`localStorage`) pra continuar aplicado ao navegar entre os exercícios.
- **Alto contraste**, que troca a paleta pra uma versão com fundo escuro e texto/bordas com contraste bem mais alto.

Além da barra, o site também tem: link "Pular para o conteúdo" (aparece ao navegar por teclado, pra pular o cabeçalho), foco visível em todo elemento clicável (`:focus-visible`), labels associados a todo input, área de toque mínima de ~44px em botões e campos, e `prefers-reduced-motion` respeitado para quem desativa animação no sistema.

## Responsividade

A responsividade foi repensada pra reorganizar o layout de verdade em vez de só encolher os elementos. Testado nas larguras: ~320–375px (celular pequeno), ~390–430px (celular grande), ~768px (tablet/iPad retrato), ~1024px (iPad paisagem/notebook), ~1280px (notebook) e 1920px+ (desktop). Principais ajustes:

- Formulários em grade (`form-grid`) ficam em duas colunas em telas maiores e em uma coluna só a partir de ~600px de largura.
- **Tabelas** (exercícios 6 e 9, que têm uma linha por pessoa/aluno) viram uma lista de "cards" empilhados em telas de celular, com cada campo mostrando seu rótulo (ex: "Idade: ...", "Altura (m): ...") em vez de depender de colunas apertadas, assim nada fica ilegível ou cortado. Em telas maiores, continuam como tabela normal, e sempre têm rolagem horizontal de segurança caso o conteúdo não caiba.
- Inputs de texto usam fonte de 16px, porque abaixo disso o iPhone dá zoom automático ao focar o campo, outro detalhe que atrapalhava o uso no celular.
- Nenhum elemento deveria conseguir "vazar" pra fora da tela horizontalmente; isso foi testado explicitamente nas larguras citadas acima.

## Correção do horário no painel de resultados

O painel "Resultados desta sessão" mostrava um horário errado porque o projeto nunca definia um fuso horário (`date_default_timezone_set`), então o PHP calculava a hora usando o fuso padrão do servidor (geralmente UTC), não o horário local. Isso foi corrigido fixando o fuso em `America/Sao_Paulo` no `config.php`. Também foi resolvido um pedido de usabilidade: cada item do painel agora é um link clicável que leva direto pra tela de resultado daquele exercício, mostrando de novo exatamente o que foi calculado (sem precisar preencher tudo de novo), já que o resultado continua guardado na sessão.

## Entrada de altura no cálculo de IMC (exercício 3)

O cálculo do IMC já estava correto, mas o campo de altura gerava confusão: pedia "1,57" mas nada impedia a pessoa de digitar "157" pensando em centímetros, o que gerava um IMC absurdo. Agora esse campo tem uma máscara: a pessoa digita só os números (ex: 1, 5, 7) e o campo forma "1,57" sozinho, com uma dica de exemplo abaixo. Também existe uma validação (no JavaScript do formulário e de novo no PHP, caso o JavaScript esteja desativado) que rejeita alturas fora da faixa humana normal (0,30m a 2,50m) e explica o motivo em vez de deixar passar um valor sem sentido.

## Decisões de implementação

Algumas coisas ficaram um pouco diferentes do jeito mais "cru" que o enunciado pede, mas por escolha, não por engano. Documentando aqui pra ficar claro:

- **Exercício 6 (10 pessoas), Exercício 7 (4 notas) e Exercício 9 (3 alunos):** o enunciado pede uma quantidade fixa (10 pessoas no exercício 6, 4 notas no exercício 7, 3 alunos no exercício 9) e isso continua sendo o valor padrão quando a página abre. Mas adicionei um campo pra ajustar essa quantidade antes de preencher a tabela/formulário (de 2 a 30 pessoas no exercício 6, de 2 a 15 notas no exercício 7, de 1 a 20 alunos no exercício 9). A lógica de cálculo em si não mudou nada, só passou a se adaptar ao tamanho do array recebido em vez de assumir um número fixo no código. Fiz isso pra deixar o exercício reutilizável sem descaracterizar o que foi pedido, e apliquei o mesmo padrão nos três lugares em que fazia sentido matemático (não faria sentido, por exemplo, no exercício 8, que é sempre os 7 dias de uma semana, ou no exercício 10, explicado abaixo).
- **Exercício 10 (matriz 3x3):** esse eu deixei fixo em 3x3 mesmo. Aqui o "3x3" não é só uma quantidade de entradas, é o próprio conceito sendo praticado (percorrer índice de linha igual a índice de coluna pra achar a diagonal principal), então mudar isso ia fugir do que o exercício quer mostrar.
- **Exercício 8 (faturamento):** o campo de venda de cada dia aceita valor negativo, porque no contexto do exercício um dia pode ter mais devolução/prejuízo do que venda. Os outros campos numéricos do site (valor de compra, notas, idade, altura, peso etc.) continuam exigindo valor positivo, porque negativo não faz sentido pra eles.
- **Vírgula ou ponto nos campos decimais:** os campos de peso, altura, valores em R$, notas e taxa são campos de texto (não `type="number"`), porque o `input type="number"` do navegador às vezes só aceita ponto dependendo do idioma configurado no navegador, o que confunde quem vai digitar com vírgula (foi exatamente isso que causou o IMC errado ao testar: um "1,57" que não foi aceito virou "157"). Agora esses campos aceitam vírgula ou ponto igual, têm um exemplo escrito no placeholder (tipo "Ex: 1,57") e o PHP também trata os dois formatos antes de calcular.
- **Ligação entre exercícios:** o valor final do exercício 1 pode ser usado como valor inicial no exercício 5, e a altura do exercício 3 pode ser reaproveitada como a primeira linha do exercício 6. Isso é opcional, aparece só como um link sugerido na tela de resultado, e não interfere em nada se a pessoa ignorar e preencher os exercícios separados.

Fora essas decisões, o resto segue o enunciado igual, sem inventar nada.

## Como rodar / publicar o projeto

Esse projeto é PHP puro (não é HTML/CSS/JS estático), então isso muda como ele pode ser publicado:

- **Subir o código no GitHub:** funciona normalmente. O GitHub guarda qualquer tipo de arquivo, incluindo `.php`, sem problema, é só criar um repositório e enviar a pasta `ENTREGA` inteira.
- **GitHub Pages não serve esse site:** o GitHub Pages só publica arquivos estáticos (HTML/CSS/JS). Ele não tem um interpretador de PHP, então um `index.php` aberto por lá não executa: o navegador baixa o arquivo ou mostra o código-fonte, e os formulários/cálculos não funcionam.
- **Pra rodar de verdade, o PHP precisa ser executado em algum lugar:**
  - **Local, na própria máquina:** com XAMPP/Laragon, ou rodando `php -S localhost:8000` dentro da pasta `ENTREGA` (se o PHP já estiver instalado).
  - **Hospedagem gratuita com suporte a PHP:** InfinityFree, 000webhost, ou plataformas como Railway/Render com um buildpack de PHP.

Ou seja: o código pode (e deve) ficar no GitHub normalmente, mas se o objetivo for ter um link com o site funcionando de verdade — com os formulários calculando —, precisa de uma dessas opções com PHP, e não do GitHub Pages.
