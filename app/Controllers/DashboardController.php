<?php
namespace App\Controllers;

use App\Config\Config;

class DashboardController {
    public function index() {
        $title = 'Dashboard';
        $page_title = 'Dashboard';
        $active = 'dashboard';
        
        ob_start();
        include __DIR__ . '/../Views/dashboard/index.php';
        $content = ob_get_clean();
        
        include __DIR__ . '/../Views/layouts/layout.php';
    }
}
