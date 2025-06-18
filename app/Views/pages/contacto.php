<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN - Contacto</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <style>
        <?php include 'contacto.css'; ?>
    </style>
    <?= load_alert_assets() ?>
</head>

<body>

    <?= view('layouts/navBar/navBar') ?>
    <?= show_alert('Work in progress', 'Funcionalidad en contrucción!', 'warning', 'Entendido') ?>


    <div id="container" class="p-4">
        <h1>&bull; Sigamos en contacto &bull;</h1>
        <div class="underline"></div>
        <div class="icon_wrapper">
            <img class="icon" src="./assets/img/iconoContacto.png" alt="Ícono contacto"></img>
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

    <?= view('layouts/footer/footer') ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>