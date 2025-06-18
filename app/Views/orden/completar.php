<?= $this->include('layouts\navBar\navBar.php') ?>

<div class="container" style="margin-top: 80px; padding: 20px;">
    <h2>Confirmar Compra</h2>
    <p>Revisa los detalles de tu orden antes de finalizarla.</p>

    <h3>Orden #<?= esc($orden['id']) ?></h3>
    <p>Fecha: <?= date('d/m/Y H:i', strtotime($orden['fecha_creacion'])) ?></p>
    <p>Total: $<?= number_format($orden['total'], 2) ?></p>
    <p>Estado: <?= esc($orden['estado']) ?></p>

    <h4>Detalles de la Orden</h4>
    <table class="table">
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

    <h4>Factura</h4>
    <p>Número: <?= esc($factura['numero_factura'] ?? 'No disponible') ?></p>
    <p>Fecha de Emisión: <?= date('d/m/Y H:i', strtotime($factura['fecha_emision'] ?? time())) ?></p>
    <p>Total: $<?= number_format($factura['total'] ?? $orden['total'], 2) ?></p>
    <p>Estado: <?= esc($factura['estado'] ?? 'Pendiente') ?></p>

    <a href="<?= base_url('/orden/finalizar/' . $orden['id']) ?>" class="btn btn-success">Finalizar Compra</a>
    <a href="<?= base_url('/carrito/ver') ?>" class="btn btn-secondary">Volver al Carrito</a>
</div>

<?= $this->include('layouts\footer\footer.php') ?>