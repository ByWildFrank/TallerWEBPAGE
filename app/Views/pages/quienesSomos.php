<!DOCTYPE html>
<html>

<head>
    <title>BEAN - Quienes Somos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap"
        rel="stylesheet">

    <style>
        <?php include 'quienesSomos.css'; ?>
    </style>

</head>

<body>
    <?= view('layouts/navBar/navBar') ?>

    <section id="quienes-somos">
        <div class="row row-texto">
            <h2>Quiénes Somos</h2>
            <p><strong>BEAN</strong> nace del encuentro entre ciencia, tecnología y una profunda pasión por el café.</p>
            <p>Somos <strong>Santiago</strong> (Data Scientist, CEO & Co-founder) y <strong>Franco</strong> (Software
                Engineer, CEO & Co-founder), dos amigos, comerciantes y tostadores con más de <strong>15 años de
                    experiencia en el universo del café de especialidad</strong>. A lo largo de este camino, cultivamos
                no solo conocimiento técnico, sino una sensibilidad única para seleccionar y realzar los perfiles más
                nobles de cada grano.</p>
            <p>Nuestra visión con BEAN es clara: <em>acercar café de clase mundial al paladar argentino</em>, honrando a
                los productores de todo el mundo y sumando valor desde el tueste local, con una mirada innovadora y
                sustentable.</p>
            <p>Conformamos un equipo pequeño, pero con una mirada amplia y profesional. Cada lote que llega a tus manos
                fue seleccionado, tostado y probado por nosotros, cuidando cada detalle desde el origen hasta tu taza.
            </p>
            <p>Creemos en el café como un puente: entre culturas, saberes, aromas y personas. Y queremos invitarte a
                cruzarlo con nosotros.</p>
        </div>

        <div class="fotos-perfil">
            <div class="perfil-card">
                <img src="../assets/img/santi.png" alt="Santiago - Data Scientist">
                <h5>Santiago</h5>
                <p class="role">Data Scientist · CEO &amp; Co-founder</p>
            </div>
            <div class="perfil-card">
                <img src="../assets/img/franco.png" alt="Franco - Software Engineer">
                <h5>Franco</h5>
                <p class="role">Software Engineer · CEO &amp; Co-founder</p>
            </div>
        </div>
    </section>

    <?= view('layouts/footer/footer') ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>