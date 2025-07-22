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
        $amount = $this->calculateTotal($_SESSION['cart']);

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
    // Añade validación para arrays
    if (!is_array($cart)) {
        error_log("⚠️ El carrito NO es un array: " . print_r($cart, true));
        return 0.00;
    }

    return array_reduce($cart, function($sum, $item) {
        // Verifica que $item sea un array/objeto válido
        if (!is_array($item) && !is_object($item)) {
            error_log("⚠️ Ítem inválido: " . print_r($item, true));
            return $sum;
        }
        
        $price = is_object($item) ? $item->price : $item['price'];
        $quantity = is_object($item) ? $item->quantity : $item['quantity'];
        
        return $sum + ($price * $quantity);
    }, 0);
}
}