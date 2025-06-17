<!-- app/Views/usuario/mi_cuenta.php -->
<?= $this->include('layouts/navBar') ?>

<div class="container mt-4">
    <h2>Mi Cuenta</h2>

    <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
    <p><strong>Email:</strong> <?= esc($usuario['email']) ?></p>
    <p><strong>Registrado desde:</strong> <?= esc($usuario['created_at']) ?></p>

    <a href="<?= base_url('/') ?>" class="btn btn-secondary">Volver al inicio</a>
</div>

<?= $this->include('layouts/footer') ?>
