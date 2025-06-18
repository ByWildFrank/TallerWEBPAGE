<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Cuenta - BEAN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-item label {
            font-weight: bold;
        }

        .info-item p {
            margin: 0;
            color: #333;
        }

        .btn-volver {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?= view('layouts/navBar/navBar') ?>
    <div class="container">
        <h2>Mi Cuenta</h2>

        <div class="info-item">
            <label>Nombre:</label>
            <p><?= session()->get('nombre') ?></p>
        </div>

        <div class="info-item">
            <label>Apellido:</label>
            <p><?= session()->get('apellido') ?></p>
        </div>

        <div class="info-item">
            <label>Email:</label>
            <p><?= session()->get('email') ?></p>
        </div>

        <div class="info-item">
            <label>Rol:</label>
            <p><?= session()->get('rol') ?></p>
        </div>

        <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-volver">← Volver al inicio</a>
    </div>

</body>
</html>
