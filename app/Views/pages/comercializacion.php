<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN - Comercialización</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap"
        rel="stylesheet">

    <style>
        <?php include 'comercializacion.css'; ?>
    </style>

</head>

<body>
    <?= view('layouts/navBar/navBar') ?>
    <section class="comercializacion container p-5 my-5">
        <h1 class="mb-4">Comercialización</h1>

        <p class="intro">
            En BEAN creemos que cada grano cuenta una historia: desde el cafetal hasta tu taza. Nuestro compromiso es
            acompañarte en cada paso, ofreciéndote granos de especialidad de los mejores productores del mundo, un
            sistema de envíos ágil y las opciones de pago que más se adaptan a vos.
        </p>
        <div class="row gx-5 mt-4">

            <!-- Productos (narrativo) -->
            <div class="col-lg-4 mb-4">
                <h2>Productos</h2>
                <p>
                    Seleccionamos a mano lotes únicos de café de especialidad, visitando fincas y colaborando con
                    productores certificados. Cada grano es tostado artesanalmente en nuestro centro en Argentina,
                    revelando perfiles de sabor que van desde notas frutales y florales hasta tonos achocolatados y a
                    nuez, pensados para todos los métodos de preparación.
                </p>
            </div>

            <!-- Envíos (narrativo) -->
            <div class="col-lg-4 mb-4">
                <h2>Envíos</h2>
                <p>
                    Sabemos que esperar tu café es parte de la experiencia. Por eso despachamos en 24-48 h hábiles en
                    CABA y GBA, y en 3-5 días en el resto del país, a través de Correo Argentino y Andreani. Si preferís
                    retirar personalmente, podés pasar por nuestro local y conocer de cerca nuestro proceso de tueste.
                </p>
                <div class="payment-img mt-4 text-center">
                    <img src="../assets/img/andreani.svg" alt="Correo Argentino" class="img">
                    <img src="../assets/img/correoarg.svg" alt="Andreani" class="img">
                </div>
            </div>

            <!-- Pago & Devoluciones (narrativo) -->
            <div class="col-lg-4 mb-4">
                <h2>Pago & Devoluciones</h2>
                <p>
                    Para que tu compra sea tan placentera como el café, aceptamos tarjetas (Visa, Mastercard, AmEx),
                    Mercado Pago, transferencias bancarias y efectivo (Rapipago/PagoFácil). Y si algo no cumple tus
                    expectativas, contamos con una política de devolución gratuita durante los primeros 7 días.
                </p>
                <div class="payment-img mt-4 text-center">
                    <img src="../assets/img/visa.svg" alt="Visa" class="img">
                    <img src="../assets/img/mastercard.svg" alt="Mastercard" class="img">
                    <img src="../assets/img/americanexpress.svg" alt="American Express" class="img">
                    <img src="../assets/img/mercadopago.svg" alt="Mercado Pago" class="img">
                    <img src="../assets/img/paypal.svg" alt="PayPal" class="img">
                </div>
            </div>

        </div>
    </section>
    <?= view('layouts/footer/footer') ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>