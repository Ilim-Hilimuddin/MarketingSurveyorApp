<?= $this->extend('layouts/templates/default'); ?>
<?= $this->section('content'); ?>
<?php
// Simpan data dari session
$user = session()->get('user');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <h4 class="mb-3">Selamat Datang, <span class="text-primary text-uppercase"><?= $user['nama_lengkap']; ?></span></h4>
    <div class="row">
      <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Donut Chart</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <figure class="highcharts-figure">
              <div id="donutChart"></div>
            </figure>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<style>
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 320px;
    max-width: 660px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const surveyData = <?php echo json_encode($transaksi); ?>;
    let totalData = 0;
    const chartData = surveyData.map(item => {
      const y = parseInt(item.total);
      totalData += y;
      return {
        name: item.nama_lokasi,
        y: y
      };
    });

    // Mendapatkan nama bulan saat ini
    const monthNames = [
      "Januari", "Februari", "Maret", "April", "Mei", "Juni",
      "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    const currentDate = new Date();
    const currentMonth = monthNames[currentDate.getMonth()];

    Highcharts.chart('donutChart', {
      chart: {
        type: 'pie',
        events: {
          render() {
            const chart = this;
            const series = chart.series[0];
            let customLabel = chart.options.chart.customLabel;
            if (!customLabel) {
              customLabel = chart.options.chart.customLabel = chart.renderer.label(
                'Total<br/>' + '<strong>' + totalData + '</strong>'
              ).css({
                color: '#000',
                textAnchor: 'middle'
              }).add();
            }
            const x = series.center[0] + chart.plotLeft;
            const y = series.center[1] + chart.plotTop - (customLabel.attr('height') / 2);
            customLabel.attr({
              x,
              y
            });
            customLabel.css({
              fontSize: `${series.center[2] / 12}px`
            });
          }
        }
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      title: {
        text: 'LOKASI YANG SERING DISURVEY SELAMA BULAN ' + currentMonth.toUpperCase()
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
      },
      legend: {
        enabled: false
      },
      plotOptions: {
        pie: {
          innerSize: '50%',
          depth: 45,
          dataLabels: {
            enabled: true,
            distance: -50,
            format: '{point.percentage:.0f}%'
          }
        }
      },
      series: [{
        name: 'Surveys',
        data: chartData
      }]
    });
  });
</script>
<?= $this->endSection(); ?>