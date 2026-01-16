<?php
namespace App\Config;

class Config {
    // Auto-detecta o ambiente (local ou produção)
    private static $environment = null;
    
    public static function getEnvironment() {
        if (self::$environment === null) {
            $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
            
            if (strpos($host, 'sisloc.online') !== false) {
                self::$environment = 'production';
            } else if (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false) {
                self::$environment = 'local';
            } else {
                self::$environment = 'production';
            }
        }
        return self::$environment;
    }
    
    // Define BASE_URL automaticamente
    public static function getBaseUrl() {
        $env = self::getEnvironment();
        
        if ($env === 'production') {
            return '/faturamento';
        } else {
            return '/faturamento/public';
        }
    }
    
    // Define DOMAIN automaticamente
    public static function getDomain() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . $host;
    }
    
    // CONSTANTES (compatibilidade com código antigo)
    const BASE_URL = null; // Será calculado dinamicamente
    const DOMAIN = null;   // Será calculado dinamicamente
    const DEFAULT_ROUTE = 'dashboard/index';
    
    // Retorna a URL base (usa método dinâmico)
    public static function baseUrl($path = '') {
        return self::getBaseUrl() . $path;
    }
    
    // Helper para usar nas views (usa método dinâmico)
    public static function url($path = '') {
        return self::getBaseUrl() . '/' . ltrim($path, '/');
    }
}