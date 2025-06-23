<?= $this->extend('layouts/layoutBase') ?>

<?php $noHero = true; $noEditorsChoice = true; ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/contacto.css') ?>">
<?= load_alert_assets() ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="container" class="p-4">
    <h1>• Envíanos tu consulta •</h1>
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
            <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
        </div>
        <div class="email">
            <p><strong>Email:</strong> <?= esc($usuario['email']) ?></p>
        </div>
        <div class="telephone">
            <?php if (!empty($usuario['telefono'])): ?>
                <p><strong>Teléfono:</strong> <?= esc($usuario['telefono']) ?></p>
            <?php endif; ?>
            <!-- Campos ocultos para enviar datos -->
            <input type="hidden" name="nombre" value="<?= esc($usuario['nombre'] ?? '') ?>">
            <input type="hidden" name="email" value="<?= esc($usuario['email'] ?? '') ?>">
            <?php if (!empty($usuario['telefono'])): ?>
                <input type="hidden" name="telephone" value="<?= esc($usuario['telefono'] ?? '') ?>">
            <?php endif; ?>
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