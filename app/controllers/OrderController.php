<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\PaymentModel;

class OrderController extends Controller
{
    private $paymentModel;

    public function __construct()
    {
        $this->paymentModel = $this->model('PaymentModel');
    }

    
    public function show($id) 
    {
        $order = $this->paymentModel->getOrderById($id);
        $items = $this->paymentModel->getOrderItems($id);
        
        
        parent::view('orders/view', [
            'order' => $order,
            'items' => $items
        ]);
    }

    public function history()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . URL_ROOT . '/users/login');
            exit();
        }
        
        $orders = $this->paymentModel->getUserOrders($_SESSION['user_id']);
        
        parent::view('orders/history', [
            'orders' => $orders
        ]);
    }
}