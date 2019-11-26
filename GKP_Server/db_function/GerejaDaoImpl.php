<?php


class GerejaDaoImpl
{
    function getAllGereja(){
        $link =  PDOUtility::get_koneksi();
        try{
            //query
            $sql = "SELECT * from tbgereja ORDER BY gereja_ID ";
            //prepare
            $stmt = $link->prepare($sql);
            //execute
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Gereja');
            return $stmt->fetchAll(PDO::FETCH_OBJ);
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
            $sql="DELETE FROM tbGereja WHERE gereja_ID=?";
            $stmt=$link->prepare($sql);

            $stmt->bindValue(1,$gereja->getGerejaId(),PDO::PARAM_STR);
            $stmt->execute();
            $msg="suksesd";
            $link->commit();
        }catch (PDOException $exception){
            $link->rollBack();
            $exception->getMessage();
            die();
        }
        PDOUtility::close_koneksi($link);
        return $msg;
    }
}