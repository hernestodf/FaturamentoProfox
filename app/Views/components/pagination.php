<?php 
/**
 * Componente de Paginação
 * 
 * Variáveis esperadas:
 * - $page (int): página atual
 * - $totalPages (int): total de páginas
 * - $baseUrl (string): URL base para os links
 * - $total (int, opcional): total de registros
 */

if (!isset($page) || !isset($totalPages) || !isset($baseUrl)) {
    return;
}

// Construir query string mantendo filtros
$queryString = '';
if (isset($_GET) && !empty($_GET)) {
    $filters = $_GET;
    unset($filters['page']); // remover page dos filtros
    if (!empty($filters)) {
        $queryString = '&' . http_build_query($filters);
    }
}
?>

<?php if ($totalPages > 1): ?>
<nav aria-label="Paginação" style="margin-top: 20px; display: flex; justify-content: center;">
  <ul class="pagination">
    <!-- Primeira página -->
    <?php if ($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $baseUrl ?>?page=1<?= $queryString ?>">Primeira</a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link">Primeira</span>
      </li>
    <?php endif; ?>

    <!-- Página anterior -->
    <?php if ($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $baseUrl ?>?page=<?= $page - 1 ?><?= $queryString ?>">Anterior</a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link">Anterior</span>
      </li>
    <?php endif; ?>

    <!-- Números de páginas -->
    <?php 
    $start = max(1, $page - 2);
    $end = min($totalPages, $page + 2);
    
    if ($start > 1): ?>
      <li class="page-item disabled">
        <span class="page-link">...</span>
      </li>
    <?php endif; 
    
    for ($i = $start; $i <= $end; $i++): ?>
      <?php if ($i == $page): ?>
        <li class="page-item active">
          <span class="page-link">
            <?= $i ?>
            <span class="sr-only">(current)</span>
          </span>
        </li>
      <?php else: ?>
        <li class="page-item">
          <a class="page-link" href="<?= $baseUrl ?>?page=<?= $i ?><?= $queryString ?>"><?= $i ?></a>
        </li>
      <?php endif; ?>
    <?php endfor;
    
    if ($end < $totalPages): ?>
      <li class="page-item disabled">
        <span class="page-link">...</span>
      </li>
    <?php endif; ?>

    <!-- Próxima página -->
    <?php if ($page < $totalPages): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $baseUrl ?>?page=<?= $page + 1 ?><?= $queryString ?>">Próxima</a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link">Próxima</span>
      </li>
    <?php endif; ?>

    <!-- Última página -->
    <?php if ($page < $totalPages): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $baseUrl ?>?page=<?= $totalPages ?><?= $queryString ?>">Última</a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link">Última</span>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<?php endif; ?>

<div style="text-align: center; margin-top: 15px; padding: 10px; background-color: #f9f9f9; border-radius: 4px; color: #666;">
  <strong>Página <?= $page ?> de <?= $totalPages ?></strong> | 
  <strong>Total de registros encontrados: <?= isset($total) ? $total : 'N/A' ?></strong>
  <?php if (!empty($_GET)): ?>
    <br><small style="color: #999;">Filtros aplicados</small>
  <?php endif; ?>
</div>
