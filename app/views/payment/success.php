<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tarjeta de confirmación -->
            <div class="card border-success shadow-lg">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <h4 class="mb-0">¡Pago Completado Exitosamente!</h4>
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Resumen de la transacción -->
                    

                    <!-- Detalles del pedido -->
                    <div class="mb-4">
                        <h5 class="mb-3">Detalles del Pedido</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="w-25">Número de Transacción:</th>
                                        <td><?= $data['transaction_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Fecha:</th>
                                        <td><?= date('d/m/Y H:i') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Método de Pago:</th>
                                        <td>PayPal</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td class="fw-bold">$<?= number_format($data['amount'], 2) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Productos comprados -->
                    <div class="mb-4">
                        <h5 class="mb-3">Productos Comprados</h5>
                        <div class="list-group">
                            <?php foreach ($data['cart_items'] as $item): ?>
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1"><?= htmlspecialchars($item['name']) ?></h6>
                                            <small class="text-muted">SKU: <?= $item['id'] ?? 'N/A' ?></small>
                                        </div>
                                        <div class="text-end">
                                            <span class="d-block">$<?= number_format($item['price'], 2) ?></span>
                                            <small class="text-muted">Cantidad: <?= $item['quantity'] ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Resumen total -->
                    <div class="bg-light p-3 rounded">
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total:</span>
                            <span>$<?= number_format($data['amount'], 2) ?></span>
                        </div>
                    </div>
                </div>

                <!-- Pie de tarjeta -->
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <a href="<?= URL_ROOT ?>/products" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left"></i> Seguir Comprando
                        </a>
                    
                    </div>
                </div>
            </div>

        
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    .card {
        border-width: 2px;
    }
    .list-group-item {
        border-left: none;
        border-right: none;
    }
    .table th {
        background-color: #f8f9fa;
    }
</style>