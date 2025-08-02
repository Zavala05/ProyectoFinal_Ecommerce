<?php
namespace App\Core;

class App
{
    protected $controller = 'ProductController';
    protected $method = 'index';
    protected $params   = [];

   public function __construct()
{
    $url = $this->parseUrl();
    
    
   
    if (!empty($url[0])) {
        $controllerName = ucfirst($url[0]).'Controller';
        if (file_exists('../app/controllers/'.$controllerName.'.php')) {
            $this->controller = $controllerName;
            unset($url[0]);
        }
    }

   
    $controllerClass = "App\\Controllers\\".$this->controller;
    $this->controller = new $controllerClass;

    
    $this->method = !empty($url[1]) ? $url[1] : 'index';
    
    
    $this->params = [];
    if (!empty($url[2])) {  
        $this->params[] = $url[2]; 
    }

  
    error_log("Controlador: ".get_class($this->controller));
    error_log("Método: ".$this->method);
    error_log("Parámetros: ".print_r($this->params, true));

    
    call_user_func_array([$this->controller, $this->method], $this->params);
}

protected function parseUrl() {
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        
        
        error_log("URL recibida: " . $url);
        
        
        $basePath = 'nw/proyectofinal_p3/public/';
        if (strpos($url, $basePath) === 0) {
            $url = str_replace($basePath, '', $url);
        }
        
       
        error_log("URL procesada: " . $url);
        
        return explode('/', $url);
    }
    return [];
}
    
}