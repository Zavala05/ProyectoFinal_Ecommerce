<?php
if ($_SERVER['REQUEST_URI'] == '/NW/proyectofinal_p3/') {
    header('Location: /NW/proyectofinal_p3/public/');
    exit();
}
session_start(); // ¡Debe estar en la primera línea posible!
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Debug inicial
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/config.php';

// Manejo especial para cuando no llega la URL
if (!isset($_GET['url']) && isset($_SERVER['REQUEST_URI'])) {
    $base = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    $request = str_replace($base, '', $_SERVER['REQUEST_URI']);
    $_GET['url'] = ltrim(strtok($request, '?'), '/');
}

use App\Core\App;
$app = new App();