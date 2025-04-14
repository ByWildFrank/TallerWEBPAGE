<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <style>
    <?php include 'principal.css';?>
    </style>
    

</head>

<body>
    <?= view('layouts/navBar/navBar') ?>
    <?= view('layouts/hero/hero') ?>
    
    <div class="ilustacion1">
        <img src="https://images.unsplash.com/photo-1626862025982-ae5dacfdeff6?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        style="max-width: 100%; height: auto;">
    </div>

    <div class="general-container">
        <div class="text-container">
            <p>En BEAN creemos que el café es más que una bebida.</p>
            <p>Es un placer cotidiano, un mimo al alma.</p>
            <p>Prepararlo no es solo rutina, es un ritual que nos conecta, nos renueva.</p>
            <p>Cada taza guarda un instante de pausa, aroma y propósito.</p>
            <p>Porque lo especial no es solo el café…</p>
            <p>Es el momento que te regalás.</p>
            <p>BEAN. Café de especialidad, para rituales con sentido.</p>
        </div>

        <div class="ilustracion2">
            <img src="https://img.freepik.com/foto-gratis/taza-cafe-espuma-leche-cacao-polvo-sobre-fondo-gris_23-2147898351.jpg?t=st=1744606372~exp=1744609972~hmac=6c57a5c5c825d091df520a53a5772173ab97e59a48b21e12c3c74e3fb4ab6188&w=826" 
            style="max-width: 100%; height: auto;">
        </div>
    </div>

    <?= view('layouts/footer/footer') ?>
    <script src="/PROYECTO-FRANCO-VARELA/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
