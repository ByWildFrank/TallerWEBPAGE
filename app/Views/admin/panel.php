<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador - BEAN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        <?php include 'panel.css'; ?>
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Panel de Administración</h1>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <p>Bienvenido/a, <strong><?= session()->get('usuario_nombre') ?></strong>.</p>

        <ul class="list-group mt-4">
            <li class="list-group-item">
                <a href="<?= base_url('admin/usuarios') ?>">👥 Gestionar Usuarios</a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('admin/productos') ?>">📦 Gestionar Productos</a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('logout') ?>">🚪 Cerrar sesión</a>
            </li>
        </ul>
    </div>
</body>
</html>
