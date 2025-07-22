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

    // Simula guardar transacción (usa tu DB real si prefieres)
    public function saveTransaction($id, $amount, $status)
    {
        $this->db->query('INSERT INTO transactions (id, amount, status) VALUES (:id, :amount, :status)');
        $this->db->bind(':id', $id);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':status', $status);
        return $this->db->execute();
    }

    // Obtener pedido por ID
public function getOrderById($orderId) {
    $sql = "SELECT * FROM orders WHERE id = :id";
    $this->db->execute($sql, [':id' => $orderId]);
    return $this->db->single();
}

// Obtener items de un pedido
public function getOrderItems($orderId) {
    $sql = "SELECT * FROM order_items WHERE order_id = :order_id";
    $this->db->execute($sql, [':order_id' => $orderId]);
    return $this->db->resultSet();
}

// Listar pedidos de usuario (si tienes sistema de usuarios)
public function getUserOrders($userId) {
    $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
    $this->db->execute($sql, [':user_id' => $userId]);
    return $this->db->resultSet();
}
}