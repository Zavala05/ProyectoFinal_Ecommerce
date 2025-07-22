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
    public function success()
    {
        // 1. Simular transacción exitosa
        $transactionId = 'PAYPAL_' . uniqid();
        $cartItems = $_SESSION['cart'] ?? []; // Array vacío si no existe
$amount = $this->calculateTotal($cartItems);

        // 2. Guardar en "base de datos" (simulada)
        $this->paymentModel->saveTransaction(
            $transactionId,
            $amount,
            'completed'
        );

        // 3. Limpiar carrito y mostrar éxito
        unset($_SESSION['cart']);
        $this->view('payment/success', [
            'transactionId' => $transactionId,
            'amount' => $amount
        ]);
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