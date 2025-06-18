<!-- app/Views/principal.php -->

<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<style>
    <?php include 'principal.css'; ?>
</style>
<?= $this->endSection() ?>

<?= $this->section('hero') ?>
    <?= view('layouts/hero/hero') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

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
            <img src="https://images.unsplash.com/photo-1582768772255-7fb8066357ce?q=80&w=2002&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Ilustración café" />
        </div>
    </div>

    <div class="mapaMundial">
        <img src="<?= base_url('assets/img/mapaMundial169-Photoroom.png') ?>" style="max-width: 100%; height: auto; align-items: center" alt="Mapa Mundial del café" />
    </div>

    <div class="pie-foto mb-5">
        <p>CONOCÉ EL MUNDO</p>
        <p>DEL CAFÉ, EXPLORALO</p>
        <p>TAZA POR TAZA</p>
    </div>

    <div class="boton-catalogo-completo">
        <a href="<?= base_url('catalogo') ?>">Ver Catálogo Completo </a>
    </div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
    <script src="<?= base_url('assets/js/editorsChoice.js') ?>"></script>
<?= $this->endSection() ?>
