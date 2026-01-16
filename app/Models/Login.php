<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Login {
    private $conn;
    private $table = 'login';
    
    public $id;
    public $usuario;
    public $senha;
    public $nivel;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
    
    public function authenticate($usuario, $senha) {
        $query = "SELECT * FROM {$this->table} WHERE usuario = :usuario AND senha = :senha";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updatePassword() {
        $query = "UPDATE {$this->table} SET senha = :senha WHERE usuario = :usuario";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':senha', $this->senha);
        
        return $stmt->execute();
    }
    
    public function isAdmin($id) {
        $query = "SELECT nivel FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result && $result['nivel'] === 'admin';
    }
}