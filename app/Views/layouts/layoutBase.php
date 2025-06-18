<!-- app/Views/layouts/layoutBase.php -->
<!DOCTYPE html>
<html lang="es">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?? 'BEAN' ?></title>

    <!-- Estilos comunes -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/navBar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/hero.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/editorsChoice.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">

    <!-- Estilos específicos de cada página -->
    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/contacto.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/comercializacion.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/quienesSomos.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/quienesSomos.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/terminosCondiciones.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/principal.css') ?>">
    <?= $this->endSection() ?>

    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/mi_cuenta.css') ?>">
    <?= $this->endSection() ?>
    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/panel.css') ?>">
    <?= $this->endSection() ?>
    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/panel.css') ?>">
    <?= $this->endSection() ?>

</head>
<body>
    <!-- Navbar -->
    <?= view('layouts/navBar') ?>

    <!-- Hero -->
    <?= view('layouts/hero') ?>

    <!-- Contenido dinámico -->
    <main class="container mt-4">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Editor's Choice (carrusel) -->
    <?= view('layouts/editorsChoice') ?>

    <!-- Footer -->
    <?= view('layouts/footer') ?>

    <!-- Scripts comunes -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Scripts específicos de cada página -->
    <?= $this->renderSection('scripts') ?>
</body>
</html>