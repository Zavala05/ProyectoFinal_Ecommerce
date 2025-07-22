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
}