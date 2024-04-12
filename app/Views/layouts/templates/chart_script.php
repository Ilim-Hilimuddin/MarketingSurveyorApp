 <!-- jQuery -->
 <script src="/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="/plugins/chart.js/Chart.min.js"></script>
 <!-- <script src="<?= base_url() ?>/dist/js/demo.js"></script> -->
 <script>
   $(function() {

     var areaChartData = {
       labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
       datasets: [{
           label: 'Digital Goods',
           backgroundColor: 'rgba(60,141,188,0.9)',
           borderColor: 'rgba(60,141,188,0.8)',
           pointRadius: false,
           pointColor: '#3b8bba',
           pointStrokeColor: 'rgba(60,141,188,1)',
           pointHighlightFill: '#fff',
           pointHighlightStroke: 'rgba(60,141,188,1)',
           data: [28, 48, 40, 19, 86, 27, 90]
         },
         {
           label: 'Electronics',
           backgroundColor: 'rgba(210, 214, 222, 1)',
           borderColor: 'rgba(210, 214, 222, 1)',
           pointRadius: false,
           pointColor: 'rgba(210, 214, 222, 1)',
           pointStrokeColor: '#c1c7d1',
           pointHighlightFill: '#fff',
           pointHighlightStroke: 'rgba(220,220,220,1)',
           data: [65, 59, 80, 81, 56, 55, 40]
         },
       ]
     }
     //-------------
     //- DONUT CHART -
     //-------------
     // Get context with jQuery - using jQuery's .get() method.
     var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
     var donutData = {
       labels: [
         'Chrome',
         'IE',
         'FireFox',
         'Safari',
         'Opera',
         'Navigator',
       ],
       datasets: [{
         data: [700, 500, 400, 600, 300, 100],
         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
       }]
     }
     var donutOptions = {
       maintainAspectRatio: false,
       responsive: true,
     }
     //Create pie or douhnut chart
     // You can switch between pie and douhnut using the method below.
     new Chart(donutChartCanvas, {
       type: 'doughnut',
       data: donutData,
       options: donutOptions
     })

     //-------------
     //- BAR CHART -
     //-------------
     var barChartCanvas = $('#barChart').get(0).getContext('2d')
     var barChartData = $.extend(true, {}, areaChartData)
     var temp0 = areaChartData.datasets[0]
     var temp1 = areaChartData.datasets[1]
     barChartData.datasets[0] = temp1
     barChartData.datasets[1] = temp0

     var barChartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       datasetFill: false
     }

     new Chart(barChartCanvas, {
       type: 'bar',
       data: barChartData,
       options: barChartOptions
     })

   })
 </script>