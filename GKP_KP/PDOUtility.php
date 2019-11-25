<?php


class PDOUtility
{
    public static function get_koneksi(){
        try{
            $db = "mysql:host=localhost;dbname=dbgkp";
            $db_handler = new PDO($db, "root","");

            $db_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e -> getMessage();
            die();
        }
        return $db_handler;
    }
    public static function close_koneksi(PDO $link){
        $link =NULL;
    }
    public static function createMySQLConnection(){
    $link = new PDO('mysql:host=localhost;dbname=dbgkp','root','');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

    return $link;

}
}

?>

