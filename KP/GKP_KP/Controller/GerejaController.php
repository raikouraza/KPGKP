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
        $btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitGereja');
        if($btnSubmit){
            $gnama = FILTER_INPUT(INPUT_POST, 'nama');

            $gereja = new Gereja();
            $msg = $this->gerejaDao->insertGereja($gereja);

            header('location:index.php?menu=jemaat&msg='.$msg);
        }
//        $hasilGereja = $this->gerejaDao->getAllGereja();
        require_once 'View/Gereja/Gereja.php';
    }
    function mengubahJemaat(){

    }

}

?>