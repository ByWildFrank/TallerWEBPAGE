<!-- app/Views/quienesSomos.php -->
<?= $this->extend('layouts/layoutBase') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/quienesSomos.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="quienes-somos" class="quienes-somos container py-5">
    <div class="row row-texto mb-5">
        <div class="col-12 text-center">
            <h2>Quiénes Somos</h2>
            <p><strong>BEAN</strong> nace del encuentro entre ciencia, tecnología y una profunda pasión por el café.</p>
            <p>Somos <strong>Santiago</strong> (Data Scientist, CEO & Co-founder) y <strong>Franco</strong> (Software Engineer, CEO & Co-founder), dos amigos, comerciantes y tostadores con más de <strong>15 años de experiencia en el universo del café de especialidad</strong>. A lo largo de este camino, cultivamos no solo conocimiento técnico, sino una sensibilidad única para seleccionar y realzar los perfiles más nobles de cada grano.</p>
            <p>Nuestra visión con BEAN es clara: <em>acercar café de clase mundial al paladar argentino</em>, honrando a los productores de todo el mundo y sumando valor desde el tueste local, con una mirada innovadora y sustentable.</p>
            <p>Conformamos un equipo pequeño, pero con una mirada amplia y profesional. Cada lote que llega a tus manos fue seleccionado, tostado y probado por nosotros, cuidando cada detalle desde el origen hasta tu taza.</p>
            <p>Creemos en el café como un puente: entre culturas, saberes, aromas y personas. Y queremos invitarte a cruzarlo con nosotros.</p>
        </div>
    </div>

    <div class="fotos-perfil">
        <div class="perfil-card text-center">
            <img src="<?= base_url('assets/img/santi.png') ?>" alt="Santiago - Data Scientist" class="perfil-img">
            <h5>Santiago</h5>
            <p class="role">Data Scientist · CEO & Co-founder</p>
        </div>
        <div class="perfil-card text-center">
            <img src="<?= base_url('assets/img/franco.png') ?>" alt="Franco - Software Engineer" class="perfil-img">
            <h5>Franco</h5>
            <p class="role">Software Engineer · CEO & Co-founder</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>