<?php 

require_once APP_ROOT . '/app/views/layouts/header.php';?>

<div class="container">
    <h1>Tu Carrito</h1>
    
    <?php if (empty($data['items'])) : ?>
        <p>El carrito está vacío</p>
    <?php else : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['items'] as $item) : ?>
                    <tr>
                        <td><?= $item['product']->name ?></td>
                        <td>$<?= number_format($item['product']->price, 2) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>$<?= number_format($item['subtotal'], 2) ?></td>
                        
                        <td>
                            <form action="<?= URL_ROOT ?>/cart/remove/<?= $item['id'] ?>" method="POST">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>$<?= number_format($data['total'], 2) ?></th>
                    <th></th> 
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>

   <form action="<?= URL_ROOT ?>/payment/checkout" method="GET" style="display: inline;">
    <button type="submit" class="btn btn-success py-2 px-4">
        <i class="fas fa-credit-card mr-2"></i> Pagar con PayPal
    </button>
</form>

    <a id="volver" href="<?= URL_ROOT ?>/products">Seguir Comprando</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paypalBtn = document.querySelector('form[action*="payment/checkout"] button');
    
    paypalBtn.addEventListener('click', function(e) {
        console.log("Redirigiendo a PayPal...");
        
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
    });
});
</script>

<?php require_once APP_ROOT . '/app/views/layouts/footer.php'; ?>


<style>
    #volver{
        text-decoration: none;
        color:white;
        padding: 10px;
        background-color: #000000ff;
        border-radius: 10px;
        
    }
    #volver:hover{
        background-color: #646464ff;
        color: black;
        transition: 0.5s;
    }
</style>