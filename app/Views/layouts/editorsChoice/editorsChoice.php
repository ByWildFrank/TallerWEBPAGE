<!-- Carousel Layout -->

<head>
  <style>
    <?php include 'editorsChoice.css'; ?>
  </style>

  <?= load_alert_assets() ?>
</head>

<?= show_alert(title: 'Próximamente nuestros productos', message: 'Funcionalidad en contrucción!', type: 'warning', buttonText: 'Entendido') ?>

<div class="carousel-container">
  <div class="carousel-slide">
    <img src="../assets/img/cafetailandia.png" alt="Colombia Supremo">
    <div class="info">
      <h2>Colombia Supremo</h2>
      <p>Notas suaves de caramelo y nuez.</p>
      <p><strong>Origen:</strong> Colombia</p>
      <button class="alert-button">Más información</button>
    </div>
  </div>
  <div class="carousel-slide">
    <img src="../assets/img/cafetanzania.png" alt="Ethiopian Yirgacheffe">
    <div class="info">
      <h2>Ethiopian Yirgacheffe</h2>
      <p>Toques florales y cítricos, cuerpo ligero.</p>
      <p><strong>Origen:</strong> Etiopía</p>
      <button class="alert-button">Más información</button>
    </div>
  </div>
  <div class="carousel-slide">
    <img src="../assets/img/cafecolombia.png" alt="Brazil Santos">
    <div class="info">
      <h2>Brazil Santos</h2>
      <p>Notas de chocolate y nuez, sabor dulce.</p>
      <p><strong>Origen:</strong> Brasil</p>
      <button class="alert-button">Más información</button>
    </div>
  </div>

  <button class="prev-btn" onclick="changeSlide(-1)">&#10094;</button>
  <button class="next-btn" onclick="changeSlide(1)">&#10095;</button>

  <div class="dots">
    <span class="dot" onclick="goToSlide(1)"></span>
    <span class="dot" onclick="goToSlide(2)"></span>
    <span class="dot" onclick="goToSlide(3)"></span>
  </div>
</div>