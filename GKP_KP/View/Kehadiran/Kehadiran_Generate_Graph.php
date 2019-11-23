<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <?php
    include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\DAO\KehadiranDaoImpl.php';
    include_once 'C:\xampp\htdocs\KPGKP\GKP_KP\PDOUtility.php';
    ?>

</head>
<body>
<div class="jumbotron text-center">
    <h1>DATA KEHADIRAN GKP</h1></div>
<div class="row">
    <div class="col-sm-3"><!--kosong--></div>
    <div class="col-sm-6">
        <h1 align="center">Form Data Kehadiran</h1>
        <form action="Kehadiran.php" method="post">
            <p>Pilih data yang akan ditampilkan :</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="JumlahWanita" id="check" name="CheckboxWanita">
                <label class="form-check-label" for="defaultCheck1">
                    Jumlah Kehadiran Wanita
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="JumlahPria" id="check" name="CheckboxPria">
                <label class="form-check-label" for="defaultCheck2">
                    Jumlah Kehadiran Pria
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="JumlahTotal" id="check" name="CheckboxTotal">
                <label class="form-check-label" for="defaultCheck3">
                    Jumlah Keseluruhan
                </label>
            </div>
<!--            <div class="form-check">-->
<!--                <label>Tanggal Awal </label>-->
<!--                <input type="date" name="dateawal" id="dateawal">-->
<!--            </div>-->
<!--            <div class="form-check">-->
<!--                <label>Tanggal Akhir</label>-->
<!--                <input type="date" name="dateakhir" id="dateakhir">-->
<!--            </div>-->
            <button type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn" >Submit</button>
        </form>
    </div>
    <div class="col-sm-3"><!--kosong--></div>
</div>
<div class="col-sm-3" style="background-color:lavenderblush;">
</div>
</div>
</body>

</html>
