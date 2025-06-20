<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - BEAN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        <?php include 'login.css'; ?>
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Iniciar Sesión</h2>
        
        
        
        <form method="post" action="<?= base_url('auth/loginPost') ?>">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       class="form-control" 
                       required 
                       value="<?= old('email') ?>"
                       placeholder="tu@email.com">
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       class="form-control" 
                       required
                       placeholder="Tu contraseña">
            </div>
            
            <button type="submit" class="btn btn-login">Entrar</button>
        </form>
        
        <div class="back-link">
            <a href="<?= base_url('/') ?>">← Volver al inicio</a>
        </div>
        <div class="back-link">
             <a class="nav-link" href="<?= base_url('register') ?>">Registrarse</a>
        </div>
    </div>
</body>
</html>