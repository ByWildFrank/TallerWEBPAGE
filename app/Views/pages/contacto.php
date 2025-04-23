<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <style><?php include 'contacto.css';?></style>
</head>
<body>    

    <?= view('layouts/navBar/navBar') ?>
    
    <div id="container">
        <h1>&bull; Sigamos en contacto &bull;</h1>
        <div class="underline"></div>
        <div class="icon_wrapper">
            <img class="icon" src="../public/iconoContacto.png" alt="Ícono de contacto"></img>
        </div>
        <form action="#" method="post" id="contact_form">
            <div class="name">
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
            <div class="submit">
                <input type="submit" value="Enviar mensaje" id="form_button" />
            </div>
            <div class="contact_pref">
                <select class="m-3" name="contact_preference" id="contact_pref_input">
                    <option disabled selected hidden>Prefiero ser contactado por...</option>
                    <option>Email</option>
                    <option>WhatsApp</option>
                    <option>Llamada</option>
                </select>
            </div>
        </form>
    </div><!-- // End #container -->

    <?= view('layouts/footer/footer') ?>

</body>
</html>
