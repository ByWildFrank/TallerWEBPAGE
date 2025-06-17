<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap"
        rel="stylesheet">
    <style>
        <?php include 'principal.css'; ?>
    </style>
</head>

<body>
    <?= view('layouts/navBar/navBar') ?>

    <!-- Banner de Bienvenida para Usuario Logueado -->
    <?php if (session()->get('isLoggedIn')): ?>
        <div class="user-welcome-banner">
            <div class="user-welcome-content">
                <p class="welcome-text">
                    ¡Bienvenido/a, <span class="user-name"><?= esc(session()->get('nombre')) ?></span>!
                    Esperamos que disfrutes de nuestros cafés de especialidad.
                </p>
                <a href="<?= base_url('logout') ?>" class="logout-btn">
                    <svg class="logout-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                    </svg>
                    Cerrar Sesión
                </a>
            </div>
        </div>
    <?php endif; ?>


    <?= view('layouts/hero/hero') ?>

    <!-- DEBUG INFO - REMOVER EN PRODUCCIÓN -->

    <div style="background: yellow; padding: 10px;">
        <strong>Session Debug:</strong><br>
        <?php var_dump(session()->get()); ?>
    </div>


    <div class="general-container">
        <div class="text-container">
            <p class="italic">En BEAN creemos que el café es más que una bebida.</p>
            <p>Es un placer cotidiano, un mimo al alma.</p>
            <p>Prepararlo no es solo rutina, es un ritual que nos conecta, nos renueva.</p>
            <p>Cada taza guarda un instante de pausa, aroma y propósito.</p>
            <p>Porque lo especial no es solo el café…</p>
            <p>Es el momento que te regalás.</p>
            <p class="bold">BEAN Café de especialidad, para rituales con sentido.</p>
        </div>
        <div class="ilustracion2">
            <img src="https://images.unsplash.com/photo-1582768772255-7fb8066357ce?q=80&w=2002&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        </div>
    </div>

    <div class="mapaMundial">
        <img src="<?= base_url('assets/img/mapaMundial169-Photoroom.png') ?>" style="max-width: 100%; height: auto; align-items: center">
    </div>

    <div class="pie-foto mb-5">
        <p>CONOCÉ EL MUNDO</p>
        <p>DEL CAFÉ, EXPLORALO</p>
        <p>TAZA POR TAZA</p>
    </div>

    <div class="boton-catalogo-completo">
        <a href="<?= base_url('catalogo') ?>">Ver Catálogo Completo </a>
    </div>

    <?= view('layouts/editorsChoice/editorsChoice') ?>
    <?= view('layouts/footer/footer') ?>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/editorsChoice.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>