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

  <style>
    <?php include 'terminosCondiciones.css'; ?>
  </style>
</head>

<body>

  <?= view('layouts/navBar/navBar') ?>

  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Términos y Condiciones</h2>
      <div class="masonry">

        <div class="card">
          <div class="icon-title">
            <i class="bi bi-globe-americas fs-3"></i>
            <h5 class="fw-bold">1. Objeto y Alcance</h5>
          </div>
          <p><strong>BEAN S.R.L.</strong>, con domicilio en Córdoba, República Argentina, es una empresa dedicada a la adquisición, procesamiento, importación y comercialización de cafés de especialidad procedentes de los principales países productores del mundo (Colombia, Brasil, Etiopía, Kenia, Guatemala, etc.)</p>
        </div>

        <div class="card tall">
          <div class="icon-title">
            <i class="bi bi-currency-exchange fs-3"></i>
            <h5 class="fw-bold">2. Productos, Precios y Forma de Pago</h5>
          </div>
          <p><strong>2.1 Productos:</strong> BEAN garantiza que todos los cafés vendidos cumplen estándares de especialidad (puntaje ≥ 85 SCA), debidamente certificados por sus fincas de origen.<br><br>
            <strong>2.2 Precios:</strong> se expresan en Pesos Argentinos (ARS) e incluyen IVA. BEAN se reserva el derecho de modificar tarifas por variaciones de mercado o costos de importación; los cambios aplican solo a pedidos futuros.<br><br>
            <strong>2.3 Pago:</strong> se aceptan tarjeta de crédito, débito y transferencia bancaria. El cargo se efectiviza al confirmar el pedido. BEAN podrá requerir validación adicional para prevenir fraudes.
          </p>
        </div>

        <div class="card">
          <div class="icon-title">
            <i class="bi bi-shield-lock fs-3"></i>
            <h5 class="fw-bold">3. Propiedad Intelectual</h5>
          </div>
          <p>Todo el contenido de la Plataforma (textos, imágenes, marcas, diseños, código) es titularidad de <strong>BEAN S.R.L.</strong> Queda prohibida su reproducción o distribución sin autorización expresa.</p>
        </div>

        <div class="card">
          <div class="icon-title">
            <i class="bi bi-person-badge fs-3"></i>
            <h5 class="fw-bold">4. Protección de Datos</h5>
          </div>
          <p>Aplicamos estándares altos de seguridad. Tus datos no serán cedidos a terceros. Se usan exclusivamente para gestionar pedidos y atención al cliente. El cliente puede ejercer sus derechos <strong>ARCO</strong> (Acceso, Rectificación, Cancelación, Oposición) escribiendo a <strong>contacto@bean.com</strong>.</p>
        </div>

        <div class="card tall">
          <div class="icon-title">
            <i class="bi bi-arrow-counterclockwise fs-3"></i>
            <h5 class="fw-bold">5. Devoluciones y Garantías</h5>
          </div>
          <p><strong>5.1 Devoluciones:</strong> el cliente podrá solicitarla dentro de los 5 días hábiles posteriores a la entrega, siempre que el producto se encuentre en su empaque original y sin signos de uso.<br><br>
            <strong>5.2 Reembolsos:</strong> si procede la devolución, BEAN acreditará el importe por la misma vía de pago en un plazo máximo de 10 días hábiles desde la recepción del producto devuelto.<br><br>
            <strong>5.3 Garantía:</strong> BEAN garantiza la calidad del café conforme a estándares SCA. No cubre reclamos por preferencias subjetivas de sabor.
          </p>
        </div>

        <div class="card">
          <div class="icon-title">
            <i class="bi bi-exclamation-diamond fs-3"></i>
            <h5 class="fw-bold">6. Limitación de Responsabilidad</h5>
          </div>
          <p>BEAN provee sus servicios "tal cual" y no garantiza continuidad ininterrumpida. <strong>No será responsable</strong> de daños indirectos, lucro cesante o pérdida de datos derivados del uso de la Plataforma o de la compra de productos.
          </p>
        </div>

        <div class="card">
          <div class="icon-title">
            <i class="bi bi-pencil-square fs-3"></i>
            <h5 class="fw-bold">7. Modificaciones</h5>
          </div>
          <p>BEAN podrá actualizar estos Términos en cualquier momento. Las modificaciones se publicarán con nueva fecha de actualización. El uso continuado de la Plataforma implica la <strong>aceptación de los cambios</strong>.
          </p>
        </div>

      </div>
    </div>
  </section>


  <?= view('layouts/footer/footer') ?>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>