<?= $this->extend('layouts/layoutBase') ?>

<?php $noHero = true;
$noEditorsChoice = true; ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/contacto.css') ?>">
<?= load_alert_assets() ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="container" class="p-4">
    <h1>• Sigamos en contacto •</h1>
    <div class="underline"></div>
    <div class="icon_wrapper">
        <img class="icon" src="<?= base_url('assets/img/iconoContacto.png') ?>" alt="Ícono contacto">
    </div>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger"><?= implode('<br>', session()->getFlashdata('errors')) ?></div>
    <?php endif; ?>
    <form action="<?= base_url('contact/submit') ?>" method="post" id="contact_form">
        <div class="text">
            <input type="text" placeholder="Mi nombre es" name="nombre" id="name_input" value="<?= set_value('nombre') ?>" required>
        </div>
        <div class="email">
            <input type="email" placeholder="Mi e-mail es" name="email" id="email_input" value="<?= set_value('email') ?>" required>
        </div>
        <div class="telephone">
            <input type="text" placeholder="Mi número (opcional)" name="telephone" id="telephone_input" value="<?= set_value('telephone') ?>">
        </div>
        <div class="message">
            <textarea name="message" placeholder="Mi consulta/duda es..." id="message_input" cols="30" rows="5" required><?= set_value('message') ?></textarea>
        </div>
        <div class="contact_pref">
            <select class="my-4" name="contact_preference" id="contact_pref_input" required>
                <option value="" disabled selected hidden>Prefiero ser contactado por...</option>
                <option value="Email" <?= set_select('contact_preference', 'Email') ?>>Email</option>
                <option value="WhatsApp" <?= set_select('contact_preference', 'WhatsApp') ?>>WhatsApp</option>
                <option value="Llamada" <?= set_select('contact_preference', 'Llamada') ?>>Llamada</option>
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