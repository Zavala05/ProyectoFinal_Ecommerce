<!-- app/views/payment/success.php -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card de confirmación -->
            <div class="card border-success shadow">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                        <h3 class="mb-0">¡Pago Completado Exitosamente!</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Detalles de la transacción -->
                    <div class="alert alert-success">
                        <h5 class="alert-heading">Gracias por tu compra, <?= $_SESSION['user_name'] ?? 'Cliente' ?>!</h5>
                        <p>Hemos enviado los detalles a: <strong><?= $_SESSION['user_email'] ?? '' ?></strong></p>
                    </div>

                    <!-- Resumen -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Detalles de la transacción:</h5>
                            <ul class="list-unstyled">
                                <li><strong>ID:</strong> <?= $data['transaction_id'] ?? 'N/A' ?></li>
                                <li><strong>Fecha:</strong> <?= date('d/m/Y H:i') ?></li>
                                <li><strong>Método:</strong> PayPal</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Resumen del pedido:</h5>
                            <ul class="list-unstyled">
                                <li><strong>Total:</strong> $<?= number_format($data['amount'] ?? 0, 2) ?></li>
                                <li><strong>Artículos:</strong> <?= count($_SESSION['cart'] ?? []) ?></li>
                                <li><strong>Estado:</strong> <span class="badge bg-success">Completado</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Lista de productos (Opcional) -->
                    <?php if (!empty($_SESSION['cart'])): ?>
                        <div class="border-top pt-3">
                            <h5>Productos comprados:</h5>
                            <ul class="list-group">
                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $item['name'] ?>
                                        <span class="badge bg-primary rounded-pill">x<?= $item['quantity'] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Botones de acción -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="<?= URL_ROOT ?>/products" class="btn btn-primary me-md-2">
                            <i class="bi bi-arrow-left"></i> Seguir comprando
                        </a>
                        <a href="<?= URL_ROOT ?>/user/orders" class="btn btn-outline-success">
                            <i class="bi bi-receipt"></i> Ver mis pedidos
                        </a>
                    </div>
                </div>
                <div class="card-footer text-muted small">
                    ¿Problemas con tu pedido? <a href="<?= URL_ROOT ?>/contact">Contáctanos</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Limpiar el carrito (Opcional) -->
<?php unset($_SESSION['cart']); ?>

<!-- Estilos adicionales -->
<style>
    .card {
        border-width: 2px;
    }
    .list-group-item {
        border-left: none;
        border-right: none;
    }
</style>