<?= $this->extend('layouts/layoutAdmin') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h1 class="mb-4">👥 Gestión de Usuarios</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="<?= base_url('admin/usuarios/nuevo') ?>" class="btn btn-success mb-3">
        <i class="bi bi-person-plus-fill"></i> Nuevo Usuario
    </a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= esc($usuario['nombre']) . ' ' . esc($usuario['apellido']) ?></td>
                        <td><?= esc($usuario['email']) ?></td>
                        <td><?= esc($usuario['telefono']) ?></td>
                        <td><?= $usuario['active'] ? 'Activo' : 'Inactivo' ?></td>
                        <td>
                            <a href="<?= base_url('admin/usuarios/editar/' . $usuario['id']) ?>" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <?php if ($usuario['active']): ?>
                                <a href="<?= base_url('admin/usuarios/desactivar/' . $usuario['id']) ?>" class="btn btn-sm btn-danger">
                                    <i class="bi bi-person-dash"></i> Desactivar
                                </a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/usuarios/activar/' . $usuario['id']) ?>" class="btn btn-sm btn-success">
                                    <i class="bi bi-person-check"></i> Activar
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
