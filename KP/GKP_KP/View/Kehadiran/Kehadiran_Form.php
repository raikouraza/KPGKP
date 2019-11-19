<?php

?>
<br/>
<br/>
<!DOCTYPE html>
<html></html>
<head>
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

</head>
<body>
    <div id="container" align="center">
    <form action="" method="POST">
            <legend>Data Kehadiran</legend>
            <table>
                <tr>
                    <td>Masukan Data Kehadiran:</td>
                    <td><input type="text" class="form-control" name="txtId" autofocus required placeholder="Masukan Nama Asuransi"><br></td>
                </tr>
                <tr>
                    <td>Masukan Jumlah Wanita Yang Hadir:</td>
                    <td><input type="text" class="form-control" name="txtJumlahWanita" autofocus required placeholder="contoh : 55"><br></td>
                </tr>
                <tr>
                    <td>Masukan Jumlah Pria Yang Hadir:</td>
                    <td><input type="text" class="form-control" name="txtJumlahPria" autofocus required placeholder="contoh : 67"><br></td>
                </tr>
                <tr>
                    <td>Masukan Jumlah Persembahan:</td>
                    <td><input type="text" class="form-control" name="txtJumlahPersembahan" autofocus required placeholder="contoh : 5000000"><br></td>
                </tr>
                <tr>
                    <td>Masukan Id Gereja:</td>
                    <td>
                        <div class="form-group">
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
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
                        <button type="button" class="btn btn-primary">Primary</button>
                        <input type="submit" name="btnSubmit" value="addKehadiran" class="buttonButton-primary">
                    </td>
                </tr>
            </table>
            <table id="myTable"  class="display">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* @var $kehadiran Kehadiran */
                foreach($kehadirans as $kehadiran){
                    echo '<tr>';
                    echo '<td>'.$kehadiran->getKehadiran .'</td>';
                    echo '<td>'.$kehadiran->getKehadiranTanggal.'</td>';
                    echo '<td>'.$kehadiran->getKehadiranJumlahWanita.'</td>';
                    echo '<td>'.$kehadiran->getKehadiranJumlahPria.'</td>';
                    echo '<td>'.$kehadiran->getKehadiranJumlahPersembahan.'</td>';
                    echo '<td>'.$kehadiran->getKehadiranGereja.'</td>';
                    echo '<td><button onclick="deleteKehadiran(\'' .$kehadiran->Kehadiran_Id . '\');">Delete</button><button onclick="updateKehadiran(' . $kehadiran->Kehadiran_Id .')">Update</button></td>';
                    echo'</tr>';
                }
                ?>
                </tbody>
            </table>
    </form>
    </div>
</body>

