<?= $this->include('layouts\navBar\navBar.php') ?>

<h2>Mi carrito</h2>

<?php if (empty($items)): ?>
    <p>No hay productos en el carrito.</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; foreach ($items as $item): 
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            ?>
            <tr>
                <td><?= esc($item['nombre']) ?></td>
                <td>$<?= number_format($item['precio'], 2) ?></td>
                <td>
                    <form action="<?= base_url('/carrito/actualizar') ?>" method="post" style="display:inline;">
                        <input type="hidden" name="id_item" value="<?= $item['id'] ?>">
                        <input type="number" name="cantidad" value="<?= $item['cantidad'] ?>" min="1" style="width: 50px;">
                        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                    </form>
                </td>
                <td>$<?= number_format($subtotal, 2) ?></td>
                <td>
                    <a href="<?= base_url('/carrito/eliminar/' . $item['id']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h4>Total: $<?= number_format($total, 2) ?></h4>

    <a href="<?= base_url('/orden/procesar') ?>" class="btn btn-success">Finalizar compra</a>
<?php endif; ?>

<?= $this->include('layouts\footer\footer.php') ?>
