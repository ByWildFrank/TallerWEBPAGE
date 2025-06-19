<!-- app/Views/catalogo.php -->
<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="catalogo-seccion">
  <h2 class="catalogo-titulo">Catálogo de Productos</h2>

  <div class="catalogo-grilla">
    <?php foreach ($productos as $producto): ?>
      <div class="tarjeta-producto">
       <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" class="tarjeta-imagen" alt="<?= esc($producto['nombre']) ?>">
        <div class="tarjeta-cuerpo">
          <h3 class="tarjeta-titulo"><?= esc($producto['nombre']) ?></h3>
          <p class="tarjeta-precio">$<?= number_format($producto['precio'], 2) ?></p>
          <div class="tarjeta-botones">
            <a href="<?= base_url('product/detalle/' . $producto['id']) ?>" class="boton-ver">Ver más</a>
            <a href="<?= base_url('carrito/agregar/' . $producto['id']) ?>" class="boton-agregar">Agregar al carrito</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?= $this->endSection() ?>
