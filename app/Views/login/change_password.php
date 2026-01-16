<?php
$title = 'Alterar Senha';
$page_title = 'Alterar Senha';
$active = '';
$content = '
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Alterar Senha</h3>
              </div>
              <form action="' . \App\Config\Config::url('login/changePassword') . '" method="post">
                <div class="card-body">
                  ' . (isset($error) ? '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>' : '') . '
                  ' . (isset($message) ? '<div class="alert alert-success">' . htmlspecialchars($message) . '</div>' : '') . '
                  <div class="form-group">
                    <label for="senha_atual">Senha Atual</label>
                    <input type="password" class="form-control" id="senha_atual" name="senha_atual" required>
                  </div>
                  <div class="form-group">
                    <label for="nova_senha">Nova Senha</label>
                    <input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
                  </div>
                  <div class="form-group">
                    <label for="confirmar_senha">Confirmar Nova Senha</label>
                    <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Alterar Senha</button>
                </div>
              </form>
            </div>
          </div>
        </div>
';
include __DIR__ . '/../layouts/layout.php';
?>