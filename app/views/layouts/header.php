<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?? 'Tech Store'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Tech Store D&D</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL_ROOT ?>/products">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL_ROOT ?>/products">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= URL_ROOT ?>/cart" class="btn btn-outline-primary">
    <i class="fas fa-shopping-cart"></i> Carrito 
    <?php if (!empty($_SESSION['cart'])) : ?>
        <span class="badge bg-danger">
            <?= array_sum($_SESSION['cart']) ?>
        </span>
    <?php endif; ?>
</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">


    <style>
        .container{
            gap: 20px;
        }
    </style>