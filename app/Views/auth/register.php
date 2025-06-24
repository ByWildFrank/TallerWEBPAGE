<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - BEAN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        <?php include 'register.css'; ?>
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Registrarse</h2>

        <!-- Mostrar errores -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Mostrar mensajes de éxito -->
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('auth/registerPost') ?>">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="<?= old('nombre') ?>">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" required value="<?= old('apellido') ?>">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required value="<?= old('email') ?>">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?= old('direccion') ?>">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?= old('telefono') ?>">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Registrarse</button>
        </form>

        <div class="back-link mt-3">
            ¿Ya tenés cuenta? <a href="<?= base_url('login') ?>">Iniciar sesión</a>
        </div>
    </div>
</body>
</html>
