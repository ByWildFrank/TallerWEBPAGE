<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        <?php include 'catalogo.css'; ?>
    </style>
</head>

<body>
    <?= view('layouts/navBar/navBar') ?>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Catálogo de Productos</h2>
        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="card m-2" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                        <p class="card-text">$<?= esc($producto['precio']) ?></p>
                        <a href="<?= base_url('product/detalle/' . $producto['id']) ?>" class="btn btn-primary">Ver más</a>
                        <a href="<?= base_url('carrito/agregar/' . $producto['id']) ?>" class="btn btn-success">Agregar al carrito</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?= view('layouts/footer/footer') ?>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>