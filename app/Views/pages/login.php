/*
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        <?php include 'login.css'; ?>
    </style>
</head>
<body>
<div class="login-container">
    <h2>Bienvenido a BEAN</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="error-message"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/auth/loginPost') ?>" method="post">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Tu contraseña" required>

        <button type="submit">Iniciar sesión</button>
    </form>

    <div class="footer-text">
        ¿No tienes una cuenta? <a href="#">Regístrate</a>
    </div>
</div>

</body>
</html>
