<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Ejemplo 1</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <style>
    <?php include 'hero.css'; ?>
  </style>
  <?= load_alert_assets() ?>
</head>

<body>
  <?= show_alert(title: 'Próximamente nuestros productos', message: 'Funcionalidad en contrucción!', type: 'warning', buttonText: 'Entendido') ?>

  <div class="hero-section">
    <div class="mask">
      <div class="hero-content">
        <div class="text-container">
          <h1>Sabores que cuentan historias</h1>
          <h2>Cafés de origen único, seleccionados de distintas regiones del mundo y tostados con alma.</h2>
        </div>
        <a class="btn alert-button" href="#productos">Ver productos</a>
      </div>
    </div>
  </div>

</body>

</html>