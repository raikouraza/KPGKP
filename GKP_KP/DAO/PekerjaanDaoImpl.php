<?php


class PekerjaanDaoImpl
{
    function getAllPekerjaan(){
        $link =  PDOUtility::get_koneksi();
        try{
            //query
            $sql = "SELECT pekerjaan_id as 'pekerjaan_id', pekerjaan_nama as 'pekerjaan_nama' FROM tbPekerjaan WHERE pekerjaan_id not like '1' ORDER BY pekerjaan_nama ";
            //prepare
            $stmt = $link->prepare($sql);
            //execute
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pekerjaan');
        }
        catch(PDOException $err){
            echo $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $stmt;
    }
}