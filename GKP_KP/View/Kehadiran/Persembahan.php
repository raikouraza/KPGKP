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
$sql = "SELECT kehadiran_Tanggal, kehadiran_Jumlah_Persembahan FROM tbkehadiran ";
$result = mysqli_query($mysqli, $sql);
//loop through the returned data
while ($row = mysqli_fetch_array($result)) {
    $data1 = $data1 . '"'. $row['kehadiran_Tanggal'].'",';
    $data2 = $data2 . '"'. $row['kehadiran_Jumlah_Persembahan'] .'",';
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
            border: #555652 1px solid;
            padding: 10px;
        }

        h1 {
            color: black;
        }
    </style>
    <!––untuk bootstrap start––>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!––untuk bootstrap end––>
    <!––untuk chartjs start––>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <!––untuk chartjs end––>
    <!--data tables-->
    <script type="text/javascript" src="../../jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../datatables/datatables.js"></script>
    <link rel="stylesheet" type="text/css" href="../../datatables/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.js"/>
    <!--data tables end-->
    <!--Untuk download chart as image-->
    <script src="../../js/canvas-toBlob.js"></script>
    <script src="../../js/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
    <title></title>
</head>
<body>
<div class="jumbotron text-center">
    <h1> Data Jumlah Persembahan GKP </h1>
    <p></p>
</div>
<div class="row">
    <div class="col-sm-3"><!--kosong--></div>
    <div class="col-sm-6">
            <h1>Jumlah Persembahan</h1>
            <canvas id="chart" style="width: 100%; height: 65vh; background: #ffffff; border: 1px solid #555652; margin-top: 10px;"></canvas>
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
                                    borderColor:'rgb(0,37,255)',
                                    backgroundColor: 'rgb(38,133,255)',
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
        <script>
            function download() {
                if (!isChartRendered) return; // return if chart not rendered
                html2canvas(document.getElementById('chart'), {
                    onrendered: function(canvas) {
                        var link = document.createElement('a');
                        link.href = canvas.toDataURL('image/jpeg');
                        link.download = 'myChart.jpeg';
                        link.click();
                    }
                })
            }
        </script>
            <div class="col-sm-3">
                <button id="save-btn" name="save-btn" onclick="download()" class="btn btn-primary">Export to PNG</button>
                <button id="save-btn2" name="save-btn" onclick="download()" class="btn btn-primary">Export to jpg</button>
            </div>
    </div>
</div>
    <div class="row">
        <div class="col-sm-3"><!--kosong--></div>
        <div class="col-sm-6">
            <h1>Tabel Jumlah Persembahan</h1>
            <table id="myTable" class="display">
                <thead>
                <tr>
                    <th>Tanggal Kehadiran</th>
                    <th>Jumlah Persembahan</th>
                    <!--                <th>Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\DAO\KehadiranDaoImpl.php';
                include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\PDOUtility.php';
                $kehadiranDao = new KehadiranDaoImpl();
                $kehadirans = $kehadiranDao->getAllKehadiran();
                /* @var $kehadiran Kehadiran */
                foreach($kehadirans as $value){
                    echo '<tr>';
                    echo '<td>'.$value->kehadiran_Tanggal .'</td>';
                    echo '<td>'.$value->kehadiran_Jumlah_Persembahan .'</td>';
//                echo '<td><button onclick="deleteKehadiran(\'' .$kehadiran['Kehadiran_Id']. '\');">Delete</button><button onclick="updateKehadiran(' . $kehadiran['Kehadiran_Id'] .')">Update</button></td>';
//                echo'</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<!--export graph to png -->
<script>
    $("#save-btn").click(function () {
        $("#chart").get(0).toBlob(function (blob) {
            saveAs(blob, "chartPersembahan.png")
        })
    })
</script>
<!--export graph to jpg-->
<script>
    $("#save-btn2").click(function () {
        $("#chart").get(0).toBlob(function (blob) {
            saveAs(blob, "chartPersembahan.jpg")
        })
    })
</script>
</html>