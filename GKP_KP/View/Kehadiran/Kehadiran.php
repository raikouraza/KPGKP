<?php

/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dbgkp';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
//utk storing data yang akan di echo
$data1 = '';
$data2 = '';
$data3 = '';
$data4 = '';
$data5 = $_POST["dateawal"];
$data6 = $_POST["dateakhir"];


//query to get data from the table
if(!empty($data5)){
    $sql = "SELECT Kehadiran_Jumlah_Pria, Kehadiran_Jumlah_Wanita, (Kehadiran_Jumlah_Pria+Kehadiran_Jumlah_Wanita) as Jumlah_Peserta,Kehadiran_Tanggal FROM tbkehadiran WHERE Kehadiran_Tanggal BETWEEN '$data5' AND '$data6'";
}else{
    $sql = "SELECT Kehadiran_Jumlah_Pria, Kehadiran_Jumlah_Wanita, (Kehadiran_Jumlah_Pria+Kehadiran_Jumlah_Wanita) as Jumlah_Peserta,Kehadiran_Tanggal FROM tbkehadiran LIMIT 10";
}
$result = mysqli_query($mysqli, $sql);
//loop through the returned data
while ($row = mysqli_fetch_array($result)) {
    //variabel di isi dengan data dari database
    $data1 = $data1 . '"'. $row['Kehadiran_Jumlah_Pria'].'",';
    $data2 = $data2 . '"'. $row['Kehadiran_Jumlah_Wanita'] .'",';
    $data3 = $data3 . '"'. $row['Jumlah_Peserta'] .'",';
    $data4 = $data4 . '"'. $row['Kehadiran_Tanggal'] .'",';
}
$data1 = trim($data1,",");
$data2 = trim($data2,",");
$data3 = trim($data3,",");
$data4 = trim($data4,",");

//convert graph to png
?>
<!DOCTYPE html>
<html>
<head>
<!--    untuk css     -->
    <link rel="stylesheet" type="text/css" href="css_Kehadiran.css" />
<!--    <!––untuk bootstrap start––>-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<!--    <!––untuk bootstrap end––>-->
<!--    <!––untuk chartjs start––>-->
    <script type="text/javascript" src="https://cdn.rawgit.com/eligrey/canvas-toBlob.js/master/canvas-toBlob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" ></script>
<!--    <!––untuk chartjs end––>-->
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

<!--    <script>-->
<!--        $("save-btn").click(function () {-->
<!--            $("#canvas".get(myChart).toBlob(function (blob) {-->
<!--                saveAs(blob,"chart_kehadiran.png")-->
<!--            }));-->
<!--        });-->
<!--    </script>-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="jumbotron text-center">
    <h1> Data Kehadiran Pria dan Wanita GKP </h1>
    <p></p>
</div>
<!--Untuk Generate ChartJS-->
<div class="row">
    <div class="col-sm-3"><!--kosong-->></div>
    <div class="col-sm-6">
        <h1 align="center">Jumlah Kehadiran Pria dan Wanita</h1>
        <canvas id="chart" style="width: 100%; height: 65vh; background: #ffffff; border: 1px solid #555652; margin-top: 10px;"></canvas>

        <script>
            var ctx = document.getElementById("chart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php echo $data4; ?>],
                    datasets:
                        [{
                            label: 'Jumlah Pria',
                            data: [<?php  if (isset($_POST['CheckboxPria'])){echo $data1; }?>],
                            backgroundColor: 'rgb(38,133,255)',
                            borderColor:'rgb(0,37,255)',
                            borderWidth: 3
                        },
                            {
                                label: 'Jumlah Wanita',
                                data: [<?php if(isset($_POST['CheckboxWanita'])){echo $data2; }?>],
                                backgroundColor: 'rgb(238,68,47)',
                                borderColor:'rgb(183,0,0)',
                                borderWidth: 3
                            },
                            {
                                label: 'Jumlah Kehadiran',
                                data: [<?php if (isset($_POST['CheckboxTotal'])){echo $data3;} ?>],
                                backgroundColor: 'rgb(194,107,142)',
                                borderColor:'rgb(56,33,41)',
                                borderWidth: 3
                            },
                        ]
                },
                options: {
                    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                    tooltips:{mode: 'index'},
                    legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0,0,0)', fontSize: 16}
                    }
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
    </div>
    <div class="col-sm-3">
        <button id="save-btn" name="save-btn" onclick="download()">Export to PNG</button>
        <button id="save-btn2" name="save-btn" onclick="download()">Export to jpg</button>
<!--        button here-->
    </div>
</div>
<!--Untuk Generate ChartJS End-->
<!--Untuk Generate Table Start-->
<div class="row">
    <div class="col-sm-3"><!--kosong-->></div>
    <div class="col-sm-6">
        <h1>Tabel Jumlah Kehadiran Pria dan Wanita</h1>
        <table id="myTable" class="display">
            <thead>
            <tr>
                <th>Jumlah Kehadiran Wanita</th>
                <th>Jumlah Kehadiran Pria</th>
                <th>Jumlah Kehadiran Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
                include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\DAO\KehadiranDaoImpl.php';
                include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\PDOUtility.php';
                $kehadiranDao = new KehadiranDaoImpl();
                $kehadirans = $kehadiranDao->getAllKehadiran();
                /* @var $kehadiran Kehadiran */
                foreach($kehadirans as $kehadiran){
                    $total = ($kehadiran['Kehadiran_Jumlah_Wanita'] + $kehadiran['Kehadiran_Jumlah_Pria']);
                    echo '<tr>';
                    echo '<td>'.$kehadiran['Kehadiran_Jumlah_Wanita'] .'</td>';
                    echo '<td>'.$kehadiran['Kehadiran_Jumlah_Pria'] .'</td>';
                    echo '<td>'.$total .'</td>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-3">

    </div>
</div>
</body>
<!--untuk data table-->
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<!--export graph to png -->
<script>
    $("#save-btn").click(function () {
        $("#chart").get(0).toBlob(function (blob) {
            saveAs(blob, "chartKehadiran.png")
        })
    })
</script>
<!--export graph to jpg-->
<script>
    $("#save-btn2").click(function () {
        $("#chart").get(0).toBlob(function (blob) {
            saveAs(blob, "chartKehadiran.jpg")
        })
    })
</script>
</html>