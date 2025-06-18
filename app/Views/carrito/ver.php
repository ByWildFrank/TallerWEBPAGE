<?= $this->include('layouts\navBar\navBar.php') ?>

<section>
    <h2>Mi carrito</h2>

    <?php if (empty($items)): ?>
        <p>No hay productos en el carrito.</p>
    <?php else: ?>
        <table class="table" style="padding: 20px;">
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
                <?php $total = 0;
                foreach ($items as $item):
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal; ?>
                    <tr>
                        <td><?= esc($item['nombre']) ?></td>
                        <td id="price-<?= $item['id'] ?>">$<?= number_format($item['precio'], 2) ?></td>
                        <td>
                            <div style="display: inline-flex; align-items: center;">
                                <button class="btn btn-sm btn-secondary" onclick="decreaseQuantity(<?= $item['id'] ?>)">-</button>
                                <input type="text" class="form-control" value="<?= $item['cantidad'] ?>" id="quantity-<?= $item['id'] ?>" readonly style="width: 50px; text-align: center; margin: 0 5px;">
                                <button class="btn btn-sm btn-secondary" onclick="increaseQuantity(<?= $item['id'] ?>)">+</button>
                            </div>
                        </td>
                        <td id="subtotal-<?= $item['id'] ?>">$<?= number_format($subtotal, 2) ?></td>
                        <td>
                            <a href="<?= base_url('/carrito/eliminar/' . $item['id']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Total: <span id="total-amount">$<?= number_format($total, 2) ?></span></h4>

        <form action="<?= base_url('/orden/procesar') ?>" method="post">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <button type="submit" class="btn btn-success">Finalizar compra</button>
        </form>
    <?php endif; ?>

</section>
<?= $this->include('layouts\footer\footer.php') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            data: {
                '<?php echo csrf_token(); ?>': '<?php echo csrf_hash(); ?>'
            }
        });

        window.decreaseQuantity = function(id) {
            var currentQuantity = parseInt($('#quantity-' + id).val());
            if (currentQuantity > 1) {
                var newQuantity = currentQuantity - 1;
                updateQuantity(id, newQuantity);
            } else {
                alert('La cantidad mínima es 1');
            }
        };

        window.increaseQuantity = function(id) {
            var currentQuantity = parseInt($('#quantity-' + id).val());
            var newQuantity = currentQuantity + 1;
            updateQuantity(id, newQuantity);
        };

        window.updateQuantity = function(id, quantity) {
            $('#quantity-' + id).val(quantity);
            var price = parseFloat($('#price-' + id).text().replace('$', ''));
            var subtotal = price * quantity;
            $('#subtotal-' + id).text('$' + subtotal.toFixed(2));
            var total = 0;
            $('td[id^="subtotal-"]').each(function() {
                total += parseFloat($(this).text().replace('$', ''));
            });
            $('#total-amount').text('$' + total.toFixed(2));
            $.ajax({
                url: '<?= base_url('/carrito/actualizar') ?>',
                type: 'POST',
                data: {
                    id_item: id,
                    cantidad: quantity
                },

            });
        };
    });
</script>