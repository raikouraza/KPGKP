<?php
SESSION_START();
if(!isset($_SESSION['approved_user'])){
    $_SESSION['approved_user'] = FALSE;
}
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="jquery-3.4.1.js"></script>
    <script type="text/javascript" src="Datatables/datatables.js"></script>
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="Datatables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Datatables/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="Datatables.min.cs"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    //Utility
    include_once 'PDOUtility.php';

    //Entity
    include_once 'Entity/Gereja.php';
    include_once 'Entity/Jemaat.php';
    include_once 'Entity/Kehadiran.php';
    include_once 'Entity/Pekerjaan.php';

    //Dao
    include_once 'DAO/GerejaDaoImpl.php';
    include_once 'DAO/JemaatDaoImpl.php';
    include_once 'DAO/PekerjaanDaoImpl.php';
    include_once 'DAO/KehadiranDaoImpl.php';

    //Controller
    include_once 'Controller/GerejaController.php';
    include_once 'Controller/KehadiranController.php';
    include_once 'Controller/JemaatController.php';

    //makemenu
    include_once "MakeMenu.php";

?>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		p{
			color: green;
		}
	</style>
    <?php
    makemenu();
    ?>
    <div id="container">
        <?php
        $nav = FILTER_INPUT(INPUT_GET, 'menu');
        $jemaatController = new JemaatController();
        switch ($nav){
            case 'home' : $jemaatController->login();
                break;
            case 'jemaat' :
                {
                    $cmd =  FILTER_INPUT(INPUT_GET,'command');
                    if($cmd =="edit" && $_SESSION['userrole'] == 'admin'){
                        $jemaatController->mengubahJemaat();
                    }else{
                        $jemaatController->mengolahJemaat();
                    }
                }
                break;
            case 'gereja' :
                {
                    $cmd =  FILTER_INPUT(INPUT_GET,'command');
                    $gerejaController = new GerejaController();
                    if($cmd =="edit" && $_SESSION['userrole'] == 'admin'){
                        $gerejaController->mengubahGereja();
                    }else{
                        $gerejaController->mengolahGereja();
                    }
                }
                break;
//            case 'kehadiran' :
//                $cmd =  FILTER_INPUT(INPUT_GET,'command');
//                $KehadiranController = new KehadiranController();
//                if($cmd =="edit" && $_SESSION['userrole'] == 'admin'){
//                    $kehadiranController->mengubahKehadiran();
//                }else{
//                    $kehadiranController->mengolahKehadiran();
//                }
//                break;
            default: $jemaatController->login();
                break;
            case 'logout' :
                {
                    $_SESSION['approved_user'] = FALSE;
                    $_SESSION['userid'] = '';
                    $_SESSION['username'] = '';
                    $_SESSION['userrole'] = '';
                    $_SESSION['name'] = '';
                    session_unset();
                    session_destroy();
                    header('location:index.php');

                }break;
        }

        if (!isset($nav))
        {
            $jemaatController->login();
        }
        ?>
    </div>


</body>
</html>