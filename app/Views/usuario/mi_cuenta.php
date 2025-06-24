<?= $this->extend('layouts/layoutBase') ?>

<?php $noHero = true;
$noEditorsChoice = true; ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/mi-cuenta.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content container py-5">
    <h2 class="mb-4">Mi Cuenta</h2>

    <div class="info-item mb-3">
        <label class="fw-bold">Nombre:</label>
        <p><?= esc($usuario['nombre']) ?></p>
    </div>

    <div class="info-item mb-3">
        <label class="fw-bold">Apellido:</label>
        <p><?= esc($usuario['apellido']) ?></p>
    </div>

    <div class="info-item mb-3">
        <label class="fw-bold">Email:</label>
        <p><?= esc($usuario['email']) ?></p>
    </div>

    <div class="info-item mb-5">
        <label class="fw-bold">Rol:</label>
        <p><?= esc($usuario['rol']) ?></p>
    </div>

    <h3>Historial de Órdenes</h3>

    <?php if (empty($ordenes)): ?>
        <p class="text-muted">No tienes órdenes registradas.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped orden-table">
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
                        $factura = $facturas[$orden['id']] ?? null;
                    ?>
                        <tr>
                            <td>#<?= esc($orden['id']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($orden['fecha_creacion'])) ?></td>
                            <td>$<?= number_format($orden['total'], 2) ?></td>
                            <td><?= esc($orden['estado']) ?></td>
                            <td class="factura-info">
                                <?php if ($factura): ?>
                                    Número: <?= esc($factura['numero_factura']) ?><br>
                                    Estado: <?= esc($factura['estado']) ?><br>
                                    <a href="<?= base_url('/orden/imprimirFactura/' . $orden['id']) ?>" class="btn btn-sm btn-primary mt-1">Descargar Factura</a>
                                <?php else: ?>
                                    <span class="text-muted">No disponible</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <table class="table table-sm table-bordered detalle-table">
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
        </div>
    <?php endif; ?>

    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-4">← Volver al inicio</a>
</div>
<?= $this->endSection() ?>