<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Esqueci minha senha</title>

  <!-- Google Font: Mukta -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700&display=swap">
  <style>
    body { font-family: 'Mukta', sans-serif; }
    .form-control, .form-select, .form-control:focus, .form-select:focus {
      border-color: #3e85bc !important;
    }
    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(62, 133, 188, 0.25);
    }
    .login-card-body .input-group .input-group-text, .register-card-body .input-group .input-group-text {
      background-color: #cedbe7;
      border-bottom-right-radius: .25rem;
      border-left: 0;
      border-color: #306eaa;
      border-top-right-radius: .25rem;
      color: #4685b3de;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
  </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= \App\Config\Config::url('dashboard/index') ?>">
      <img src="<?= \App\Config\Config::url('assets/images/logo.png') ?>" alt="Logo" style="height: 60px;">
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Esqueci minha senha</p>

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show">
          <?= htmlspecialchars($error) ?>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
      <?php endif; ?>

      <?php if (!empty($message)): ?>
        <div class="alert alert-success alert-dismissible fade show">
          <?= htmlspecialchars($message) ?>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
      <?php endif; ?>

      <form action="<?= \App\Config\Config::url('login/forgot') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Resetar Senha</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= \App\Config\Config::url('login/index') ?>">Voltar ao Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>