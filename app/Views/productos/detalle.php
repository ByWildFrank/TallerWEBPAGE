<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        .img-fluid {
            max-height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <?= view('layouts/navBar/navBar') ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" alt="<?= esc($producto['nombre']) ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2><?= esc($producto['nombre']) ?></h2>
                <p><?= esc($producto['descripcion']) ?></p>
                <p><strong>Precio:</strong> $<?= esc($producto['precio']) ?></p>
                <p><strong>Origen:</strong> <?= esc($producto['pais_origen']) ?></p>
                <p><strong>Stock disponible:</strong> <?= esc($producto['stock']) ?></p>

                <a href="<?= base_url('carrito/agregar/' . $producto['id']) ?>" class="btn btn-success">Agregar al carrito</a>
                <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary">Volver al catálogo</a>
            </div>
        </div>
    </div>

    <?= view('layouts/footer/footer') ?>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
