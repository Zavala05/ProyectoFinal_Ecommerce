<div class="container py-5">
    <h2>Mis Pedidos</h2>
    
    <?php if (empty($orders)): ?>
        <div class="alert alert-info">No has realizado ningún pedido aún</div>
    <?php else: ?>
        <div class="list-group mt-4">
            <?php foreach ($orders as $order): ?>
                <a href="<?= URL_ROOT ?>/order/view/<?= $order->id ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <h5>Pedido #<?= $order->order_number ?></h5>
                        <span>$<?= number_format($order->total_amount, 2) ?></span>
                    </div>
                    <small class="text-muted">
                        <?= date('d/m/Y H:i', strtotime($order->created_at)) ?> | 
                        <?= ucfirst($order->status) ?>
                    </small>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>