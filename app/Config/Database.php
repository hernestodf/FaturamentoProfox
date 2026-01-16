<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;
    
    public function __construct() {
        // Auto-detectar ambiente
        $host_name = $_SERVER['HTTP_HOST'] ?? 'localhost';
        
        if (strpos($host_name, 'sisloc.online') !== false) {
            // PRODUÇÃO - Banco online
            $this->host = 'localhost';
            $this->db_name = 'sisloc_faturamento';
            $this->username = 'sisloc_faturamento';
            $this->password = 'Micro987!';
        } else {
            // LOCAL - Banco local
            $this->host = 'localhost';
            $this->db_name = 'faturamento';
            $this->username = 'root';
            $this->password = '';
        }
    }
    
    public function connect() {
        $this->conn = null;
        
        // Verificar se PDO está disponível
        if (!extension_loaded('pdo')) {
            $this->showPdoError("PDO não está habilitado");
            die();
        }
        
        if (!extension_loaded('pdo_mysql')) {
            $this->showPdoError("PDO MySQL não está habilitado");
            die();
        }
        
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("❌ Erro ao conectar ao banco: " . $e->getMessage());
        }
        
        return $this->conn;
    }
    
    private function showPdoError($reason) {
        $html = "
        <html>
        <head>
            <title>Erro de Configuração</title>
            <style>
                body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 40px; }
                .error-box { background: #fee; border: 1px solid #f99; border-radius: 5px; padding: 20px; max-width: 500px; }
                h1 { color: #c00; }
                .error-box p { color: #333; line-height: 1.6; }
                .steps { background: #fff; padding: 15px; border-left: 4px solid #f99; margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='error-box'>
                <h1>❌ ERRO DE CONFIGURAÇÃO</h1>
                <p><strong>Problema:</strong> {$reason}</p>
                <div class='steps'>
                    <p><strong>Solução:</strong></p>
                    <ol>
                        <li>Contate o suporte do seu servidor de hospedagem</li>
                        <li>Solicite para habilitar as extensões PHP:</li>
                        <ul>
                            <li><code>php_pdo</code></li>
                            <li><code>php_pdo_mysql</code></li>
                        </ul>
                        <li>Após habilitar, tente acessar novamente</li>
                    </ol>
                </div>
            </div>
        </body>
        </html>
        ";
        echo $html;
    }
}