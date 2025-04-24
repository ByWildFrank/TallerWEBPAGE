<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEAN - Términos y condicines</title>
    <link rel="stylesheet" href="/PROYECTO-FRANCO-VARELA/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style><?php include 'terminosCondiciones.css';?></style>
</head>
<body>    

    <?= view('layouts/navBar/navBar') ?>
    
    <section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Términos y Condiciones</h2>
    <div class="masonry">

      <div class="card ">
        <h5 class="fw-bold">Objeto y Alcance <i class="bi bi-globe-americas fs-3 mb-2"></i></h5>
        <p> BEAN S.R.L., con domicilio en Córdoba, República Argentina, es una empresa dedicada a la adquisición, procesamiento, importación y comercialización de cafés de especialidad procedentes de los principales países productores del mundo (Colombia, Brasil, Etiopía, Kenia, Guatemala, etc.)</p>
      </div>

      <div class="card tall">
        <h5><i class="bi bi-currency-exchange fs-3 mb-2"></i>2. Productos, precios y forma de pago</h5>
        <p>2.1 Productos: BEAN garantiza que todos los cafés vendidos cumplen estándares de especialidad (puntaje ≥ 85 SCA), debidamente certificados por sus fincas de origen.
        2.2 Precios: se expresan en Pesos Argentinos (ARS) e incluyen IVA. BEAN se reserva el derecho de modificar tarifas por variaciones de mercado o costos de importación; los cambios aplican solo a pedidos futuros.
        2.3 Pago: se aceptan tarjeta de crédito, débito y transferencia bancaria. El cargo se efectiviza al confirmar el pedido. BEAN podrá requerir validación adicional para prevenir fraudes.</p>
      </div>

      <div class="card ">
        <h5><i class="bi bi-shield-lock fs-3 mb-2"></i>Propiedad intelectual</h5>
        <p>Todo el contenido de la Plataforma (textos, imágenes, marcas, diseños, código) es titularidad de BEAN S.R.L. Queda prohibida su reproducción o distribución sin autorización expresa.
        </p>
      </div>

      <div class="card ">
        <h5><i class="bi bi-person-badge fs-3 mb-2"></i> Protección de Datos</h5>
        <p>Aplicamos estándares altos de seguridad. Tus datos no serán cedidos a terceros. Se usan exclusivamente para gestionar pedidos y atención al cliente. El cliente puede ejercer sus derechos ARCO (Acceso, Rectificación, Cancelación, Oposición) escribiendo a contacto@bean.com.</p>
      </div>

      <div class="card tall">
      <h5>Devoluciones y garantías<i class="bi bi-arrow-counterclockwise fs-3 mb-2"></i></h5>
      <p>4.1 Devoluciones: el cliente podrá solicitarla dentro de los 5 días hábiles posteriores a la entrega, siempre que el producto se encuentre en su empaque original y sin signos de uso.
      4.2 Reembolsos: si procede la devolución, BEAN acreditará el importe por la misma vía de pago en un plazo máximo de 10 días hábiles desde la recepción del producto devuelto.
      4.3 Garantía: BEAN garantiza la calidad del café conforme a estándares SCA. No cubre reclamos por preferencias subjetivas de sabor.
      </p>
    </div>

      <div class="card">
        <h5><i class="bi bi-exclamation-diamond fs-3 mb-2"></i>7. Limitación de responsabilidad</h5>
        <p>BEAN provee sus servicios “tal cual” y no garantiza continuidad ininterrumpida. No será responsable de daños indirectos, lucro cesante o pérdida de datos derivados del uso de la Plataforma o de la compra de productos.
        </p>
      </div>
      
      <div class="card">
        <h5><i class="bi bi-pencil-square fs-3 mb-2"></i>9. Modificaciones</h5>
        <p>BEAN podrá actualizar estos Términos en cualquier momento. Las modificaciones se publicarán con nueva fecha de actualización. El uso continuado de la Plataforma implica la aceptación de los cambios.
        </p>
      </div>

    </div>
  </div>
</section>
    
    <?= view('layouts/footer/footer') ?>

</body>
</html>
