
<?= $this->extend('layouts/layoutAdmin') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h1 class="mb-4">✏️ Editar Usuario</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('admin/usuarios/actualizar/' . $usuario['id']) ?>" method="post">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>" required>
            </div>
            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?= esc($usuario['apellido']) ?>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" value="<?= esc($usuario['email']) ?>" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?= esc($usuario['telefono']) ?>">
            </div>
            <div class="col-md-12">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?= esc($usuario['direccion']) ?>">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
