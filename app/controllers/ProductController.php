<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ProductModel;

class ProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = $this->model('ProductModel');
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        $data = [
            'title' => 'Productos Tecnológicos',
            'products' => $products
        ];
        $this->view('products/index', $data);
    }

   public function show($id = null)
{
    // Depuración en logs
    error_log("ID recibido en show(): ".print_r($id, true));
    
    if (!is_numeric($id)) {
        error_log("Error: ID no numérico recibido - ".$id);
        header('HTTP/1.1 400 Bad Request');
        die("ID de producto debe ser numérico");
    }

    $product = $this->productModel->getProductById($id);
    
    if (!$product) {
        header('Location: '.URL_ROOT.'/products');
        exit();
    }
    
    $data = [
        'title' => $product->name,
        'product' => $product
    ];
    
    $this->view('products/show', $data);
}
}