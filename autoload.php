<?php
spl_autoload_register(function ($class) {
    // Namespace base do projeto
    $prefix = 'App\\';
    
    // Diretório base das classes
    $base_dir = __DIR__ . '/app/';
    
    // Verifica se a classe usa o namespace base
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // não é uma classe do nosso namespace, ignora
        return;
    }
    
    // Pega o nome da classe relativo ao namespace
    $relative_class = substr($class, $len);
    
    // Converte namespace para caminho de arquivo
    // App\Controllers\UsuarioController -> Controllers/UsuarioController.php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    // Se o arquivo existe, carrega
    if (file_exists($file)) {
        require $file;
    } else {
        // Debug: mostra qual arquivo tentou carregar
        echo "<!-- Autoload tentou carregar: {$file} -->";
    }
});

// Teste do autoload (remova depois que funcionar)
// echo "<!-- Autoload registrado! -->";
?>