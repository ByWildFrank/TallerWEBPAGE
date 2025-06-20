<!-- app/Views/confirmarCompra.php -->
<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/completar.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="confirmar-compra" class="confirmar-compra container py-5">
    <h2>Confirmar Compra</h2>
    <p>Revisa los detalles de tu orden antes de finalizarla.</p>

    <div class="order-details">
        <h3>Orden #<?= esc($orden['id']) ?></h3>
        <p><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($orden['fecha_creacion'])) ?></p>
        <p><strong>Total:</strong> $<?= number_format($orden['total'], 2) ?></p>
        <p><strong>Estado:</strong> <?= esc($orden['estado']) ?></p>
    </div>

    <div class="order-items">
        <h4>Detalles de la Orden</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalles as $detalle): ?>
                        <tr>
                            <td><?= esc($detalle['nombre'] ?? 'Sin nombre') ?></td>
                            <td><?= esc($detalle['cantidad'] ?? 0) ?></td>
                            <td>$<?= number_format($detalle['precio_unitario'] ?? 0, 2) ?></td>
                            <td>$<?= number_format($detalle['subtotal'] ?? 0, 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="invoice-details">
        <h4>Factura</h4>
        <p><strong>Número:</strong> <?= esc($factura['numero_factura'] ?? 'No disponible') ?></p>
        <p><strong>Fecha de Emisión:</strong> <?= date('d/m/Y H:i', strtotime($factura['fecha_emision'] ?? time())) ?></p>
        <p><strong>Total:</strong> $<?= number_format($factura['total'] ?? $orden['total'], 2) ?></p>
        <p><strong>Estado:</strong> <?= esc($factura['estado'] ?? 'Pendiente') ?></p>
    </div>

    <div class="actions mt-4">
        <a href="<?= base_url('/orden/imprimirFactura/' . $orden['id']) ?>" class="btn btn-primary me-2">Descargar Factura</a>
        <a href="<?= base_url('/orden/finalizar/' . $orden['id']) ?>" class="btn btn-success me-2">Finalizar Compra</a>
        <a href="<?= base_url('/carrito/ver') ?>" class="btn btn-secondary">Volver al Carrito</a>
    </div>
</section>
<?= $this->endSection() ?>