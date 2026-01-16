<?php
/**
 * Redirecionador Automático
 * 
 * Este arquivo fica na raiz de /faturamento/
 * Quando acessa http://localhost/faturamento/ ou https://sisloc.online/faturamento/
 * Redireciona para /faturamento/public/ automaticamente
 */

// Detectar ambiente
$host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];

// Verificar se NÃO está em /public/
if (strpos($request_uri, '/public/') === false) {
    // Extrair a parte da URL após /faturamento/
    $url_part = '';
    
    if (strpos($request_uri, '/faturamento/') !== false) {
        $url_part = substr($request_uri, strpos($request_uri, '/faturamento/') + strlen('/faturamento/'));
    }
    
    // Remover query string e espaços
    $url_part = explode('?', $url_part)[0];
    $url_part = trim($url_part, '/');
    
    // Se não houver URL ou estiver vazio, usar dashboard como padrão
    if (empty($url_part)) {
        $url_part = 'dashboard/index';
    }
    
    // Redirecionar para public
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
    header("Location: {$protocol}{$host}/faturamento/public/index.php?url={$url_part}");
    exit;
}

// Se já estiver em /public/, processar a requisição
require_once __DIR__ . '/public/index.php';
