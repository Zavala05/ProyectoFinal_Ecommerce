<h1>Detalles del Producto</h1>
<h2><?= $data['product']->name ?></h2>
<p>ID: <?= $data['product']->id ?></p>
<p>Precio: $<?= number_format($data['product']->price, 2) ?></p>
<a href="<?= URL_ROOT ?>/products" id="botonvolver">← Volver a productos</a>

<style>
    #botonvolver{
        background-color: #000000ff; 
        padding: 8px;
        border-radius: 5px;
        color: #ffffff;

    }

    #botonvolver:hover{
        box-shadow: 0 0 10px rgba(122, 122, 122, 0.5);
        transition: box-shadow 0.3s ease-in-out;
    }

    a{
        text-decoration: none;
        
    }
</style>