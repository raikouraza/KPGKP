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
//query to get data from the table
$sql = "SELECT Kehadiran_Jumlah_Pria, Kehadiran_Jumlah_Wanita, (Kehadiran_Jumlah_Pria+Kehadiran_Jumlah_Wanita) as Jumlah_Peserta,Kehadiran_Tanggal FROM tbkehadiran LIMIT 10";
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
?>
<!DOCTYPE html>
<html>
<head>

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
    <title></title>

    <style type="text/css">
        body{
            font-family: Arial;
            margin: 80px 100px 10px 100px;
            padding: 0;
            color: white;
            text-align: center;
            background: #ffffff;
        }
        .container {
            color: #E8E9EB;
            background: #ffffff;
            border: #ffffff 3px solid;
            padding: 10px;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1> Data Kehadiran Pria dan Wanita GKP </h1>
    <p></p>
</div>
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
                            data: [<?php echo $data1; ?>],
                            backgroundColor: 'transparent',
                            borderColor:'rgb(35,131,241)',
                            borderWidth: 3
                        },

                            {
                                label: 'Jumlah Wanita',
                                data: [<?php echo $data2; ?>],
                                backgroundColor: 'transparent',
                                borderColor:'rgb(238,68,47)',
                                borderWidth: 3
                            },
                            {
                                label: 'Jumlah Kehadiran',
                                data: [<?php echo $data3; ?>],
                                backgroundColor: 'transparent',
                                borderColor:'rgb(56,33,41)',
                                borderWidth: 3
                            },
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
    <div class="col-sm-3">
    </div>
</div>
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
<!--                <th>Action</th>-->
            </tr>
            </thead>
            <tbody>
            <?php
            include_once 'C:\xampp\htdocs\KPGKP\KP\GKP_KP\DAO\KehadiranDaoImpl.php';
            include_once 'C:\xampp\htdocs\KPGKP\KP\GKP_KP\PDOUtility.php';
            $kehadiranDao = new KehadiranDaoImpl();
            $kehadirans = $kehadiranDao->getAllKehadiran();
            /* @var $kehadiran Kehadiran */
            foreach($kehadirans as $kehadiran){
                $total = ($kehadiran['Kehadiran_Jumlah_Wanita'] + $kehadiran['Kehadiran_Jumlah_Pria']);
                echo '<tr>';
                echo '<td>'.$kehadiran['Kehadiran_Jumlah_Wanita'] .'</td>';
                echo '<td>'.$kehadiran['Kehadiran_Jumlah_Pria'] .'</td>';
                echo '<td>'.$total .'</td>';
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
</body>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</html>