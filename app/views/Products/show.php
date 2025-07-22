<div class="container py-5">
    <div class="row">
        <!-- Botón de volver -->
        <div class="col-12 mb-4">
            <a href="<?= URL_ROOT ?>/products" class="btn btn-outline-dark">
                <i class="bi bi-arrow-left"></i> Volver al catálogo
            </a>
        </div>
        
        <!-- Tarjeta del producto -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg mb-4">
                <img src="<?= $data['product']->image ? URL_ROOT.'/'.$data['product']->image : 'https://via.placeholder.com/600x400?text=Tech+Store' ?>" 
                     class="card-img-top img-fluid product-image" 
                     alt="<?= htmlspecialchars($data['product']->name) ?>">
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-primary"><?= htmlspecialchars($data['product']->category) ?></span>
                        <span class="badge bg-secondary">SKU: <?= $data['product']->id ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Detalles del producto -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h1 class="h2 mb-3"><?= htmlspecialchars($data['product']->name) ?></h1>
                    
                    <div class="d-flex align-items-center mb-4">
    <span class="display-5 fw-bold text-primary">$<?= number_format($data['product']->price, 2) ?></span>
    <?php if(isset($data['product']->original_price) && $data['product']->original_price > $data['product']->price): ?>
        <span class="text-decoration-line-through text-muted ms-3">$<?= number_format($data['product']->original_price, 2) ?></span>
        <span class="badge bg-danger ms-2"><?= number_format(100 - ($data['product']->price / $data['product']->original_price * 100), 0) ?>% OFF</span>
    <?php endif; ?>
</div>
                    
                    <div class="mb-4">
                        <h3 class="h5">Descripción</h3>
                        <p class="text-muted"><?= nl2br(htmlspecialchars($data['product']->description ?? 'Descripción no disponible')) ?></p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5">Especificaciones</h3>
                        <ul class="list-unstyled">
                            <li><strong>Categoría:</strong> <?= htmlspecialchars($data['product']->category) ?></li>
                            <li><strong>Disponibilidad:</strong> <span class="text-success">En stock</span></li>
                            <li><strong>Garantía:</strong> 12 meses</li>
                        </ul>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="d-flex gap-3">
                        <button class="btn btn-primary btn-lg flex-grow-1">
                            <i class="bi bi-cart-plus"></i> Añadir al carrito
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sección de productos relacionados (opcional) -->
    
</div>

<!-- Estilos personalizados -->
<style>
    .product-image {
        max-height: 500px;
        object-fit: contain;
        padding: 20px;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>

<!-- Incluir Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">