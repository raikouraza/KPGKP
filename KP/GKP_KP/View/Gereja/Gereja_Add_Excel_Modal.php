<?php
if(isset($_GET['berhasil'])){
    echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
}
?>
<div class="form-group" >
<form method="post" enctype="multipart/form-data" action="../upload_aksi.php">
<input name="fileexcelgereja" type="file" required class="form-control" style="width: 350px">
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
<br/>
<br/>
<input name="upload" type="submit" value="Import" class="btn btn-primary">
</form>
</div>




<!--<table border="1">-->
<!--    <tr>-->
<!--        <th>Id</th>-->
<!--        <th>Nama</th>-->
<!--    </tr>-->
<!--    --><?php
//    include 'koneksi.php';
//    $no=1;
//    $data = mysqli_query($koneksi,"select * from tbPekerjaan");
//    while($d = mysqli_fetch_array($data)){
//        ?>
<!--        <tr>-->
<!--            <th>--><?php //echo $d['Pekerjaan_Id']; ?><!--</th>-->
<!--            <th>--><?php //echo $d['Pekerjaan_Nama']; ?><!--</th>-->
<!--        </tr>-->
<!--        --><?php
//    }
//    ?>
<!---->
<!--</table>-->