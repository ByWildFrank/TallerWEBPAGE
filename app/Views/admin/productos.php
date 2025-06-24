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
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="admin-producto">
    <h2>Agregar Nuevo Producto</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('admin/productos/guardar') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="disponible">Disponible</option>
                <option value="no disponible">No disponible</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pais_origen">País de Origen</label>
            <input type="text" class="form-control" id="pais_origen" name="pais_origen" required>
        </div>
        <div class="form-group">
            <label>Imagen</label>
            <div class="drop-zone" id="drop-zone">Arrastra una imagen aquí o haz clic para seleccionar<br><span>(Formatos aceptados: JPG, PNG)</span></div>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg,image/png" style="display: none;" required>
            <div id="preview"></div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </form>
</div>
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
