<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">
<style>
    .detalle-seccion {
        padding: 20px;
    }

    .img-fluid {
        max-width: 300px; /* Reducir el tamaño máximo de la imagen */
        height: auto; /* Mantener la proporción */
        margin-bottom: 10px; /* Espacio debajo de la imagen */
    }

    .imagen-descripcion {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 15px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" alt="<?= esc($producto['nombre']) ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2><?= esc($producto['nombre']) ?></h2>
            <p><?= esc($producto['descripcion']) ?></p>
            <p><strong>Precio:</strong> $<?= number_format($producto['precio'], 2) ?></p>
            <p><strong>Origen:</strong> <?= esc($producto['pais_origen']) ?></p>
            <p><strong>Stock disponible:</strong> <?= esc($producto['stock']) ?></p>
            <div class="tarjeta-botones">
                <a href="<?= base_url('carrito/agregar/' . $producto['id']) ?>" class="btn btn-success">Agregar al carrito</a>
                <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary">Volver al catálogo</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>