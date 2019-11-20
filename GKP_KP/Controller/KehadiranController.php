<?php
class KehadiranController
{
    private $KehadiranDao;
    private $GerejaDao;
    public function __construct()
    {
        $this->KehadiranDao = new KehadiranDaoImpl();
        $this->GerejaDao = new GerejaDaoImpl();
    }
    public function index()
    {
        $kehadiran = new Kehadiran();
        $gereja=new Gereja();
        $submitted = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitted)) {
            $kehadiran_id = filter_input(INPUT_POST, 'idkehadiran');
            $kehadiran_tanggal = filter_input(INPUT_POST, 'datePicker');
            $kehadiran_jumlah_wanita = filter_input(INPUT_POST, 'jumlahwanita');
            $kehadiran_jumlah_pria = filter_input(INPUT_POST, 'jumlahpria');
            $kehadiran_jumlah_persembahan = filter_input(INPUT_POST, 'jumlahpersembahan');
            $kehadiran_gereja_id = filter_input(INPUT_POST, 'gerejaid');

            if (!Empty(array($kehadiran_id, $kehadiran_tanggal, $kehadiran_jumlah_wanita, $kehadiran_jumlah_pria, $kehadiran_jumlah_persembahan, $kehadiran_gereja_id))) {
                $kehadiran->setKehadiranId($kehadiran_id);
                $kehadiran->setKehadiranTanggal($kehadiran_tanggal);
                $kehadiran->setKehadiranJumlahWanita($kehadiran_jumlah_wanita);
                $kehadiran->setKehadiranJumlahPria($kehadiran_jumlah_pria);
                $kehadiran->setKehadiranJumlahPersembahan($kehadiran_jumlah_persembahan);
                $gereja->setGerejaId($kehadiran_gereja_id);
                $kehadiran->setKehadiranGereja($gereja);
                $this->KehadiranDao->addKehadiran($kehadiran);
                header("Location: index.php?menu=");
            }
        }
        $deleteCommand = filter_input(INPUT_GET, 'delcom');
        if (isset($deleteCommand) && ($deleteCommand == 1)) {
            $kehadiran_id = filter_input(INPUT_GET, 'id');
            $kehadiran->setKehadiranId($kehadiran_id);
            $this->KehadiranDao->deleteKehadiran($kehadiran);
        }
        $kehadirans = $this->KehadiranDao->getAllKehadiran();
        $gerejas = $this->GerejaDao->getAllGereja();
        require_once 'GKP_KP/View/Kehadiran/Kehadiran_Form.php';
        }
        public function updateKehadiran(){
        //Update Function
        $kehadiran = new Kehadiran();
        $submitted = filter_input(INPUT_POST,'btnSubmit');
        if(isset($submitted)){
            $kehadiran_id = filter_input(INPUT_POST,'idkehadiran');
            $kehadiran_tanggal = filter_input(INPUT_POST,'datePicker');
            $kehadiran_jumlah_wanita = filter_input(INPUT_POST,'jumlahwanita');
            $kehadiran_jumlah_pria = filter_input(INPUT_POST,'jumlahpria');
            $kehadiran_jumlah_persembahan = filter_input(INPUT_POST,'jumlahpersembahan');
            $kehadiran_gereja_id = filter_input(INPUT_POST,'gerejaid');

            if (!Empty(array($kehadiran_id, $kehadiran_tanggal, $kehadiran_jumlah_wanita, $kehadiran_jumlah_pria, $kehadiran_jumlah_persembahan, $kehadiran_gereja_id))) {
                $kehadiran->setKehadiranId($kehadiran_id);
                $kehadiran->setKehadiranTanggal($kehadiran_tanggal);
                $kehadiran->setKehadiranJumlahWanita($kehadiran_jumlah_wanita);
                $kehadiran->setKehadiranJumlahPria($kehadiran_jumlah_pria);
                $kehadiran->setKehadiranJumlahPersembahan($kehadiran_jumlah_persembahan);
                $kehadiran->setKehadiranGereja($kehadiran_gereja_id);
                $this->KehadiranDao->updateKehadiran($kehadiran);
                header("Location: index.php?menu=");
            }
        }
        $kehadirans = $this->KehadiranDao->getAllKehadiran();
        include_once 'GKP_KP/View/Kehadiran/Kehadiran_Form.php';
    }
}