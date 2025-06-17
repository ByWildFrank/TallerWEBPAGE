<?= $this->include('layouts/header') ?>

<h2>¡Gracias por tu compra!</h2>
<p>Tu número de orden es: <strong>#<?= $orden_id ?></strong></p>

<a href="<?= base_url('/') ?>" class="btn btn-primary">Volver al inicio</a>

<?= $this->include('layouts/footer') ?>
