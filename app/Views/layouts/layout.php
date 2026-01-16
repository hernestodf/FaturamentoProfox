<?php use App\Config\Config; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Permissions-Policy" content="storage-access=()">
  <link rel="icon" type="image/x-icon" href="<?= Config::url('../../favicon.ico') ?>">
  <title>Profox Networks | <?= $title ?? 'Dashboard' ?></title>

  <!-- Google Font: Inter (mais moderno) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <style>
    :root {
      --primary-color: #1e40af;
      --primary-dark: #1e3a8a;
      --primary-light: #3b82f6;
      --sidebar-bg: #1e293b;
      --sidebar-hover: #334155;
      --text-primary: #0f172a;
      --text-secondary: #64748b;
      --border-color: #cbd5e1;
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --danger-color: #ef4444;
    }
    
    body { 
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      font-size: 14px;
      color: var(--text-primary);
      background-color: #f8fafc;
    }
    
    /* Navbar moderna */
    .main-header {
      background: #1e40af !important;
      border-bottom: none !important;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    
    .main-header .navbar-nav .nav-link {
      color: white !important;
      font-weight: 500;
    }
    
    .main-header .navbar-nav .nav-link:hover {
      color: rgba(255,255,255,0.8) !important;
    }
    
    /* Sidebar elegante */
    .main-sidebar {
      background: var(--sidebar-bg) !important;
      box-shadow: 2px 0 12px rgba(0,0,0,0.1);
    }
    
    .brand-link {
      background: rgba(255,255,255,0.05) !important;
      border-bottom: 1px solid rgba(255,255,255,0.1) !important;
      padding: 1rem 1.5rem !important;
    }
    
    .brand-text {
      color: white !important;
      font-weight: 600 !important;
      font-size: 1.1rem !important;
      letter-spacing: -0.02em;
    }
    
    .brand-image {
      opacity: 0.95;
      filter: brightness(1.1);
    }
    
    /* Menu lateral moderno */
    .nav-sidebar .nav-link {
      color: #94a3b8 !important;
      border-radius: 8px;
      margin: 4px 8px;
      padding: 0.65rem 1rem;
      transition: all 0.2s ease;
    }
    
    .nav-sidebar .nav-link:hover {
      background: var(--sidebar-hover) !important;
      color: white !important;
    }
    
    .nav-sidebar .nav-link.active {
      background: var(--primary-color) !important;
      color: white !important;
      box-shadow: 0 2px 8px rgba(30, 64, 175, 0.3);
    }
    
    .nav-sidebar .nav-icon {
      margin-right: 0.75rem;
      font-size: 1.1rem;
    }
    
    /* Cards modernos */
    .card {
      border: 1px solid var(--border-color);
      border-radius: 8px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.08);
      margin-bottom: 1.5rem;
      transition: box-shadow 0.2s ease;
    }
    
    .card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }
    
    .card-header {
      background: var(--primary-color) !important;
      color: white !important;
      border: none !important;
      border-radius: 8px 8px 0 0 !important;
      padding: 1rem 1.5rem;
      font-weight: 600;
    }
    
    .card-title {
      margin: 0;
      font-size: 1.1rem;
      font-weight: 600;
    }
    
    .card-body {
      padding: 1.5rem;
    }
    
    /* Botões modernos */
    .btn {
      border-radius: 6px;
      font-weight: 500;
      padding: 0.5rem 1.25rem;
      transition: all 0.2s ease;
      border: none;
    }
    
    .btn-primary {
      background: var(--primary-color);
      box-shadow: 0 2px 4px rgba(30, 64, 175, 0.2);
    }
    
    .btn-primary:hover {
      background: var(--primary-dark);
      box-shadow: 0 4px 8px rgba(30, 64, 175, 0.3);
    }
    
    .btn-info {
      background: #0891b2;
    }
    
    .btn-info:hover {
      background: #0e7490;
    }
    
    .btn-success {
      background: #059669;
    }
    
    .btn-success:hover {
      background: #047857;
    }
    
    .btn-danger {
      background: #dc2626;
    }
    
    .btn-danger:hover {
      background: #b91c1c;
    }
    
    .btn-secondary {
      background: #475569;
    }
    
    .btn-secondary:hover {
      background: #334155;
    }
    
    /* Forms modernos */
    .form-control, .form-select {
      border: 2px solid var(--border-color) !important;
      border-radius: 6px;
      padding: 0.6rem 1rem;
      transition: all 0.2s ease;
      background-color: white;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary-color) !important;
      box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1) !important;
      background-color: white;
    }
    
    .form-group label {
      font-weight: 500;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }
    
    /* Tabelas modernas */
    .table {
      border-collapse: separate;
      border-spacing: 0;
    }
    
    .table thead th {
      background: #f1f5f9;
      color: var(--text-primary);
      font-weight: 600;
      border: none;
      padding: 1rem;
      font-size: 0.875rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    
    .table tbody tr {
      transition: background-color 0.2s ease;
    }
    
    .table tbody tr:hover {
      background-color: #f8fafc;
    }
    
    .table tbody td {
      padding: 1rem;
      border-bottom: 1px solid var(--border-color);
      vertical-align: middle;
    }
    
    /* Content wrapper */
    .content-wrapper {
      background-color: #f8fafc !important;
      padding: 1.5rem;
    }
    
    /* Dropdown moderno */
    .dropdown-menu {
      border: 1px solid var(--border-color);
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      padding: 0.5rem;
    }
    
    .dropdown-item {
      border-radius: 6px;
      padding: 0.65rem 1rem;
      margin: 2px 0;
      transition: all 0.2s ease;
    }
    
    .dropdown-item:hover {
      background: var(--primary-color);
      color: white;
    }
    
    /* Badges modernos */
    .badge {
      border-radius: 4px;
      padding: 0.35rem 0.75rem;
      font-weight: 500;
    }
    
    /* Scrollbar personalizada */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    
    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Summernote CSS -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <?= htmlspecialchars($_SESSION['user']['usuario']) ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= Config::url('login/changePassword') ?>" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Alterar Senha
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= Config::url('login/logout') ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Config::url('dashboard/index') ?>" class="brand-link">
      <img src="<?= Config::url('assets/images/logosemnome.png') ?>" alt="Logo" class="brand-image" style="height: 40px; margin-right: 10px;">
      <span class="brand-text font-weight-bold">Profox Networks</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= Config::url('dashboard/index') ?>" class="nav-link<?= $active == 'dashboard' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= Config::url('clientes/index') ?>" class="nav-link<?= $active == 'clientes' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= Config::url('itemlocacoes/index') ?>" class="nav-link<?= $active == 'itemlocacoes' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Itens de Locação</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= Config::url('faturas/index') ?>" class="nav-link<?= $active == 'faturas' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>Faturas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= Config::url('relatorios/index') ?>" class="nav-link<?= $active == 'relatorios' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Relatórios</p>
            </a>
          </li>
          <?php 
          if (isset($_SESSION['user'])) {
              $loginModel = new \App\Models\Login();
              if ($loginModel->isAdmin($_SESSION['user']['id'])): 
          ?>
          <li class="nav-item">
            <a href="<?= Config::url('usuarios/index') ?>" class="nav-link<?= $active == 'usuarios' ? ' active' : '' ?>">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Usuários</p>
            </a>
          </li>
          <?php 
              endif;
          }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $page_title ?? 'Dashboard' ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?= $content ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>&copy; 2026 <a href="#">Hernesto Filho</a>.</strong> Todos os direitos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- jQuery (DEVE carregar antes de qualquer coisa que use $) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 (Vanilla JS version) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<!-- Request Storage Access for Firefox Tracking Prevention -->
<script>
// Tenta obter permissão de acesso ao storage para contornar Tracking Prevention do Firefox
if (document.requestStorageAccess) {
    document.requestStorageAccess()
        .then(function() {
            console.log('Storage access granted');
        })
        .catch(function(err) {
            // Silenciosamente falha - não impede funcionamento
        });
}
</script>
<!-- AdminLTE App (Vanilla JS implementation) -->
<script>
// Vanilla JS implementations for AdminLTE functionalities
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle
    const toggleBtn = document.querySelector('[data-widget="pushmenu"]');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('sidebar-collapse');
        });
    }

    // Modal functionality
    const modalTriggers = document.querySelectorAll('[data-toggle="modal"]');
    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('data-target'));
            if (target) {
                target.style.display = 'block';
                target.classList.add('show');
                document.body.classList.add('modal-open');
            }
        });
    });

    // Close modals
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal') || e.target.classList.contains('close') || e.target.getAttribute('data-dismiss') === 'modal') {
            const modal = e.target.closest('.modal');
            if (modal) {
                modal.style.display = 'none';
                modal.classList.remove('show');
                document.body.classList.remove('modal-open');
            }
        }
    });

    // Dropdown toggle
    const dropdownToggles = document.querySelectorAll('[data-toggle="dropdown"]');
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = this.nextElementSibling;
            if (dropdown && dropdown.classList.contains('dropdown-menu')) {
                dropdown.classList.toggle('show');
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                menu.classList.remove('show');
            });
        }
    });

    // Initialize money mask with vanilla JS
    const moneyInputs = document.querySelectorAll('.money');
    moneyInputs.forEach(function(input) {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = (value / 100).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            e.target.value = value;
        });
    });
});
</script>
</body>
</html>