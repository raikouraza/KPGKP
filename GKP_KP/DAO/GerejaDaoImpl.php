<?php


class GerejaDaoImpl
{
    function getAllGereja(){
        $link =  PDOUtility::get_koneksi();
        try{
            //query
            $sql = "SELECT gereja_id,gereja_nama,gereja_alamat,gereja_telp,gereja_pemilik from tbGereja ORDER BY gereja_id ";
            //prepare
            $stmt = $link->prepare($sql);
            //execute
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Gereja');
        }
        catch(PDOException $err){
            echo $err->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $stmt;
    }

    public function deleteGereja(Gereja $gereja)
    {
        $link=PDOUtility::get_koneksi();
        try{
            $sql="DELETE FROM tbGereja WHERE gereja_id=?";
            $stmt=$link->prepare($sql);

            $stmt->bindValue(1,$gereja->getGerejaId(),PDO::PARAM_STR);
            $stmt->execute();
            $link->commit();
            $msg="suksesd";
        }catch (PDOException $exception){
            $link->rollBack();
            $exception->getMessage();
            die();
        }
        PDOUtility::close_koneksi();
        return $msg;
    }
}