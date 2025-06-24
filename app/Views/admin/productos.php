<?= $this->extend('layouts/layoutAdmin') ?>

<?= $this->section('styles') ?>
<style>
    .admin-producto {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .admin-producto h2 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: 500;
        color: #34495e;
    }
    .form-control {
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    .drop-zone {
        border: 2px dashed #ced4da;
        padding: 20px;
        text-align: center;
        background-color: #f8f9fa;
        border-radius: 4px;
        margin-bottom: 15px;
        cursor: pointer;
    }
    .drop-zone.dragover {
        background-color: #e9ecef;
        border-color: #6c757d;
    }
    .preview-image {
        max-width: 200px;
        margin-top: 10px;
        border-radius: 4px;
    }
    .btn-primary {
        background-color: #2c3e50;
        border-color: #2c3e50;
    }
    .btn-primary:hover {
        background-color: #233240;
        border-color: #233240;
    }

    .admin-tabla {
        max-width: 1000px;
        margin: 40px auto;
    }

    .admin-tabla table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .admin-tabla th,
    .admin-tabla td {
        border: 1px solid #dee2e6;
        padding: 10px;
        text-align: left;
    }

    .admin-tabla th {
        background-color: #f1f1f1;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="admin-producto">
    <h2><?= isset($producto) ? 'Editar Producto' : 'Agregar Nuevo Producto' ?></h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= isset($producto) ? base_url('admin/productos/actualizar/' . $producto['id']) : base_url('admin/productos/guardar') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre', $producto['nombre'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= old('descripcion', $producto['descripcion'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= old('precio', $producto['precio'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?= old('stock', $producto['stock'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" <?= old('estado', $producto['estado'] ?? '') == '1' ? 'selected' : '' ?>>Disponible</option>
                <option value="0" <?= old('estado', $producto['estado'] ?? '') == '0' ? 'selected' : '' ?>>No disponible</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pais_origen">País de Origen</label>
            <input type="text" class="form-control" id="pais_origen" name="pais_origen" value="<?= old('pais_origen', $producto['pais_origen'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label>Imagen</label>
            <div class="drop-zone" id="drop-zone">Arrastra una imagen aquí o haz clic para seleccionar<br><span>(Formatos aceptados: JPG, PNG)</span></div>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg,image/png" style="display: none;" <?= isset($producto) ? '' : 'required' ?>>
            <div id="preview">
                <?php if (isset($producto['imagen'])): ?>
                    <img src="<?= base_url('assets/img/Products/' . $producto['imagen']) ?>" class="preview-image">
                <?php endif; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($producto) ? 'Actualizar Producto' : 'Guardar Producto' ?></button>
    </form>
</div>

<?php if (isset($productos) && count($productos) > 0): ?>
<div class="admin-tabla">
    <h2>Productos Existentes</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Origen</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= esc($p['nombre']) ?></td>
                    <td>$<?= number_format($p['precio'], 2, ',', '.') ?></td>
                    <td><?= esc($p['stock']) ?></td>
                    <td><?= $p['estado'] == 1 ? 'Disponible' : 'No disponible' ?></td>
                    <td><?= esc($p['pais_origen']) ?></td>
                    <td>
                        <?php if ($p['imagen']): ?>
                            <img src="<?= base_url('assets/img/Products/' . $p['imagen']) ?>" width="60">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/productos/editar/' . $p['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const dropZone = document.querySelector('.drop-zone');
    const inputFile = document.querySelector('#imagen');
    const preview = document.querySelector('#preview');

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            inputFile.files = files;
            const file = files[0];
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.innerHTML = `<img src="${e.target.result}" class="preview-image">`;
            };
            reader.readAsDataURL(file);
        }
    });

    dropZone.addEventListener('click', () => {
        inputFile.click();
    });

    inputFile.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.innerHTML = `<img src="${e.target.result}" class="preview-image">`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
<?= $this->endSection() ?>
