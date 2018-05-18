<?php 

require_once("config.php");

$sql = new Sql();

$results = $sql->select("SELECT * FROM tabela_arduino_final WHERE tempo >= DATE_SUB(NOW(), INTERVAL 2 HOUR)");

$countArrayLength = count($results);

?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Tempo');
    data.addColumn('number', 'Potencia');

    data.addRows([

    <?php
    for($i=0;$i<$countArrayLength;$i++){
        echo "['" . $results[$i]['tempo'] . "'," . $results[$i]['potencia'] . "],";
    } 
?>
    ]);

    var options = {
        chart: {
          title: 'Potência (W)',
          subtitle: 'W'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'down'}
          }
        }
      };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    chart.draw(data, options);
}
</script>

<div class="grid-container"> 
<div class="grid-100 grid-parent">
    <div id="curve_chart" style="width: 100%; height: auto"></div>
</div>   

</div>
