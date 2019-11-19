<?php


class KehadiranController
{
    private $KehadiranDao;

    /**
     * KehadiranController constructor.
     * @param $KehadiranDao
     */
    public function __construct()
    {
        $this->KehadiranDao = new KehadiranDaoImpl();
    }

    public function index(){
        //block below for delete
//        $deleteCommand = filter_input(INPUT_GET, 'delcom');
//        if (isset($deleteCommand) && $deleteCommand == 1) {
//            $id = filter_input(INPUT_GET, 'id');
//            $kehadiran = new Kehadiran();
//            $kehadiran->setId($id);
//            $this->kehadiranDao->deleteKehadiran($kehadiran);
//        }

        $submitted = filter_input(INPUT_POST,'btnSubmit');
        if(isset($submitted)){
            $kehadiran_tanggal = filter_input(INPUT_POST, 'txtNameClass');
            $kehadiran_jumlah_wanita = filter_input(INPUT_POST, 'txtNameClass');
            $kehadiran_jumlah_pria = filter_input(INPUT_POST, 'txtNameClass');
            $kehadiran_jumlah_persembahan= filter_input(INPUT_POST, 'txtNameClass');
            $kehadiran_gereja = filter_input(INPUT_POST, 'txtNameClass');
            $kehadiran = new Kehadiran();
            $kehadiran->setKehadiranTanggal($kehadiran_tanggal);
            $kehadiran->setKehadiranJumlahWanita($kehadiran_jumlah_wanita);
            $kehadiran->setKehadiranJumlahPria($kehadiran_jumlah_pria);
            $kehadiran->setKehadiranJumlahPersembahan($kehadiran_jumlah_persembahan);
            $kehadiran->setKehadiranGereja($kehadiran_gereja);

            $this->KehadiranDao->add($kehadiran);
            Utility::curl_get('http://localhost/RS_Server/service/Add_insurance_service.php',array('txtName'=>$name_class));

        }
        $kehadirans = $this->KehadiranDao->getAllKehadiran();
        include_once 'KP/GKP_KP/View/Kehadiran/Kehadiran.php';
    }
//    public function update(){
//        //For data fetch
//        $id= filter_input(INPUT_GET, 'id');
//        if (isset($id)) {
//            $insurance = new Insurance();
//            $insurance->setId($id);
//            $this->insuranceDao->getInsurance($insurance);
//        }
//        $input = filter_input(INPUT_POST, "btnUpdate");
//        if (isset($input)) {
//            $name = filter_input(INPUT_POST, 'txtNameClass');
//            $insurance->setNameClass($name);
//            $this->insuranceDao->updateInsurance($insurance);
//            header("location:index.php?menu=ir");
//        }
//        include_once 'view/insurance_update.php';
//    }
}

?>