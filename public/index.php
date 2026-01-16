<?php
// Ativa exibição de erros para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../autoload.php';
// Composer autoload (para mpdf, dompdf, etc.)
require_once __DIR__ . '/../vendor/autoload.php';

// Check remember me cookie
if (!isset($_SESSION['user']) && isset($_COOKIE['remember_user'])) {
    $db = new \App\Config\Database();
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT * FROM login WHERE id = ?");
    $stmt->execute([$_COOKIE['remember_user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $_SESSION['user'] = $user;
    }
}

// Pega a URL
if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $request = $_SERVER['REQUEST_URI'];
    
    // Remover /faturamento/public/ do início
    if (strpos($request, '/faturamento/public/') === 0) {
        $url = substr($request, strlen('/faturamento/public/'));
    } else if (strpos($request, '/faturamento/') === 0) {
        // Se for só /faturamento/, redirecionar para public
        header('Location: ' . $_SERVER['REQUEST_URI'] . 'public/');
        exit;
    } else {
        $url = trim($request, '/');
    }
    
    // Remover query string
    $url = explode('?', $url)[0];
    $url = rtrim($url, '/');
    
    // Se vazio, usar dashboard
    if (empty($url)) {
        $url = 'dashboard/index';
    }
}

// Remove query string to avoid treating it as part of controller/method
$url = parse_url($url, PHP_URL_PATH);
$url = filter_var($url, FILTER_SANITIZE_URL);

$urlParts = explode('/', $url);

// Check if user is logged in, except for login and AJAX
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    // Allow login routes without session
    $allowedRoutes = ['login'];
    $currentRoute = $urlParts[0] ?? '';
    $currentMethod = $urlParts[1] ?? '';

    // Allow relatório exports even sem sessão para não bloquear download
    $isExportRoute = ($currentRoute === 'relatorios' && in_array($currentMethod, ['exportarPDF', 'exportarExcel']));

    if (!$isExportRoute && !in_array($currentRoute, $allowedRoutes) && !isset($_SESSION['user'])) {
        header('Location: ' . \App\Config\Config::baseUrl('/login/index'));
        exit;
    }
}

// Se URL vazia, redireciona para a página inicial (usa a config DEFAULT_ROUTE)
if (empty($url)) {
    $url = \App\Config\Config::DEFAULT_ROUTE;
}

$url = explode('/', $url);

// Define controller e método
$controllerName = ucfirst($url[0] ?? 'dashboard') . 'Controller';
$method = $url[1] ?? 'index';
$param = $url[2] ?? null;

// Instancia o controller
$controllerClass = "App\\Controllers\\{$controllerName}";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    
    if (method_exists($controller, $method)) {
        $controller->$method($param);
    } else {
        echo "Método '{$method}' não encontrado no controller!";
    }
} else {
    echo "Controller não encontrado!<br>";
    echo "Procurando por: {$controllerClass}<br>";
    echo "Arquivo deveria estar em: " . __DIR__ . "/../app/Controllers/{$controllerName}.php<br>";
    
    // Verifica se o arquivo existe
    $file = __DIR__ . "/../app/Controllers/{$controllerName}.php";
    if (file_exists($file)) {
        echo "✅ Arquivo existe!<br>";
        echo "❌ Mas a classe não foi carregada. Problema no autoload!<br>";
    } else {
        echo "❌ Arquivo não existe!<br>";
    }
}
