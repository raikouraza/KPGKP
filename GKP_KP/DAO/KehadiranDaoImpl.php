<?php
class KehadiranDaoImpl
{
    public function getAllKehadiran()
    {
        $link = PDOUtility::createMySQLConnection();
        $query = "SELECT * FROM tbkehadiran ORDER BY kehadiran_ID ";
        $result = $link->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,"Kehadiran");
        return $result->fetchAll(PDO::FETCH_OBJ);
//            $link =  PDOUtility::get_koneksi();
//            try{
//                //query
//                $sql = "SELECT * FROM tbKehadiran ORDER BY Kehadiran_Id";
//                //prepare
//                $stmt = $link->prepare($sql);
//                //execute
//                $stmt->execute();
//                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Kehadiran');
//            }
//            catch(PDOException $err){
//                echo $err->getMessage();
//                die();
//            }
//            PDOUtility::close_koneksi($link);
//            return $stmt;
    }

    public function addKehadiran(Kehadiran $kehadiran)
    {
        $link = PDOUtility::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO tbkehadiran(kehadiran_ID, kehadiran_Tanggal, kehadiran_Jumlah_Wanita, kehadiran_Jumlah_Pria, kehadiran_Jumlah_Persembahan, kehadiran_Gereja_Id) VALUES (?,?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $kehadiran->getKehadiranId(), PDO::PARAM_STR);
        $statement->bindValue(2, $kehadiran->getKehadiranTanggal(), PDO::PARAM_STR);
        $statement->bindValue(3, $kehadiran->getKehadiranJumlahWanita(), PDO::PARAM_INT);
        $statement->bindValue(4, $kehadiran->getKehadiranJumlahPria(), PDO::PARAM_INT);
        $statement->bindValue(5, $kehadiran->getKehadiranJumlahPersembahan(), PDO::PARAM_INT);
        $statement->bindValue(6, $kehadiran->getKehadiranGereja()->getGerejaId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }
    function deleteKehadiran(Kehadiran $kehadiran)
    {
        $link = PDOUtility::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM tbkehadiran WHERE kehadiran_ID = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1,$kehadiran->getKehadiranId() , PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }
    function updateKehadiran(Kehadiran $kehadiran)
    {
        $link = PDOUtility::createMySQLConnection();
        $link->beginTransaction();
        $query = 'UPDATE tbkehadiran SET kehadiran_Tanggal = ?, kehadiran_Jumlah_Wanita = ?, kehadiran_Jumlah_pria = ?, kehadiran_Jumlah_Persembahan = ?, kehadiran_Gereja_id = ?  WHERE kehadiran_Id = ?';
        $statement = $link->prepare($query);
        $statement->bindValue(1, $kehadiran->getKehadiranTanggal(), PDO::PARAM_STR);
        $statement->bindValue(2, $kehadiran->getKehadiranJumlahWanita(), PDO::PARAM_INT);
        $statement->bindValue(3, $kehadiran->getKehadiranJumlahPria(), PDO::PARAM_INT);
        $statement->bindValue(4, $kehadiran->getKehadiranJumlahPersembahan(), PDO::PARAM_INT);
        $statement->bindValue(5, $kehadiran->getKehadiranGereja(), PDO::PARAM_INT);
        $statement->bindValue(6, $kehadiran->getKehadiranId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }
    function getKehadiran(Kehadiran $kehadiran)
    {
        $link = PDOUtility::createMySQLConnection();
        $query = "SELECT * FROM tbkehadiran WHERE kehadiran_Id = ? LIMIT 1";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $kehadiran->getKehadiranId(), PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Kehadiran');
        $link = null;
        return $result;
    }
    public function getAllKehadiranTanggal(Kehadiran $kehadiran)
    {
        $link =  PDOUtility::createMySQLConnection();
        try{
            //query
            $sql = "SELECT kehadiran_Jumlah_Pria, kehadiran_Jumlah_Wanita, (kehadiran_Jumlah_Pria+kehadiran_Jumlah_Wanita) as Jumlah_Peserta,kehadiran_Tanggal FROM tbkehadiran where kehadiran_Tanggal between ? and ?";
            //prepare
            $stmt = $link->prepare($sql);
            $stmt->bindValue(1, $kehadiran->getKehadiranTanggal1(), PDO::PARAM_STR);
            $stmt->bindValue(2, $kehadiran->getKehadiranTanggal2(), PDO::PARAM_STR);
            //execute
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Kehadiran');
        }
        catch(PDOException $err){
            echo $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $stmt;
    }

}