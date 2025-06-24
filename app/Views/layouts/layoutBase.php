<!-- app/Views/layouts/layoutBase.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title ?? 'BEAN' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/navBar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/hero.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/editorsChoice.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>" />

    <?= $this->renderSection('styles') ?>
</head>
<body>

    <?= view('layouts/navBar/navBar') ?>

    <?php if (!isset($noHero) || $noHero !== true): ?>
        <?= view('layouts/hero/hero') ?>
    <?php endif; ?>

    <!-- Contenedor para el contenido restante -->
    <?= $this->renderSection('content') ?>

    <?php if (!isset($noEditorsChoice) || $noEditorsChoice !== true): ?>
        <?= view('layouts/editorsChoice/editorsChoice') ?>
    <?php endif; ?>


    <?php if (!isset($noFooter) || $noFooter !== true): ?>
    <?= view('layouts/footer/footer') ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('scripts') ?>

</body>

</html>
