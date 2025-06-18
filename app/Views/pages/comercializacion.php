<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/comercializacion.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section id="comercial" class="comercial container">
    <h1 class="mb-3">Comercialización</h1>

    <p class="intro">
        En BEAN creemos que cada grano cuenta una historia: desde el cafetal hasta tu taza. Nuestro compromiso es
        acompañarte en cada paso, ofreciéndote granos de especialidad de los mejores productores del mundo, un
        sistema de envíos ágil y las opciones de pago que más se adaptan a vos.
    </p>

    <div class="row gx-4 mt-3">
        <!-- Productos -->
        <div class="col-lg-4 mb-3">
            <h2>Productos</h2>
            <p>
                Seleccionamos a mano lotes únicos de café de especialidad, visitando fincas y colaborando con
                productores certificados. Cada grano es tostado artesanalmente en nuestro centro en Argentina,
                revelando perfiles de sabor que van desde notas frutales y florales hasta tonos achocolatados y a
                nuez, pensados para todos los métodos de preparación.
            </p>
        </div>

        <!-- Envíos -->
        <div class="col-lg-4 mb-3">
            <h2>Envíos</h2>
            <p>
                Sabemos que esperar tu café es parte de la experiencia. Por eso despachamos en 24-48 h hábiles en
                CABA y GBA, y en 3-5 días en el resto del país, a través de Correo Argentino y Andreani. Si preferís
                retirar personalmente, podés pasar por nuestro local y conocer de cerca nuestro proceso de tueste.
            </p>
            <div class="payment-img mt-3 text-center">
                <img src="<?= base_url('assets/img/correoarg.svg') ?>" alt="Correo Argentino" class="img">
                <img src="<?= base_url('assets/img/andreani.svg') ?>" alt="Andreani" class="img">
            </div>
        </div>

        <!-- Pago & Devoluciones -->
        <div class="col-lg-4 mb-3">
            <h2>Pago & Devoluciones</h2>
            <p>
                Para que tu compra sea tan placentera como el café, aceptamos tarjetas (Visa, Mastercard, AmEx),
                Mercado Pago, transferencias bancarias y efectivo (Rapipago/PagoFácil). Y si algo no cumple tus
                expectativas, contamos con una política de devolución gratuita durante los primeros 7 días.
            </p>
            <div class="payment-img mt-3 text-center">
                <img src="<?= base_url('assets/img/visa.svg') ?>" alt="Visa" class="img">
                <img src="<?= base_url('assets/img/mastercard.svg') ?>" alt="Mastercard" class="img">
                <img src="<?= base_url('assets/img/americanexpress.svg') ?>" alt="American Express" class="img">
                <img src="<?= base_url('assets/img/mercadopago.svg') ?>" alt="Mercado Pago" class="img">
                <img src="<?= base_url('assets/img/paypal.svg') ?>" alt="PayPal" class="img">
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>