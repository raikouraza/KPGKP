<?php


class PDOUtility2
{
    public static function get_koneksi2(){
          $connection = mysqli_connect("localhost","root","","dbgkp");
            //query to get data from the table
            $sql = "SELECT Kehadiran_Jumlah_Pria, Kehadiran_Jumlah_Wanita, (Kehadiran_Jumlah_Pria+Kehadiran_Jumlah_Wanita) as Jumlah_Peserta,Kehadiran_Tanggal FROM tbkehadiran LIMIT 10";
            $result = mysqli_query($connection, $sql);
            return $result;
       if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
       }
    }
}

