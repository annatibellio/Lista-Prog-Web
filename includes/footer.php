<?php
// usa o mesmo $base definido lá no header.php
$base = $base ?? '';
$resultados = todosResultados();
$exercicios = $GLOBALS['EXERCICIOS'] ?? [];
?>
<section class="painel">
  <h2>🔗 Resultados desta sessão</h2>
  <?php if (!empty($resultados)): ?>
    <p class="painel-sub">Os exercícios compartilham dados entre si através da sua sessão. Clique em um item para voltar e ver de novo exatamente o que foi calculado:</p>
    <div class="painel-grid">
      <?php foreach ($resultados as $chave => $dado): ?>
        <?php $info = $exercicios[$chave] ?? ['titulo' => $chave, 'icone' => '📄']; ?>
        <a class="painel-item" href="<?php echo $base . $chave; ?>/resultado.php" title="Voltar para o resultado do <?php echo htmlspecialchars($info['titulo']); ?>">
          <span class="painel-icone"><?php echo $info['icone']; ?></span>
          <div>
            <strong><?php echo htmlspecialchars($info['titulo']); ?></strong>
            <p><?php echo htmlspecialchars($dado['resumo'] ?? ''); ?></p>
            <small><?php echo htmlspecialchars($dado['quando'] ?? ''); ?></small>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p class="painel-vazio">Sem resultados ainda. Calcule algum exercício e ele aparece aqui, com um atalho pra voltar direto nesse resultado depois.</p>
  <?php endif; ?>
</section>
</main>

<div class="acessibilidade">
  <button type="button" id="a11y-toggle" class="acessibilidade-toggle" aria-expanded="false" aria-controls="a11y-painel" aria-label="Abrir opções de acessibilidade" title="Acessibilidade">♿</button>
  <div id="a11y-painel" class="acessibilidade-painel" role="menu">
    <h2>Acessibilidade</h2>
    <div class="acessibilidade-linha">
      <span>Tamanho do texto</span>
      <div class="acessibilidade-fonte">
        <button type="button" id="a11y-diminuir" aria-label="Diminuir tamanho do texto">A-</button>
        <button type="button" id="a11y-aumentar" aria-label="Aumentar tamanho do texto">A+</button>
      </div>
    </div>
    <div class="acessibilidade-linha">
      <span>Alto contraste</span>
      <button type="button" id="a11y-contraste" class="acessibilidade-contraste" aria-pressed="false">Ativar</button>
    </div>
  </div>
</div>

<footer class="rodape">
  <p>Lista de Exercícios em PHP &middot; <a href="<?php echo $base; ?>index.php">Voltar ao menu</a></p>
  <p class="rodape-assinatura">🌸 por Anna Tibellio</p>
</footer>
<script src="<?php echo $base; ?>assets/js/acessibilidade.js"></script>
</body>
</html>
