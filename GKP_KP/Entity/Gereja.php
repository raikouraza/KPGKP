<?php


class Gereja
{

    private $gereja_id;
    private $gereja_nama;
    private $gereja_alamat;
    private $gereja_kota;
    private $gereja_rt;
    private $gereja_kecamatan;
    private $gereja_kelurahan;
    private $gereja_telp;
    private $gereja_pemilik;

    /**
     * @return mixed
     */
    public function getGerejaId()
    {
        return $this->gereja_id;
    }

    /**
     * @param mixed $gereja_id
     */
    public function setGerejaId($gereja_id)
    {
        $this->gereja_id = $gereja_id;
    }

    /**
     * @return mixed
     */
    public function getGerejaNama()
    {
        return $this->gereja_nama;
    }

    /**
     * @param mixed $gereja_nama
     */
    public function setGerejaNama($gereja_nama)
    {
        $this->gereja_nama = $gereja_nama;
    }

    /**
     * @return mixed
     */
    public function getGerejaAlamat()
    {
        return $this->gereja_alamat;
    }

    /**
     * @param mixed $gereja_alamat
     */
    public function setGerejaAlamat($gereja_alamat)
    {
        $this->gereja_alamat = $gereja_alamat;
    }

    /**
     * @return mixed
     */
    public function getGerejaKota()
    {
        return $this->gereja_kota;
    }

    /**
     * @param mixed $gereja_kota
     */
    public function setGerejaKota($gereja_kota)
    {
        $this->gereja_kota = $gereja_kota;
    }

    /**
     * @return mixed
     */
    public function getGerejaRt()
    {
        return $this->gereja_rt;
    }

    /**
     * @param mixed $gereja_rt
     */
    public function setGerejaRt($gereja_rt)
    {
        $this->gereja_rt = $gereja_rt;
    }

    /**
     * @return mixed
     */
    public function getGerejaKecamatan()
    {
        return $this->gereja_kecamatan;
    }

    /**
     * @param mixed $gereja_kecamatan
     */
    public function setGerejaKecamatan($gereja_kecamatan)
    {
        $this->gereja_kecamatan = $gereja_kecamatan;
    }

    /**
     * @return mixed
     */
    public function getGerejaKelurahan()
    {
        return $this->gereja_kelurahan;
    }

    /**
     * @param mixed $gereja_kelurahan
     */
    public function setGerejaKelurahan($gereja_kelurahan)
    {
        $this->gereja_kelurahan = $gereja_kelurahan;
    }

    /**
     * @return mixed
     */
    public function getGerejaTelp()
    {
        return $this->gereja_telp;
    }

    /**
     * @param mixed $gereja_telp
     */
    public function setGerejaTelp($gereja_telp)
    {
        $this->gereja_telp = $gereja_telp;
    }

    /**
     * @return mixed
     */
    public function getGerejaPemilik()
    {
        return $this->gereja_pemilik;
    }

    /**
     * @param mixed $gereja_pemilik
     */
    public function setGerejaPemilik($gereja_pemilik)
    {
        $this->gereja_pemilik = $gereja_pemilik;
    }



}

?>