<div class="container">
    <h2>Finalizar Compra</h2>
    <p>Total a pagar: $<?= number_format($data['total'], 2) ?></p>
    
    <!-- Contenedor PayPal -->
    <div id="paypal-button-container" style="min-height: 200px; margin: 20px 0;">
        <div class="text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando PayPal...</span>
            </div>
        </div>
    </div>

    <!-- SDK de PayPal con fallback -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?= $data['paypal_client_id'] ?>&currency=USD&components=buttons"></script>
    <script>
    function loadPayPal() {
        if (typeof paypal !== 'undefined') {
            paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?= $data['total'] ?>'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        window.location.href = '<?= PAYPAL_RETURN_URL ?>';
                    });
                }
            }).render('#paypal-button-container');
        } else {
            // Reintentar después de 3 segundos
            setTimeout(loadPayPal, 3000);
        }
    }
    loadPayPal();
    </script>
</div>