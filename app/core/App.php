<?php
namespace App\Core;

class App
{
    protected $controller = 'ProductController';
    protected $method = 'index';
    protected $params = [];

   public function __construct()
{
    $url = $this->parseUrl();
    
    // 1. Controlador
    if (!empty($url[0])) {
        $controllerName = ucfirst($url[0]).'Controller';
        if (file_exists('../app/controllers/'.$controllerName.'.php')) {
            $this->controller = $controllerName;
            unset($url[0]);
        }
    }

    // 2. Instanciar Controlador
    $controllerClass = "App\\Controllers\\".$this->controller;
    $this->controller = new $controllerClass;

    // 3. Método
    $this->method = !empty($url[1]) ? $url[1] : 'index';
    
    // 4. Parámetros - Corrección clave
    $this->params = [];
    if (!empty($url[2])) {  // El ID debe estar en la posición 2
        $this->params[] = $url[2]; // Pasamos solo el ID como parámetro
    }

    // Debug final
    error_log("Controlador: ".get_class($this->controller));
    error_log("Método: ".$this->method);
    error_log("Parámetros: ".print_r($this->params, true));

    // 5. Llamar al método
    call_user_func_array([$this->controller, $this->method], $this->params);
}

protected function parseUrl()
{
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        
        // Eliminar el nombre del proyecto si está presente
        $url = str_replace('proyectofinal_p3/', '', $url);
        
        // Dividir y filtrar partes no válidas
        $parts = explode('/', $url);
        return array_values(array_filter($parts, function($part) {
            return !empty($part) && $part !== 'proyectofinal_p3';
        }));
    }
    return [];
}
    
}