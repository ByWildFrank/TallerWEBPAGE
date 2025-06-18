<!-- app/Views/layouts/layoutBase.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title ?? 'BEAN' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/css/navBar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/hero.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/editorsChoice.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>" />

    <?= $this->renderSection('styles') ?>
</head>
<body>

    <?= view('layouts/navBar/navBar') ?>

    <!-- Aquí agregá el hero con una sección específica -->
    <?= $this->renderSection('hero') ?>

    <!-- Contenedor para el contenido restante -->
    <main class="container mt-4">
        <?= $this->renderSection('content') ?>
    </main>

    <?= view('layouts/editorsChoice/editorsChoice') ?>
    <?= view('layouts/footer/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('scripts') ?>

</body>

</html>
