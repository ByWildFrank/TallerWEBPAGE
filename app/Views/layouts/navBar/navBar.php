<style>
  <?php include 'navBar.css'; ?>
</style>


<nav class="navbar navbar-expand-md fixed-top mb-4">
  <div class="container">
    <!-- Boton hamburguesa -->
    <button class="navbar-toggler border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="#">
  <img src="../public/MarcaPNGreducida.png" alt="BEAN" class="logo-img">
</a>

    <!-- Menu Offcanvas -->
    <div class="offcanvas offcanvas-start" id="offcanvasNavbar">
      <div class="offcanvas-header px-3 px-4 bg-secondary ">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 m-2">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Quiénes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>