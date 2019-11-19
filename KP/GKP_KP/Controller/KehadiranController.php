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




}

?>