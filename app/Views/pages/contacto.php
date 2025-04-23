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
    <div id="form_alert" class="alert d-none mt-3" role="alert"></div>

    <?= view('layouts/footer/footer') ?>

    <script>
    document.getElementById("contact_form").addEventListener("submit", function(e) {
        e.preventDefault();

        const data = {
            name: document.getElementById("name_input").value,
            email: document.getElementById("email_input").value,
            telephone: document.getElementById("telephone_input").value,
            message: document.getElementById("message_input").value,
            contact_preference: document.getElementById("contact_pref_input").value
        };

        fetch("https://script.google.com/macros/s/AKfycbygjuTHXpljWPHAe8bcCrvCXLo_IUX7x-Ws045pnarHEBVayA-ECrfohv_PeOWqQE47Ng/exec", {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(res => res.json())
        .then(response => {
            mostrarAlerta("¡Mensaje enviado con éxito!", "success");
            document.getElementById("contact_form").reset();
        })
        .catch(err => {
            mostrarAlerta("Ocurrió un error al enviar el mensaje. Por favor, intentá nuevamente.", "danger");
            console.error(err);
        });
    });

    function mostrarAlerta(mensaje, tipo) {
        const alertBox = document.getElementById("form_alert");
        alertBox.textContent = mensaje;
        alertBox.className = `alert alert-${tipo} mt-3`;
    }
</script>


</body>
</html>
