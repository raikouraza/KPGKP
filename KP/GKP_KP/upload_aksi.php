<!-- import excel ke mysql -->

<?php
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepekerjaan']['name']) ;
move_uploaded_file($_FILES['filepekerjaan']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepekerjaan']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepekerjaan']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

    // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
    $id     = $data->val($i, 1);
    $nama   = $data->val($i, 2);

    if($nama != "" && $id != ""){
//        foreach ($data as $item){
//            $sql="Select * FROM pegawai where (nama='$nama' and alamat='$alamat' and telepon='$telepon')";
//            $duperaw=mysql_query($sql);
//            if (mysql_num_rows($duperaw)>0){
//                echo "Duplicate Data";
//            }
//            else{
                mysqli_query($koneksi,"INSERT into tbPekerjaan values('$id','$nama')");
//            }
//        }
        // input data ke database (table data_pegawai)
        $berhasil++;
    }
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepekerjaan']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>