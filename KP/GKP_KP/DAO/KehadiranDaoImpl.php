<?php


class KehadiranDaoImpl
{
    public function getAllKehadiran()
    {
            $link =  PDOUtility::get_koneksi();
            try{
                //query
                $sql = "SELECT * FROM tbKehadiran ORDER BY Kehadiran_Id ";
                //prepare
                $stmt = $link->prepare($sql);
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

    public function addKehadiran(Kehadiran $kehadiran)
    {
        $link = PDOUtility::get_koneksi();
        $link->beginTransaction();
        $query = "INSERT INTO tbkehadiran(Kehadiran_Id, Kehadiran_Tanggal, Kehadiran_Jumlah_Wanita, Kehadiran_Jumlah_Pria, Kehadiran_Jumlah_Persembahan, Kehadiran_Gereja_Id) VALUES (?,?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $kehadiran->getKehadiranId(), PDO::PARAM_STR);
        $statement->bindValue(2, $kehadiran->getKehadiranTanggal(), PDO::PARAM_STR);
        $statement->bindValue(3, $kehadiran->getKehadiranJumlahWanita(), PDO::PARAM_INT);
        $statement->bindValue(4, $kehadiran->getKehadiranJumlahPria(), PDO::PARAM_INT);
        $statement->bindValue(5, $kehadiran->getKehadiranJumlahPersembahan(), PDO::PARAM_INT);
        $statement->bindValue(6, $kehadiran->getKehadiranGereja(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deleteKehadiran(Kehadiran $kehadiran)
    {
        $link = PDOUtility::get_koneksi();
        $link->beginTransaction();
        $query = "DELETE FROM tbkehadiran WHERE Kehadiran_Id = ?";
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
        $link = PDOUtility::get_koneksi();
        $link->beginTransaction();
        $query = 'UPDATE tbkehadiran SET Kehadiran_Tanggal = ?, Kehadiran_Jumlah_Wanita = ?, Kehadiran_Jumlah_pria = ?, Kehadiran_Jumlah_Persembahan = ?, Kehadiran_Gereja_id = ?  WHERE Kehadiran_Id = ?';
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
        $link = PDOUtility::get_koneksi();
        $query = "SELECT * FROM tbkehadiran WHERE Kehadiran_Id = ? LIMIT 1";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $kehadiran->getKehadiranId(), PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Kehadiran');
        $link = null;
        return $result;
    }

    function showByDate(){


    }
}