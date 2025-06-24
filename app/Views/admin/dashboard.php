<?= $this->extend('layouts/layoutAdmin') ?>

<?= $this->section('content') ?>

<div class="dashboard-wrapper">

  <h1>Panel de Administración</h1>

  <section class="stats">
    <p><strong>👥 Total de usuarios:</strong> <?= $totalUsuarios ?></p>
    <p><strong>📦 Órdenes entregadas:</strong> <?= $totalVentas ?></p>
  </section>

  <hr>

  <h2>📊 Ventas por mes</h2>
  <canvas id="graficoVentas" height="200"></canvas>

  <h2>👥 Usuarios activos vs inactivos</h2>
  <canvas id="graficoUsuarios" height="200"></canvas>

  <h2>🧭 Estado del stock</h2>
  <canvas id="graficoStock" height="200"></canvas>

  <h2>🍃 Gráfico: Todos los productos en stock</h2>
  <canvas id="graficoTodosProductosStock" height="200"></canvas>

  <h2>🔥 Productos más vendidos (lista)</h2>
  <ul>
    <?php foreach ($productosTop as $prod): ?>
      <li><?= esc($prod['nombre']) ?> — <?= $prod['total_vendido'] ?> unidades</li>
    <?php endforeach; ?>
  </ul>

  <h2>📊 Gráfico: Productos más vendidos</h2>
  <canvas id="graficoProductos" height="200"></canvas>

  <h2>📋 Últimas órdenes</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Total</th>
        <th>Estado</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ordenesRecientes as $orden): ?>
        <tr>
          <td><?= $orden['id'] ?></td>
          <td>$<?= number_format($orden['total'], 2, ',', '.') ?></td>
          <td><?= esc(ucfirst($orden['estado'])) ?></td>
          <td><?= date('d/m/Y H:i', strtotime($orden['fecha_creacion'])) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Ventas por mes
  new Chart(document.getElementById('graficoVentas').getContext('2d'), {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_map(fn($v) => 'Mes ' . $v['mes'], $ventasPorMes)) ?>,
      datasets: [{
        label: 'Total de ventas ($)',
        data: <?= json_encode(array_map(fn($v) => (float)$v['total'], $ventasPorMes)) ?>,
        backgroundColor: 'rgba(75, 192, 192, 0.6)'
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  // Usuarios activos/inactivos
  new Chart(document.getElementById('graficoUsuarios').getContext('2d'), {
    type: 'doughnut',
    data: {
      labels: ['Activos', 'Inactivos'],
      datasets: [{
        data: [<?= $usuariosActivos ?>, <?= $usuariosInactivos ?>],
        backgroundColor: ['#4caf50', '#f44336']
      }]
    }
  });

  // Estado del stock
  new Chart(document.getElementById('graficoStock').getContext('2d'), {
    type: 'pie',
    data: {
      labels: <?= json_encode(array_column($stockEstados, 'estado')) ?>,
      datasets: [{
        data: <?= json_encode(array_column($stockEstados, 'cantidad')) ?>,
        backgroundColor: ['#2196f3', '#ff9800']
      }]
    }
  });

  // NUEVO: Productos más vendidos gráfico de barras
  new Chart(document.getElementById('graficoProductos').getContext('2d'), {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_map(fn($p) => $p['nombre'], $productosTop)) ?>,
      datasets: [{
        label: 'Unidades vendidas',
        data: <?= json_encode(array_map(fn($p) => (int)$p['total_vendido'], $productosTop)) ?>,
        backgroundColor: 'rgba(255, 159, 64, 0.7)'
      }]
    },
    options: {
      responsive: true,
      indexAxis: 'y', // horizontal bars, opcional
      scales: {
        x: { beginAtZero: true }
      }
    }
  });
  // Gráfico de todos los productos en stock
  new Chart(document.getElementById('graficoTodosProductosStock').getContext('2d'), {
    type: 'doughnut',
    data: {
      labels: <?= json_encode(array_map(fn($p) => $p['nombre'], $productosStock)) ?>,
      datasets: [{
        label: 'Cantidad en stock',
        data: <?= json_encode(array_map(fn($p) => (int)$p['stock'], $productosStock)) ?>,
        backgroundColor: [
          '#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#9966ff',
          '#ff9f40', '#66ff66', '#ff6666', '#6699ff', '#cc66ff',
          '#00bcd4', '#8bc34a', '#ffc107', '#e91e63', '#9c27b0'
        ]
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'right',
          labels: {
            boxWidth: 15,
            padding: 10
          }
        },
        tooltip: {
          callbacks: {
            label: ctx => `${ctx.label}: ${ctx.parsed} unidades`
          }
        }
      }
    }
  });

</script>
<?= $this->endSection() ?>
