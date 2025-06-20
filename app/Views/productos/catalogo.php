<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="catalogo-seccion">
    <h2 class="catalogo-titulo">Catálogo de Productos</h2>

    <div class="filtro-seccion">
        <form method="get" action="<?= base_url('catalogo') ?>">
            <select name="pais_origen" onchange="this.form.submit()">
                <option value="">Todos los países</option>
                <?php foreach ($paises as $pais): ?>
                    <?php $selected = ($pais_origen == $pais['pais_origen']) ? 'selected' : ''; ?>
                    <option value="<?= esc($pais['pais_origen']) ?>" <?= $selected ?>><?= esc($pais['pais_origen']) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="precio_min" placeholder="Precio mínimo" value="<?= isset($precio_min) ? esc($precio_min) : '' ?>" min="0" step="0.01" onchange="this.form.submit()">
            <input type="number" name="precio_max" placeholder="Precio máximo" value="<?= isset($precio_max) ? esc($precio_max) : '' ?>" min="0" step="0.01" onchange="this.form.submit()">
            <input type="text" name="busqueda" placeholder="Buscar por nombre" value="<?= isset($busqueda) ? esc($busqueda) : '' ?>" onkeyup="this.form.submit()">
        </form>
    </div>

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