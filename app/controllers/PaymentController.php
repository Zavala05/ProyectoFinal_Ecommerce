<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\PaymentModel;

class PaymentController extends Controller
{
    private $paymentModel;

    public function __construct()
    {
        $this->paymentModel = $this->model('PaymentModel');
    }

    // Procesar checkout (URL: /payment/checkout)
   public function checkout() {
    if (empty($_SESSION['cart'])) {
        header('Location: ' . URL_ROOT . '/cart');
        exit();
    }

    $total = 0;
    foreach ($_SESSION['cart'] as $productId => $item) {
        if (is_array($item)) {
            // Para estructura [id => [price, quantity]]
            $total += ($item['price'] * $item['quantity']);
        } else {
            // Para estructura [id => cantidad]
            $productModel = $this->model('ProductModel');
            $product = $productModel->getProductById($productId);
            $total += ($product->price * $item);
        }
    }

    $this->view('payment/checkout', [
        'total' => $total,
        'paypal_client_id' => PAYPAL_CLIENT_ID // ¡Clave!
    ]);
}

    // Éxito de pago (URL: /payment/success)
    public function success() {
    // 1. Captura datos de PayPal
    $paymentId = $_GET['paymentId'] ?? null;
    
    if (!$paymentId) {
        $_SESSION['flash_error'] = 'No se recibió confirmación de PayPal';
        header('Location: ' . URL_ROOT . '/cart');
        exit();
    }

    // 2. Normaliza el carrito (ESTRUCTURA CLAVE)
    $cartItems = [];
    $total = 0;
    $productModel = $this->model('ProductModel');
    
    foreach ($_SESSION['cart'] ?? [] as $productId => $item) {
        if (is_array($item)) {
            // Caso 1: Estructura completa [id => [datos]]
            $cartItems[$productId] = [
                'id' => $productId,
                'name' => $item['name'] ?? 'Producto '.$productId,
                'price' => $item['price'] ?? 0,
                'quantity' => $item['quantity'] ?? 1
            ];
            $total += $item['price'] * $item['quantity'];
        } else {
            // Caso 2: Estructura simple [id => cantidad]
            $product = $productModel->getProductById($productId);
            $cartItems[$productId] = [
                'id' => $productId,
                'name' => $product->name ?? 'Producto '.$productId,
                'price' => $product->price ?? 0,
                'quantity' => $item
            ];
            $total += $product->price * $item;
        }
    }

    // 3. Prepara datos para la vista
    $data = [
        'transaction_id' => $paymentId,
        'amount' => $total,
        'cart_items' => $cartItems, // ¡Estructura normalizada!
        'payer_email' => $_SESSION['user_email'] ?? 'No registrado'
    ];

    // 4. Limpia el carrito y muestra la vista
    unset($_SESSION['cart']);
    $this->view('payment/success', $data);
}
    // Pago cancelado (URL: /payment/cancel)
    public function cancel()
    {
        $this->view('payment/cancel');
    }

   private function calculateTotal($cart) {
    if (!is_array($cart) || empty($cart)) {
        return 0.00; // Retorna 0 si el carrito no es válido
    }

    return array_reduce($cart, function($sum, $item) {
        $price = $item['price'] ?? 0;
        $quantity = $item['quantity'] ?? 0;
        return $sum + ($price * $quantity);
    }, 0);
}
}