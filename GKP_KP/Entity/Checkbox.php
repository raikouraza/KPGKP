<?php
class Checkbox
{
    private $jumlah_wanita;
    private $jumlah_pria;
    private $jumlah_total;

    /**
     * @return mixed
     */
    public function getJumlahWanita()
    {
        return $this->jumlah_wanita;
    }

    /**
     * @param mixed $jumlah_wanita
     */
    public function setJumlahWanita($jumlah_wanita)
    {
        $this->jumlah_wanita = $jumlah_wanita;
    }

    /**
     * @return mixed
     */
    public function getJumlahPria()
    {
        return $this->jumlah_pria;
    }

    /**
     * @param mixed $jumlah_pria
     */
    public function setJumlahPria($jumlah_pria)
    {
        $this->jumlah_pria = $jumlah_pria;
    }

    /**
     * @return mixed
     */
    public function getJumlahTotal()
    {
        return $this->jumlah_total;
    }

    /**
     * @param mixed $jumlah_total
     */
    public function setJumlahTotal($jumlah_total)
    {
        $this->jumlah_total = $jumlah_total;
    }
}