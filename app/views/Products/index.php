<h1 class="mb-4">Productos Disponibles</h1>

<div class="row">
    <?php foreach ($data['products'] as $product) : ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($product->name) ?></h5>
                <p class="card-text"><?= htmlspecialchars(substr($product->description, 0, 100)) ?>...</p>
                <p class="text-primary fw-bold">$<?= number_format($product->price, 2) ?></p>
            </div>
            <div class="card-footer bg-white">
                <a href="<?= URL_ROOT ?>/products/show/<?= $product->id ?>" class="btn btn-primary">Ver Detalles</a>

                <a href="<?= URL_ROOT ?>/cart/add/<?= $product->id ?>" class="btn btn-success"><i class="fas fa-cart-plus"></i> Añadir al Carrito</a>
            
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>