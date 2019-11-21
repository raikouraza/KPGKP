<?php
if(isset($_GET['berhasil'])){
    echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
}
?>
<div class="form-group" >
<form method="post" enctype="multipart/form-data" action="../../upload_aksi.php">
<input name="fileexcelgereja" type="file" required class="form-control" style="width: 350px" accept=".xls">
    <button type="submit" name="preview" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-eye-open"></span> Review
    </button>
</form>

    <hr>

    <!-- Buat Preview Data -->
    <?php
      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        $nama_file_baru = 'data.xls';

        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

        $ext = pathinfo($_FILES['fileexcelgereja']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['fileexcelgereja']['tmp_name'];
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($ext == "xls"){
          // Upload file yang dipilih ke folder tmp
          move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

          // Load librari PHPExcel nya
          require_once 'PHPExcel/PHPExcel.php';

          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          ?>

<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
<br/>
<br/>
<input name="upload" type="submit" value="Import" class="btn btn-primary">
</form>
</div>




