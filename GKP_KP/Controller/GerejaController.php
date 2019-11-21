<?php


class GerejaController
{
    private $gerejaDao;

    /**
     * GerejaController constructor.
     * @param $gerejaDao
     */
    public function __construct()
    {
        $this->gerejaDao = new GerejaDaoImpl();
    }

    function mengolahGereja(){
        $hasilGereja = $this->gerejaDao->getAllGereja();
//        $btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitGereja');
//        if($btnSubmit){
//            $gnama = FILTER_INPUT(INPUT_POST, 'nama');
//
//            $gereja = new Gereja();
//            $msg = $this->gerejaDao->insertGereja($gereja);
//
//            header('location:index.php?menu=gereja&msg='.$msg);
//        }
        $btnCommand=FILTER_INPUT(INPUT_GET,'command');
        if ($btnCommand=='delete'){
            $id=FILTER_INPUT(INPUT_GET,'id');
            $gereja=new Gereja();
            $gereja->setGerejaId($id);

            $msg=$this->gerejaDao->deleteGereja($gereja);
            header('location:index.php?menu=gereja&msg='.$msg);
        }
        require_once 'View/Gereja/Gereja.php';
    }
    function mengubahGereja(){

    }

}

?>