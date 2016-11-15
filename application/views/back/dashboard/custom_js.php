<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Rupiah');

      data.addRows([

<?php 
$lastday = date('t');
    $isi=0;
    for ($i=0; $i <= $lastday; $i++) { 

      foreach ($widget['arr_grafik_month'] as $grafik) {
        if ($grafik->day == $i) {
          echo "[".$i.",".$grafik->total_bayar."],";
          $isi =1;
        }
      }
      if ($isi==0) {
        echo "[".$i.",0],"; 
      }else{
        $isi=0;
      }
    }
 ?>  
      ]);

      var options = {
        hAxis: {
          title: 'Tanggal'
        },
        vAxis: {
          title: 'Jumlah'
        }
      };

      // var year = new google.visualization.LineChart(document.getElementById('chart_year'));
      var month = new google.visualization.LineChart(document.getElementById('chart_month'));

      // year.draw(data, options);
      month.draw(data, options);

    }
</script>
 