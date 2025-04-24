<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap" rel="stylesheet">

    <style>
    <?php include 'quienesSomos.css';?>
    </style>
    
</head>
<body>    
    <?= view('layouts/navBar/navBar') ?>
    
    <section class="container my-5" id="quienes-somos">

        <div class="row">
            <div class="col-lg-10 mx-auto">
        <h2 class="mb-4 text-center">Quiénes Somos</h2>
        <p class="lead">
            <strong>BEAN</strong> nace del encuentro entre ciencia, tecnología y una profunda pasión por el café.
        </p>
        <p>
            Somos <strong>Santiago</strong> (Data Scientist, CEO & Co-founder) y <strong>Franco</strong> (Software Engineer, CEO & Co-founder), dos amigos, comerciantes y tostadores con más de <strong>15 años de experiencia en el universo del café de especialidad</strong>. A lo largo de este camino, cultivamos no solo conocimiento técnico, sino una sensibilidad única para seleccionar y realzar los perfiles más nobles de cada grano.
        </p>
        <p>
            Nuestra visión con BEAN es clara: <em>acercar café de clase mundial al paladar argentino</em>, honrando a los productores de todo el mundo y sumando valor desde el tueste local, con una mirada innovadora y sustentable.
        </p>
        <p>
            Conformamos un equipo pequeño, pero con una mirada amplia y profesional. Cada lote que llega a tus manos fue seleccionado, tostado y probado por nosotros, cuidando cada detalle desde el origen hasta tu taza.
        </p>
        <p>
            Creemos en el café como un puente: entre culturas, saberes, aromas y personas. Y queremos invitarte a cruzarlo con nosotros.
        </p>
            </div>
            </div>
                <div class="row mt-5 justify-content-center text-center">
                <div class="col-md-4 mb-4">
                <img src="../assets/img/santi.png" class="img-fluid rounded-circle shadow picture" alt="Santiago - Data Scientist">
                <h5 class="mt-3">Santiago</h5>
                <p class="text-muted">Data Scientist · CEO & Co-founder</p>
                </div>
                <div class="col-md-4 mb-4">
                <img src="../assets/img/franco.png" class="img-fluid rounded-circle shadow picture" alt="Franco - Software Engineer">
                <h5 class="mt-3">Franco</h5>
                <p class="text-muted">Software Engineer · CEO & Co-founder</p>
            </div>
        </div>
    </section>

    <?= view('layouts/footer/footer') ?>
</body>
</html> 
