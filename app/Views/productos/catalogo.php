<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">

<style>
  /* Para el filtro aplicar estilos desde aquí si o si*/
  .catalogo-seccion {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
  }

  .catalogo-titulo {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 20px;
  }

  .catalogo-grilla {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 25px;
  }

  .tarjeta-producto {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
  }

  .tarjeta-producto:hover {
    transform: translateY(-5px);
  }

  .filtro-seccion {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e0e0e0;
  }

  .filtro-seccion select,
  .filtro-seccion input,
  .filtro-seccion button {
    margin-right: 15px;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .filtro-seccion select {
    width: 200px;
    background-color: #f8f9fa;
  }

  .slider-container {
    margin: 10px 0;
  }

  .slider {
    width: 100%;
    max-width: 300px;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  function buscar() {
    document.querySelector('form').submit();
  }
  // Debounce slider
  let timeout;

  function debounceSubmit() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      document.querySelector('form').submit();
    }, 300); // 300ms delay
  }
</script>
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
      <div class="slider-container">
        <label for="precio_max">Precio máximo: $<?= isset($precio_max) ? esc($precio_max) : '0' ?></label>
        <input type="range" name="precio_max" id="precio_max" class="slider" min="0" max="<?= $maxPrecio ?>" value="<?= isset($precio_max) ? esc($precio_max) : $maxPrecio ?>" onchange="this.form.submit()">
      </div>
      <input type="text" name="busqueda" placeholder="Buscar por nombre" value="<?= isset($busqueda) ? esc($busqueda) : '' ?>" onkeypress="if(event.key === 'Enter') buscar();">
      <button type="button" onclick="buscar()">Buscar</button>
    </form>
  </div>

  <div class="catalogo-grilla">
    <?php foreach ($productos as $producto): ?>
      <div class="tarjeta-producto">
        <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" class="tarjeta-imagen" alt="<?= esc($producto['nombre']) ?>">
        <div class="tarjeta-cuerpo">
          <h3 class="tarjeta-titulo"><?= esc($producto['nombre']) ?></h3>
          <p class="tarjeta-precio">$<?= number_format($producto['precio'], 2) ?></p>
          <?php if ($producto['stock'] <= 10): ?>
            <p class="tarjeta-stock text-danger">¡Quedan solo <?= esc($producto['stock']) ?> unidades!</p>
          <?php endif; ?>
          <div class="tarjeta-botones">
            <a href="<?= base_url('product/detalle/' . $producto['id']) ?>" class="boton-ver">Ver más</a>
                <a href="<?= base_url('carrito/agregar/' . $producto['id']) ?>" class="btn btn-success boton-agregar <?= $producto['stock'] == 0 ? 'disabled' : '' ?>" <?= $producto['stock'] == 0 ? 'onclick="return false;"' : '' ?>>Agregar al carrito</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?= $this->endSection() ?>