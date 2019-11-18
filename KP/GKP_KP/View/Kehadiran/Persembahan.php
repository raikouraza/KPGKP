<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dbgkp';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$data1 = '';
$data2 = '';

//query to get data from the table
$sql = "SELECT Kehadiran_Tanggal, Kehadiran_Jumlah_Persembahan FROM tbkehadiran ";
$result = mysqli_query($mysqli, $sql);
//loop through the returned data
while ($row = mysqli_fetch_array($result)) {
    $data1 = $data1 . '"'. $row['Kehadiran_Tanggal'].'",';
    $data2 = $data2 . '"'. $row['Kehadiran_Jumlah_Persembahan'] .'",';

}

$data1 = trim($data1,",");
$data2 = trim($data2,",");

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <title>Database GKP Jumlah Kehadiran Pria / Wanita</title>

    <style type="text/css">
        body{
            font-family: Arial;
            margin: 80px 100px 10px 100px;
            padding: 0;
            color: black;
            text-align: center;
            background: #ffffff;
        }

        .container {
            color: #ffffff;
            background: #ffffff;
            border: #555652 3px solid;
            padding: 10px;
        }

        h1 {
            color: black;
        }

    </style>

</head>

<body>
<div class="container">
    <h1>Jumlah Persembahan</h1>
    <canvas id="chart" style="width: 100%; height: 65vh; background: #ffffff; border: 3px solid #555652; margin-top: 10px;"></canvas>
    <script>
        var ctx = document.getElementById("chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo $data1; ?>],
                datasets:
                    [
                        {
                            label: 'Jumlah Persembahan',
                            data: [<?php echo $data2; ?>],
                            backgroundColor: 'transparent',
                            borderColor:'rgba(0,255,255)',
                            borderWidth: 3
                        }
                    ]
            },
            options: {
                scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                tooltips:{mode: 'index'},
                legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0,0,0)', fontSize: 16}}
            }
        });
    </script>
</div>
</body>
</html>