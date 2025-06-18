<?= $this->extend('layouts/layoutBase') ?>

<?php $noHero = true; $noEditorsChoice = true; ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/contacto.css') ?>">
<?= load_alert_assets() ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="container" class="p-4">
    <h1>&bull; Sigamos en contacto &bull;</h1>
    <div class="underline"></div>
    <div class="icon_wrapper">
        <img class="icon" src="<?= base_url('assets/img/iconoContacto.png') ?>" alt="Ícono contacto">
    </div>
    <form action="#" method="post" id="contact_form">
        <div class="text">
            <input type="text" placeholder="Mi nombre es" name="name" id="name_input" required>
        </div>
        <div class="email">
            <input type="email" placeholder="Mi e-mail es" name="email" id="email_input" required>
        </div>
        <div class="telephone">
            <input type="text" placeholder="Mi número (opcional)" name="telephone" id="telephone_input">
        </div>
        <div class="message">
            <textarea name="message" placeholder="Mi consulta/duda es..." id="message_input" cols="30" rows="5" required></textarea>
        </div>
        <div class="contact_pref">
            <select class="my-4" name="contact_preference" id="contact_pref_input">
                <option disabled selected hidden>Prefiero ser contactado por...</option>
                <option>Email</option>
                <option>WhatsApp</option>
                <option>Llamada</option>
            </select>
        </div>
        <div class="submit">
            <input class="alert-button" type="submit" value="Enviar mensaje" id="form_button" />
        </div>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/contacto.js') ?>"></script>
<?= $this->endSection() ?>
