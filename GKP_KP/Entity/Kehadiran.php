<?php


class Kehadiran
{
    private $kehadiran_id;
    private $kehadiran_tanggal;
    private $kehadiran_jumlah_wanita;
    private $kehadiran_jumlah_pria;
    private $kehadiran_jumlah_persembahan;
    private $kehadiran_gereja;
    /**
     * Kehadiran constructor.
     * @param $gereja
     */
    public function __construct()
    {
        $this->kehadiran_gereja = new Gereja();
    }
    public function __set($name, $value)
    {
        if(!isset($this->kehadiran_gereja)){
            $this->kehadiran_gereja = new Gereja();
        }
        if(isset($value)){
            switch ($name){
                case 'idgereja':
                    $this->kehadiran_pekerjaan->setGerejaId($value);
                    break;
                case 'namegereja':
                    $this->kehadiran_pekerjaan->setGerejaNama($value);
                    break;
                default :
                    break;

            }

        }
    }

    /**
     * @return mixed
     */
    public function getKehadiranId()
    {
        return $this->kehadiran_id;
    }

    /**
     * @param mixed $kehadiran_id
     */
    public function setKehadiranId($kehadiran_id)
    {
        $this->kehadiran_id = $kehadiran_id;
    }

    /**
     * @return mixed
     */
    public function getKehadiranTanggal()
    {
        return $this->kehadiran_tanggal;
    }

    /**
     * @param mixed $kehadiran_tanggal
     */
    public function setKehadiranTanggal($kehadiran_tanggal)
    {
        $this->kehadiran_tanggal = $kehadiran_tanggal;
    }

    /**
     * @return mixed
     */
    public function getKehadiranJumlahWanita()
    {
        return $this->kehadiran_jumlah_wanita;
    }

    /**
     * @param mixed $kehadiran_jumlah_wanita
     */
    public function setKehadiranJumlahWanita($kehadiran_jumlah_wanita)
    {
        $this->kehadiran_jumlah_wanita = $kehadiran_jumlah_wanita;
    }

    /**
     * @return mixed
     */
    public function getKehadiranJumlahPria()
    {
        return $this->kehadiran_jumlah_pria;
    }

    /**
     * @param mixed $kehadiran_jumlah_pria
     */
    public function setKehadiranJumlahPria($kehadiran_jumlah_pria)
    {
        $this->kehadiran_jumlah_pria = $kehadiran_jumlah_pria;
    }

    /**
     * @return mixed
     */
    public function getKehadiranJumlahPersembahan()
    {
        return $this->kehadiran_jumlah_persembahan;
    }

    /**
     * @param mixed $kehadiran_jumlah_persembahan
     */
    public function setKehadiranJumlahPersembahan($kehadiran_jumlah_persembahan)
    {
        $this->kehadiran_jumlah_persembahan = $kehadiran_jumlah_persembahan;
    }

    /**
     * @return Gereja
     */
    public function getKehadiranGereja()
    {
        return $this->kehadiran_gereja;
    }

    /**
     * @param Gereja $kehadiran_gereja
     */
    public function setKehadiranGereja($kehadiran_gereja)
    {
        $this->kehadiran_gereja = $kehadiran_gereja;
    }


}

?>