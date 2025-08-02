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

    
   public function checkout() {
    if (empty($_SESSION['cart'])) {
        header('Location: ' . URL_ROOT . '/cart');
        exit();
    }

    $total = 0;
    foreach ($_SESSION['cart'] as $productId => $item) {
        if (is_array($item)) {
            
            $total += ($item['price'] * $item['quantity']);
        } else {
            
            $productModel = $this->model('ProductModel');
            $product = $productModel->getProductById($productId);
            $total += ($product->price * $item);
        }
    }

    $this->view('payment/checkout', [
        'total' => $total,
        'paypal_client_id' => PAYPAL_CLIENT_ID 
    ]);
}

    
    public function success() {
    
    $paymentId = $_GET['paymentId'] ?? null;
    
    if (!$paymentId) {
        $_SESSION['flash_error'] = 'No se recibió confirmación de PayPal';
        header('Location: ' . URL_ROOT . '/cart');
        exit();
    }

   
    $cartItems = [];
    $total = 0;
    $productModel = $this->model('ProductModel');
    
    foreach ($_SESSION['cart'] ?? [] as $productId => $item) {
        if (is_array($item)) {
            
            $cartItems[$productId] = [
                'id' => $productId,
                'name' => $item['name'] ?? 'Producto '.$productId,
                'price' => $item['price'] ?? 0,
                'quantity' => $item['quantity'] ?? 1
            ];
            $total += $item['price'] * $item['quantity'];
        } else {
            
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

    $data = [
        'transaction_id' => $paymentId,
        'amount' => $total,
        'cart_items' => $cartItems, 
        'payer_email' => $_SESSION['user_email'] ?? 'No registrado'
    ];

    
    unset($_SESSION['cart']);
    $this->view('payment/success', $data);
}
    
    public function cancel()
    {
        $this->view('payment/cancel');
    }

   private function calculateTotal($cart) {
    if (!is_array($cart) || empty($cart)) {
        return 0.00; 
    }

    return array_reduce($cart, function($sum, $item) {
        $price = $item['price'] ?? 0;
        $quantity = $item['quantity'] ?? 0;
        return $sum + ($price * $quantity);
    }, 0);
}
}