<?php
namespace App\Controllers;

use App\Models\Login;
use App\Config\Config;

class LoginController {
    private $model;
    
    public function __construct() {
        $this->model = new Login();
    }
    
    public function index() {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['user'])) {
            header('Location: ' . Config::url('dashboard/index'));
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $senha = $_POST['senha'] ?? '';
            
            $user = $this->model->authenticate($usuario, $senha);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                if (isset($_POST['remember'])) {
                    setcookie('remember_user', $user['id'], time() + 30*24*3600, '/');
                }
                header('Location: ' . Config::url('dashboard/index'));
                exit;
            } else {
                $error = 'Usuário ou senha inválidos';
            }
        }
        
        require_once __DIR__ . '/../Views/login/index.php';
    }
    
    public function logout() {
        session_start();
        session_destroy();
        setcookie('remember_user', '', time() - 3600, '/');
        header('Location: ' . Config::url('login/index'));
        exit;
    }
    
    public function changePassword() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . Config::url('login/index'));
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $senha_atual = $_POST['senha_atual'] ?? '';
            $nova_senha = $_POST['nova_senha'] ?? '';
            $confirmar_senha = $_POST['confirmar_senha'] ?? '';
            
            if ($nova_senha !== $confirmar_senha) {
                $error = 'As senhas não coincidem.';
            } elseif ($this->model->authenticate($_SESSION['user']['usuario'], $senha_atual)) {
                $this->model->usuario = $_SESSION['user']['usuario'];
                $this->model->senha = $nova_senha;
                if ($this->model->updatePassword()) {
                    $message = 'Senha alterada com sucesso.';
                } else {
                    $error = 'Erro ao alterar senha.';
                }
            } else {
                $error = 'Senha atual incorreta.';
            }
        }
        
        require_once __DIR__ . '/../Views/login/change_password.php';
    }
    
    public function forgot() {
        // Página de recuperação de senha
        $message = '';
        $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            
            if (!empty($usuario)) {
                // Verifica se o usuário existe e qual é seu nível
                $query = "SELECT nivel FROM login WHERE usuario = :usuario";
                $database = new \App\Config\Database();
                $conn = $database->connect();
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':usuario', $usuario);
                $stmt->execute();
                $user = $stmt->fetch(\PDO::FETCH_ASSOC);
                
                if ($user) {
                    if ($user['nivel'] === 'admin') {
                        // Admin pode ter instruções especiais (futuramente: envio de email)
                        $message = 'Instruções de recuperação serão enviadas para o administrador.';
                    } else {
                        // Usuário comum deve procurar o administrador
                        $error = 'Você não tem permissão para redefinir sua própria senha. Por favor, entre em contato com o administrador do sistema.';
                    }
                } else {
                    $error = 'Usuário não encontrado.';
                }
            } else {
                $error = 'Por favor, informe o usuário.';
            }
        }
        
        require_once __DIR__ . '/../Views/login/forgot.php';
    }
}