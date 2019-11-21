<?php
include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\DAO\KehadiranDaoImpl.php';
include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\DAO\GerejaDaoImpl.php';
include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\PDOUtility.php';
$KehadiranDao = new KehadiranDaoImpl();
$GerejaDao = new GerejaDaoImpl();
$kehadirans = $KehadiranDao->getAllKehadiran();
$gerejas = $GerejaDao->getAllGereja();
?>
<br/>
<br/>
<!DOCTYPE html>
<html></html>
<head>

    <link rel="stylesheet" type="text/css" href="css_Form.css"
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- date picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- date picker end -->
    <!--data tables-->
    <script type="text/javascript" src="../../jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../datatables/datatables.js"></script>
    <link rel="stylesheet" type="text/css" href="../../datatables/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.js"/>
    <!--data tables end-->


</head>
<body>
    <div id="container" align="center">
    <form action="" method="POST">
            <legend>Form Data Kehadiran</legend>
            <table border="1x" align="center" cellpadding="5" cellspacing="5" style="text-align:center">
                <tr>
                    <td>Masukan Data Kehadiran:</td>
                    <td><input type="text" name="idkehadiran" class="form-control" name="txtId" autofocus required placeholder="Masukan id kehadiran" align="center"><br></td>
                </tr>
                <tr>
                    <td>Masukan Jumlah Wanita Yang Hadir:</td>
                    <td><input type="text" name="jumlahwanita" class="form-control" name="txtJumlahWanita" autofocus required placeholder="contoh : 55"><br></td>
                </tr>
                <tr>
                    <td>Masukan Jumlah Pria Yang Hadir:</td>
                    <td><input type="text" name="jumlahpria" class="form-control" name="txtJumlahPria" autofocus required placeholder="contoh : 67"><br></td>
                </tr>
                <tr>
                    <td>Masukan Jumlah Persembahan:</td>
                    <td><input type="text" name="jumlahpersembahan" class="form-control" name="txtJumlahPersembahan" autofocus required placeholder="contoh : 5000000"><br></td>
                </tr>
                <tr>
                    <td>Masukan Id Gereja:</td>
                    <td>
                        <div class="form-group">
                                    <?php
                                    /* @var $gereja Gereja */
                                    echo '<select class="form-control" id="sel1" name="gerejaid">';
                                    foreach ($gerejas as $gereja) {
                                        echo '  <option ';
                                        echo ' value="' . ($gereja['gereja_id']) . '">' . ($gereja['gereja_nama']);
                                        echo '</option>';
                                    }
                                    echo '<select>';
                                    ?>
                                </select>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>Masukan Tanggal Kehadiran:</td>
                   <td> <input  type="date" name="datePicker" id="datePicker" class="form-control"/></td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" name="btnSubmit" value="addKehadiran" onclick="addKehadiran()">Submit</button>
<!--                    <input type="submit" name="btnSubmit" value="addKehadiran" class="buttonButton-primary">-->
                    </td>
                </tr>
            </table>
        <div class="row">
            <div class="col-sm-3"><!--kosong-->></div>
            <div class="col-sm-6">
                <h1>Tabel Jumlah Kehadiran Pria dan Wanita</h1>
                <table id="myTable" class="display" border="1px">
                    <thead>
                    <tr>
                        <th>Nama Gereja</th>
                        <th>Tanggal Kehadiran</th>
                        <th>Jumlah Kehadiran Pria</th>
                        <th>Jumlah Kehadiran Total</th>
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
                    foreach($kehadirans as $kehadiran){
                        $total = ($kehadiran['Kehadiran_Jumlah_Wanita'] + $kehadiran['Kehadiran_Jumlah_Pria']);
                        echo '<tr>';
                        echo '<td>'.$kehadiran['Kehadiran_Gereja_Id'] .'</td>';
                        echo '<td>'.$kehadiran['Kehadiran_Tanggal'] .'</td>';
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
                </tbody>
            </table>
    </form>
    </div>
</body>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

