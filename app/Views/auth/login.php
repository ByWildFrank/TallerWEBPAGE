<!DOCTYPE html>
<html>
<head>
    <title>Login - BEAN</title>
    <Style>
        <? include 'login.css'; ?>
    </Style>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <form method="post" action="<?= base_url('auth/loginPost') ?>">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
