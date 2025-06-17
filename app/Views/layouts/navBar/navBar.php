<style>
  <?php include 'navBar.css'; ?>
</style>


<nav class="navbar navbar-expand-xl">
  <div class="container">
    <!-- Boton hamburguesa -->
    <button class="navbar-toggler border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="<?= base_url('principal') ?>">
      <img src="<?= base_url('assets/img/MarcaPNGreducida.png') ?>" alt="BEAN_logo">
    </a>

    <!-- Menu Offcanvas -->
    <div class="offcanvas offcanvas-start" id="offcanvasNavbar">
      <div class="offcanvas-header px-3 px-4 bg-secondary ">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('principal') ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('quienesSomos') ?>">Quiénes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('comercializacion') ?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('contacto') ?>">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('terminosCondiciones') ?>">Términos y Condiciones</a>
          </li>
        </ul>

        <!-- Menú de usuario -->
        <ul class="navbar-nav ms-auto">
          <?php if (session()->get('isLoggedIn')): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user"></i> <?= esc(session()->get('nombre')) ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="<?= base_url('mi-cuenta') ?>">Mi Cuenta</a></li>
                <li><a class="dropdown-item" href="<?= base_url('carrito') ?>">Mi Carrito</a></li>
                <li><a class="dropdown-item" href="<?= base_url('mis-pedidos') ?>">Mis Pedidos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Cerrar Sesión</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('login') ?>">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('register') ?>">Registrarse</a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </div>
</nav>