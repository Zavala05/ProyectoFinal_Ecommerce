<!-- Muestra el email real -->

<!-- Datos reales de la transacción -->
<ul class="list-unstyled">
    <li><strong>ID:</strong> <?= $data['transaction_id'] ?></li>
    <li><strong>Fecha:</strong> <?= date('d/m/Y H:i') ?></li>
    <li><strong>Método:</strong> PayPal</li>
    <li><strong>Total:</strong> $<?= number_format($data['amount'], 2) ?></li>
    <li><strong>Artículos:</strong> <?= count($data['cart_items']) ?></li>
</ul>

<!-- Lista de productos -->
<?php if (!empty($data['cart_items'])): ?>
    <h5>Productos comprados:</h5>
    <ul class="list-group">
        <?php foreach ($data['cart_items'] as $item): ?>
            <li class="list-group-item">
                <?= htmlspecialchars($item['name']) ?> - 
                $<?= number_format($item['price'], 2) ?> x 
                <?= $item['quantity'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>