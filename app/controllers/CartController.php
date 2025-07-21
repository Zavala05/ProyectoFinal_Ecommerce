<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ProductModel;

class CartController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Solo si no hay sesión iniciada
        }
    }

    // Añadir producto al carrito (URL: /cart/add/{id})
    public function add($productId)
    {
        // Validación básica
        if (!is_numeric($productId)) {
            header('HTTP/1.1 400 Bad Request');
            die("ID inválido");
        }

        // Inicializar carrito si no existe
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Lógica del carrito (sin afectar productos)
        $_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + 1;

        // Redirigir de vuelta a productos
        header('Location: ' . URL_ROOT . '/products');
    }

    public function remove($productId) {
    // Validación
    if (!is_numeric($productId)) {
        header('HTTP/1.1 400 Bad Request');
        die("ID inválido");
    }

    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // Elimina el producto
        $_SESSION['flash'] = "Producto eliminado del carrito"; // Mensaje de confirmación
    }

    header('Location: ' . URL_ROOT . '/cart'); // Redirige al carrito
}

    // Ver carrito (URL: /cart)
    public function index()
    {
        $cartItems = [];
        $total = 0;
        $productModel = $this->model('ProductModel');

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $product = $productModel->getProductById($id);
                if ($product) {
                    $cartItems[] = [
                        'id' => $id,
                        'product' => $product,
                        'quantity' => $quantity,
                        'subtotal' => $product->price * $quantity
                    ];
                    $total += $product->price * $quantity;
                }
            }
        }

        $this->view('cart/index', [
            'items' => $cartItems,
            'total' => $total
        ]);
    }
}