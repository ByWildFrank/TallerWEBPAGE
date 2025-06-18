<head>
  <style>
    <?php include 'footer.css'; ?>
  </style>

  <!-- Asegúrate de incluir los archivos CSS y JS de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<footer class="footer">
  <div class="footer-container">
    <!-- CTA Box -->
    <div class="box">
      <div class="box-content">
        <h2>Visita nuestro catálogo completo</h2>
        <h3>¡Vamos!</h3>
      </div>
      <button class="">
        <a href="<?= base_url('catalogo') ?>">Ver Catálogo</a>
      </button>
    </div>

    <!-- Footer Columns -->
    <div class="footer-content">
      <div class="footer-column">
        <h3>Clientes</h3>
        <ul class="footer-links">
          <li><a href="<?= base_url('contacto') ?>">Contacto</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Nuestra Empresa</h3>
        <ul class="footer-links">
          <li><a href="<?= base_url('quienesSomos') ?>">Quiénes somos</a></li>
          <li><a href="<?= base_url('comercializacion') ?>">Comercialización</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Más información</h3>
        <ul class="footer-links">
          <li><a href="<?= base_url('terminosCondiciones') ?>">Términos &amp; Condiciones</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Síguenos</h3>
        <ul class="social-links">
          <a href="https://www.facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
          <a href="https://x.com/" target="_blank"><i class="bi bi-twitter"></i></a>
          <a href="https://www.linkedin.com" target="_blank"><i class="bi bi-linkedin"></i></a>
          <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
        </ul>
      </div>

      <div class="footer-column brand">
        <a class="footer-brand" href="<?= base_url('principal') ?>">
          <img src="<?= base_url('assets/img/MarcaPNGreducida.png') ?>" alt="BEAN_logo">
        </a>
        <p class="copyright">© 2025</p>
      </div>
    </div>
  </div>
</footer>