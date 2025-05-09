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
    <img src="../assets/img/cafetailandia.png" alt="Tailandia del norte">
    <div class="info">
      <h2>Tailandia del norte</h2>
      <p>Notas de almendra tostada y vainilla, sabor dulce y redondo.</p>
      <p><strong>Origen:</strong> Tailandia</p>
      <button class="alert-button">Más información</button>
    </div>
  </div>
  <div class="carousel-slide">
    <img src="../assets/img/cafetanzania.png" alt="Tanzania Silvestre">
    <div class="info">
      <h2>Tanzania Silvestre</h2>
      <p>Notas de mora y té negro, sabor intenso y aromático.</p>
      <p><strong>Origen:</strong> Tanzania</p>
      <button class="alert-button">Más información</button>
    </div>
  </div>
  <div class="carousel-slide">
    <img src="../assets/img/cafecolombia.png" alt="Colombia Supremo">
    <div class="info">
      <h2>Colombia Supremo</h2>
      <p>Notas de chocolate y nuez, sabor dulce.</p>
      <p><strong>Origen:</strong> Colombia</p>
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