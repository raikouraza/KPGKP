<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dbgkp';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
include_once '../../PHPExcel/PHPExcel/IOFactory.php';
if (isset($_POST['upload_excel'])) {
    $file_info = $_FILES["result_file"]["name"];
    $file_directory = "uploads/excel_mail/";
    $new_file_name = date("dd/mm/yy") . "." . $file_info[".xls"];
    move_uploaded_file($_FILES["result_file"]["tmp_name"], $file_directory . $new_file_name);
    try {
        $file_type = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    } catch (PHPExcel_Reader_Exception $e) {
        $e->getMessage();
        die();
    }
    try {
        $objReader = PHPExcel_IOFactory::createReader($file_type);
    } catch (PHPExcel_Reader_Exception $e) {
        $e->getMessage();
        die();
    }
    try {
        $objPHPExcel = $objReader->load($file_directory . $new_file_name);
    } catch (PHPExcel_Reader_Exception $e) {
        $e->getMessage();
        die();
    }
    try {
        $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
    } catch (PHPExcel_Exception $e) {
        $e->getMessage();
        die();
    }

    foreach ($sheet_data as $row) {
        if (!empty($row['A'])) {
            $checkemail = mysqli_query($mysqli,'SELECT * FROM tbGereja where gereja_id="' . $row['A'] .'"');
            if(mysqli_num_rows($checkemail) == '0')
            {
                mysqli_query($mysqli,'INSERT INTO gereja (gereja_id,gereja_nama,gereja_alamat,gereja_kota,gereja_rt,gereja_rw,gereja_kecamatan,gereja_kelurahan,gereja_kodepos,gereja_telp,gereja_pemilik) VALUES ("' . $row['A'] . '","' . $row['B'] . '","' . $row['C'] . '","' . $row['D'] . '","' . $row['E'] . '","' . $row['F'] . '","' . $row['G'] . '","' . $row['H'] . '","' . $row['I'] . '","' . $row['J'] . '","' . $row['K'] . '")');
            }
//            $link=PDOUtility::get_koneksi();
//            $qry='SELECT * FROM tbGereja where gereja_id="' . $row['A'] .'"';
//            $count='SELECT COUNT(gereja_id) FROM tbGereja';
//            $stmt = $link->prepare($qry);
//            //execute
//            $stmt->execute();
//            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Gereja');
//            PDOUtility::close_koneksi($link);
//            if ($count == '0') {
//                $link=PDOUtility::get_koneksi();
//                $qry='INSERT INTO gereja (gereja_id,gereja_nama,gereja_alamat,gereja_kota,gereja_rt,gereja_rw,gereja_kecamatan,gereja_kelurahan,gereja_kodepos,gereja_telp,gereja_pemilik) VALUES ("' . $row['A'] . '","' . $row['B'] . '","' . $row['C'] . '","' . $row['D'] . '","' . $row['E'] . '","' . $row['F'] . '","' . $row['G'] . '","' . $row['H'] . '","' . $row['I'] . '","' . $row['J'] . '","' . $row['K'] . '")';
//                $stmt = $link->prepare($qry);
//                //execute
//                $stmt->execute();
//                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Gereja');
//                PDOUtility::close_koneksi($link);
//            }
        }

    }
    $updatemsg = "File Successfully Imported!";
    $updatemsgtype = 1;
}

?>
<div class="form-group" >
    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <label class="col-sm-3 label-on-left" style="margin-top: -16px;">Upload Excel</label>
                    <div class="col-md-6">
                        <input name="result_file"  required=""  type="file">
                    </div>
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="col-sm-3" style="width: 31%;margin-top: 15px;">
                <div class="pull-right hidden-print">
                    <button type="submit" name="upload_excel" class="btn btn-primary btn-rounded"> Upload Excel</button>
                </div>
            </div>
        </div>

<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
<br/>
</form>
</div>




