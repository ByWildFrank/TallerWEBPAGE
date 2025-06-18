<!-- app/Views/catalogo.php -->
<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="catalogo" class="catalogo">
    <h2>Catálogo de Productos</h2>
    <div class="product-grid">
        <?php foreach ($productos as $producto): ?>
            <div class="product-card">
                <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" class="product-img" alt="<?= esc($producto['nombre']) ?>">
                <div class="product-body">
                    <h5 class="product-title"><?= esc($producto['nombre']) ?></h5>
                    <p class="product-price">$<?= esc($producto['precio']) ?></p>
                    <a href="<?= base_url('product/detalle/' . $producto['id']) ?>" class="btn-primary">Ver más</a>
                    <a href="<?= base_url('carrito/agregar/' . $producto['id']) ?>" class="btn-success">Agregar al carrito</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?= $this->endSection() ?>