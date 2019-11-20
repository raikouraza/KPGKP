<?php


class Pekerjaan
{
    private $pekerjaan_id;
    private $pekerjaan_nama;

    /**
     * @return mixed
     */
    public function getPekerjaanId()
    {
        return $this->pekerjaan_id;
    }

    /**
     * @param mixed $pekerjaan_id
     */
    public function setPekerjaanId($pekerjaan_id)
    {
        $this->pekerjaan_id = $pekerjaan_id;
    }

    /**
     * @return mixed
     */
    public function getPekerjaanNama()
    {
        return $this->pekerjaan_nama;
    }

    /**
     * @param mixed $pekerjaan_nama
     */
    public function setPekerjaanNama($pekerjaan_nama)
    {
        $this->pekerjaan_nama = $pekerjaan_nama;
    }



}

?>