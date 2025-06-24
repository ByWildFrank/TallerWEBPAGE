<?= $this->extend('layouts/layoutAdmin') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h1 class="mb-4">📩 Gestión de Consultas</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a href="<?= base_url('admin/panel') ?>" class="btn btn-secondary mb-3">Volver al Panel</a>

    <?php if (empty($consultas)): ?>
        <p class="alert alert-info">No hay consultas registradas.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Preferencia</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= esc($consulta['id']) ?></td>
                            <td><?= esc($consulta['usuario_nombre'] ?: 'No registrado') ?></td>
                            <td><?= esc($consulta['nombre']) ?></td>
                            <td><?= esc($consulta['email']) ?></td>
                            <td><?= esc($consulta['telephone'] ?: '-') ?></td>
                            <td><?= esc($consulta['asunto']) ?></td>
                            <td><?= esc(substr($consulta['mensaje'], 0, 50)) . (strlen($consulta['mensaje']) > 50 ? '...' : '') ?></td>
                            <td><?= esc($consulta['contact_preference']) ?></td>
                            <td>
                                <span class="badge <?= $consulta['estado'] == 'pendiente' ? 'bg-danger' : 'bg-success' ?>">
                                    <?= esc($consulta['estado']) ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($consulta['fecha'])) ?></td>
                            <td>
                                <a href="<?= base_url('admin/consultas/cambiarEstado/' . $consulta['id']) ?>" 
                                   class="btn btn-sm <?= $consulta['estado'] == 'pendiente' ? 'btn-primary' : 'btn-warning' ?>">
                                   <?= $consulta['estado'] == 'pendiente' ? 'Marcar Contestada' : 'Marcar Pendiente' ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>