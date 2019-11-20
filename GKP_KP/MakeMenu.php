<?php
function makemenu(){
    $mnu = array("Index" => "home","List Jemaat" => "jemaat"
    , "Gereja" => "gereja", "Kehadiran" => "kehadiran");
    if($_SESSION['approved_user']==TRUE){
        $mnu = array("Index" => "home","List Jemaat" => "jemaat"
        , "Gereja" => "gereja", "Kehadiran" => "kehadiran", "Logout" => "logout");
    }
    foreach ($mnu as $value => $key)
    {
        echo '<a href="index.php?menu='.$key. '">'. $value. '</a> | ';

    }

}
?>