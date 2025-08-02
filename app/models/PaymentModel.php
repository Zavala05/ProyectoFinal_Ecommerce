<?php
namespace App\Models;

use App\Models\Database;

class PaymentModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    
    public function saveTransaction($id, $amount, $status)
    {
        $this->db->query('INSERT INTO transactions (id, amount, status) VALUES (:id, :amount, :status)');
        $this->db->bind(':id', $id);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':status', $status);
        return $this->db->execute();
    }

   
public function getOrderById($orderId) {
    $sql = "SELECT * FROM orders WHERE id = :id";
    $this->db->execute($sql, [':id' => $orderId]);
    return $this->db->single();
}


public function getOrderItems($orderId) {
    $sql = "SELECT * FROM order_items WHERE order_id = :order_id";
    $this->db->execute($sql, [':order_id' => $orderId]);
    return $this->db->resultSet();
}


public function getUserOrders($userId) {
    $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
    $this->db->execute($sql, [':user_id' => $userId]);
    return $this->db->resultSet();
}
}