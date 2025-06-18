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
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            z-index: 1000;
        }

        .navbar-brand, .nav-link {
            color: #333 !important;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #007bff !important;
        }

        .content {
            max-width: 1200px;
            margin: 80px auto 20px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
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

        .orden-table {
            margin-top: 30px;
        }

        .detalle-table {
            margin-left: 20px;
            font-size: 0.9em;
        }

        .factura-info {
            margin-top: 10px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <?= view('layouts/navBar/navBar') ?>
    <div class="content">
        <h2>Mi Cuenta</h2>

        <div class="info-item">
            <label>Nombre:</label>
            <p><?= esc($usuario['nombre']) ?></p>
        </div>

        <div class="info-item">
            <label>Apellido:</label>
            <p><?= esc($usuario['apellido']) ?></p>
        </div>

        <div class="info-item">
            <label>Email:</label>
            <p><?= esc($usuario['email']) ?></p>
        </div>

        <div class="info-item">
            <label>Rol:</label>
            <p><?= esc($usuario['rol']) ?></p>
        </div>

        <h3>Historial de Órdenes</h3>
        <?php if (empty($ordenes)): ?>
            <p>No tienes órdenes registradas.</p>
        <?php else: ?>
            <table class="table orden-table">
                <thead>
                    <tr>
                        <th>Número de Orden</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Factura</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordenes as $orden): 
                        // Intentamos obtener la factura desde los datos pasados o usamos un valor por defecto
                        $factura = isset($facturas[$orden['id']]) ? $facturas[$orden['id']] : null;
                    ?>
                        <tr>
                            <td>#<?= esc($orden['id']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($orden['fecha_creacion'])) ?></td>
                            <td>$<?= number_format($orden['total'], 2) ?></td>
                            <td><?= esc($orden['estado']) ?></td>
                            <td class="factura-info">
                                <?php if ($factura): ?>
                                    Número: <?= esc($factura['numero_factura']) ?><br>
                                    Estado: <?= esc($factura['estado']) ?>
                                <?php else: ?>
                                    No disponible
                                <?php endif; ?>
                            </td>
                            <td>
                                <table class="table detalle-table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orden['detalles'] as $detalle): ?>
                                            <tr>
                                                <td><?= esc($detalle['nombre']) ?></td>
                                                <td><?= esc($detalle['cantidad']) ?></td>
                                                <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
                                                <td>$<?= number_format($detalle['subtotal'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-volver">← Volver al inicio</a>
    </div>
    <?= view('layouts/footer/footer') ?>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/editorsChoice.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>