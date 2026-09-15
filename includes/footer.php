<?php
// usa o mesmo $base definido lá no header.php
$base = $base ?? '';
$resultados = todosResultados();
$exercicios = $GLOBALS['EXERCICIOS'] ?? [];
?>
<?php if (!empty($resultados)): ?>
<section class="painel">
  <h2>🔗 Resultados desta sessão</h2>
  <p class="painel-sub">Os exercícios compartilham dados entre si através da sua sessão. Veja o que você já calculou até agora:</p>
  <div class="painel-grid">
    <?php foreach ($resultados as $chave => $dado): ?>
      <?php $info = $exercicios[$chave] ?? ['titulo' => $chave, 'icone' => '📄']; ?>
      <div class="painel-item">
        <span class="painel-icone"><?php echo $info['icone']; ?></span>
        <div>
          <strong><?php echo htmlspecialchars($info['titulo']); ?></strong>
          <p><?php echo htmlspecialchars($dado['resumo'] ?? ''); ?></p>
          <small><?php echo htmlspecialchars($dado['quando'] ?? ''); ?></small>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
</main>
<footer class="rodape">
  <p>Lista de Exercícios em PHP &middot; <a href="<?php echo $base; ?>index.php">Voltar ao menu</a></p>
</footer>
</body>
</html>
