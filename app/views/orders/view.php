<div class="container py-5">
    <h2>Detalle de Pedido #<?= $order->order_number ?></h2>
    
    <div class="card mt-4">
        <div class="card-header">
            <strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($order->created_at)) ?>
            <span class="float-end"><strong>Total:</strong> $<?= number_format($order->total_amount, 2) ?></span>
        </div>
        
        <div class="card-body">
            <h5>Productos:</h5>
            <ul class="list-group">
                <?php foreach ($items as $item): ?>
                    <li class="list-group-item">
                        <?= htmlspecialchars($item->product_name) ?> - 
                        $<?= number_format($item->unit_price, 2) ?> x 
                        <?= $item->quantity ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="card-footer">
            <a href="<?= URL_ROOT ?>/order/history" class="btn btn-secondary">
                Volver al historial
            </a>
        </div>
    </div>
</div>