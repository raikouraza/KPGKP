<?php


class JemaatDaoImpl
{
    public function masuk(Jemaat $user){
        $link = PDOUtility::get_koneksi();
        try{
            //query
            $sql = "SELECT * FROM tbJemaat where jemaat_username=MD5(?) and jemaat_password=MD5(?)";
            //prepare
            $stmt = $link->prepare($sql);
            $stmt -> bindParam(1, $user->getJemaatUsername(), PDO::PARAM_STR);
            $stmt -> bindParam(2, $user->getJemaatPassword(), PDO::PARAM_STR);
            //execute
            $stmt->execute();
        }
        catch(PDOException $err){
            echo $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $stmt;
    }
    function getAllJemaat(){
        $link = PDOUtility::get_koneksi();
        try{
            //query
            $sql = "SELECT j.* , p.pekerjaan_id as 'pekerjaan_id', p.pekerjaan_nama as 'pekerjaan_nama' FROM tbJemaat j JOIN tbPekerjaan p ON (p.pekerjaan_id = j.jemaat_pekerjaan_id)ORDER BY j.jemaat_id";
            //prepare
            $stmt = $link->prepare($sql);
            //execute
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jemaat');
        }
        catch(PDOException $err){
            echo $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $stmt;
    }
    function getOneJemaat(Jemaat $jemaat){
        $link = PDOUtility::get_koneksi();
        try{
            //query
            $sql = "SELECT j.* , p.pekerjaan_id as 'pekerjaan_id', p.pekerjaan_nama as 'pekerjaan_nama' FROM tbJemaat j JOIN tbPekerjaan p ON (p.pekerjaan_id = j.jemaat_pekerjaan_id) HWERE jemaat_id = ? ORDER BY j.jemaat_id";
            //prepare
            $stmt = $link->prepare($sql);
            $stmt -> bindValue(1, $jemaat->getJemaatId(), PDO::PARAM_STR);
            //execute
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jemaat');
            $hasil = $stmt -> fetch();
        }
        catch(PDOException $err){
            echo $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $hasil;
    }
    public function insertJemaat(Jemaat $jemaat){
        $msg = 'gagal';
        $link = PDOUtility::get_koneksi();
        try{
            //begin transaksi #
            $link -> beginTransaction();
            //query
            $qry = "CALL insertJemaat(?, ?)";
            //prepare
            $stmt = $link->prepare($qry);
            //parameter #
            $stmt->bindValue(1, $jemaat->getJemaatNamaDepan(), PDO::PARAM_STR);
            $stmt->bindValue(2, $jemaat->getPekerjaan()->getPekerjaanId(), PDO::PARAM_INT);
            //execute
            $stmt-> execute();
            $link->commit();
            $msg ='sukses';
        }
        catch(PDOException $err){
            $link->rollBack();
            $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $msg;
    }

}