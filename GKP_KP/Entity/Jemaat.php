<?php


class Jemaat
{
    private $jemaat_id;
    private $jemaat_nomor;
    private $jemaat_nama_depan;
    private $jemaat_nama_belakang;
    private $jemaat_nama_keluarga;
    private $jemaat_kota_kelahiran;
    private $jemaat_jenis_kelamin;
    private $jemaat_tanggal_kelahiran;
    private $jemaat_kota_tinggal;
    private $jemaat_kelurahan_tinggal;
    private $jemaat_kecamatan_tinggal;
    private $jemaat_rt_tinggal;
    private $jemaat_rw_tinggal;
    private $jemaat_alamat_tinggal;
    private $jemaat_kodepos_tinggal;
    private $jemaat_provinsi_tinggal;
    private $jemaat_status_menikah;
    private $jemaat_foto;
    private $jemaat_role;
    private $jemaat_username;
    private $jemaat_password;
    private $jemaat_lock;
    private $jemaat_pekerjaan;
    private $jemaat_gereja;

    /**
     * Jemaat constructor.
     * @param $pekerjaan
     */
    public function __construct()
    {
        $this->jemaat_pekerjaan = new Pekerjaan();
        $this->jemaat_gereja = new Gereja();
    }
    public function __set($name, $value)
    {
        if(!isset($this->jemaat_pekerjaan)){
            $this->jemaat_pekerjaan = new Pekerjaan();
        }
        if(isset($value)){
            switch ($name){
                case 'pekerjaan_id':
                    $this->jemaat_pekerjaan->setPekerjaanId($value);
                    break;
                case 'pekerjaan_nama':
                    $this->jemaat_pekerjaan->setPekerjaanNama($value);
                    break;
                default :
                    break;

            }

        }
        if(!isset($this->jemaat_gereja)){
            $this->jemaat_gereja = new Gereja();
        }
        if(isset($value)){
            switch ($name){
                case 'gereja_id':
                    $this->jemaat_gereja->setGerejaId($value);
                    break;
                case 'gereja_nama':
                    $this->jemaat_gereja->setGerejaNama($value);
                    break;
                default :
                    break;

            }

        }
    }

    /**
     * @return mixed
     */
    public function getJemaatJenisKelamin()
    {
        return $this->jemaat_jenis_kelamin;
    }

    /**
     * @param mixed $jemaat_jenis_kelamin
     */
    public function setJemaatJenisKelamin($jemaat_jenis_kelamin)
    {
        $this->jemaat_jenis_kelamin = $jemaat_jenis_kelamin;
    }


    /**
     * @return mixed
     */
    public function getJemaatId()
    {
        return $this->jemaat_id;
    }

    /**
     * @param mixed $jemaat_id
     */
    public function setJemaatId($jemaat_id)
    {
        $this->jemaat_id = $jemaat_id;
    }

    /**
     * @return mixed
     */
    public function getJemaatNomor()
    {
        return $this->jemaat_nomor;
    }

    /**
     * @param mixed $jemaat_nomor
     */
    public function setJemaatNomor($jemaat_nomor)
    {
        $this->jemaat_nomor = $jemaat_nomor;
    }

    /**
     * @return mixed
     */
    public function getJemaatNamaDepan()
    {
        return $this->jemaat_nama_depan;
    }

    /**
     * @param mixed $jemaat_nama_depan
     */
    public function setJemaatNamaDepan($jemaat_nama_depan)
    {
        $this->jemaat_nama_depan = $jemaat_nama_depan;
    }

    /**
     * @return mixed
     */
    public function getJemaatNamaBelakang()
    {
        return $this->jemaat_nama_belakang;
    }

    /**
     * @param mixed $jemaat_nama_belakang
     */
    public function setJemaatNamaBelakang($jemaat_nama_belakang)
    {
        $this->jemaat_nama_belakang = $jemaat_nama_belakang;
    }

    /**
     * @return mixed
     */
    public function getJemaatNamaKeluarga()
    {
        return $this->jemaat_nama_keluarga;
    }

    /**
     * @param mixed $jemaat_nama_keluarga
     */
    public function setJemaatNamaKeluarga($jemaat_nama_keluarga)
    {
        $this->jemaat_nama_keluarga = $jemaat_nama_keluarga;
    }

    /**
     * @return mixed
     */
    public function getJemaatKotaKelahiran()
    {
        return $this->jemaat_kota_kelahiran;
    }

    /**
     * @param mixed $jemaat_kota_kelahiran
     */
    public function setJemaatKotaKelahiran($jemaat_kota_kelahiran)
    {
        $this->jemaat_kota_kelahiran = $jemaat_kota_kelahiran;
    }

    /**
     * @return mixed
     */
    public function getJemaatTanggalKelahiran()
    {
        return $this->jemaat_tanggal_kelahiran;
    }

    /**
     * @param mixed $jemaat_tanggal_kelahiran
     */
    public function setJemaatTanggalKelahiran($jemaat_tanggal_kelahiran)
    {
        $this->jemaat_tanggal_kelahiran = $jemaat_tanggal_kelahiran;
    }

    /**
     * @return mixed
     */
    public function getJemaatKotaTinggal()
    {
        return $this->jemaat_kota_tinggal;
    }

    /**
     * @param mixed $jemaat_kota_tinggal
     */
    public function setJemaatKotaTinggal($jemaat_kota_tinggal)
    {
        $this->jemaat_kota_tinggal = $jemaat_kota_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatKelurahanTinggal()
    {
        return $this->jemaat_kelurahan_tinggal;
    }

    /**
     * @param mixed $jemaat_kelurahan_tinggal
     */
    public function setJemaatKelurahanTinggal($jemaat_kelurahan_tinggal)
    {
        $this->jemaat_kelurahan_tinggal = $jemaat_kelurahan_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatKecamatanTinggal()
    {
        return $this->jemaat_kecamatan_tinggal;
    }

    /**
     * @param mixed $jemaat_kecamatan_tinggal
     */
    public function setJemaatKecamatanTinggal($jemaat_kecamatan_tinggal)
    {
        $this->jemaat_kecamatan_tinggal = $jemaat_kecamatan_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatRtTinggal()
    {
        return $this->jemaat_rt_tinggal;
    }

    /**
     * @param mixed $jemaat_rt_tinggal
     */
    public function setJemaatRtTinggal($jemaat_rt_tinggal)
    {
        $this->jemaat_rt_tinggal = $jemaat_rt_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatRwTinggal()
    {
        return $this->jemaat_rw_tinggal;
    }

    /**
     * @param mixed $jemaat_rw_tinggal
     */
    public function setJemaatRwTinggal($jemaat_rw_tinggal)
    {
        $this->jemaat_rw_tinggal = $jemaat_rw_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatAlamatTinggal()
    {
        return $this->jemaat_alamat_tinggal;
    }

    /**
     * @param mixed $jemaat_alamat_tinggal
     */
    public function setJemaatAlamatTinggal($jemaat_alamat_tinggal)
    {
        $this->jemaat_alamat_tinggal = $jemaat_alamat_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatKodeposTinggal()
    {
        return $this->jemaat_kodepos_tinggal;
    }

    /**
     * @param mixed $jemaat_kodepos_tinggal
     */
    public function setJemaatKodeposTinggal($jemaat_kodepos_tinggal)
    {
        $this->jemaat_kodepos_tinggal = $jemaat_kodepos_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatProvinsiTinggal()
    {
        return $this->jemaat_provinsi_tinggal;
    }

    /**
     * @param mixed $jemaat_provinsi_tinggal
     */
    public function setJemaatProvinsiTinggal($jemaat_provinsi_tinggal)
    {
        $this->jemaat_provinsi_tinggal = $jemaat_provinsi_tinggal;
    }

    /**
     * @return mixed
     */
    public function getJemaatStatusMenikah()
    {
        return $this->jemaat_status_menikah;
    }

    /**
     * @param mixed $jemaat_status_menikah
     */
    public function setJemaatStatusMenikah($jemaat_status_menikah)
    {
        $this->jemaat_status_menikah = $jemaat_status_menikah;
    }

    /**
     * @return mixed
     */
    public function getJemaatFoto()
    {
        return $this->jemaat_foto;
    }

    /**
     * @param mixed $jemaat_foto
     */
    public function setJemaatFoto($jemaat_foto)
    {
        $this->jemaat_foto = $jemaat_foto;
    }

    /**
     * @return mixed
     */
    public function getJemaatRole()
    {
        return $this->jemaat_role;
    }

    /**
     * @param mixed $jemaat_role
     */
    public function setJemaatRole($jemaat_role)
    {
        $this->jemaat_role = $jemaat_role;
    }

    /**
     * @return mixed
     */
    public function getJemaatUsername()
    {
        return $this->jemaat_username;
    }

    /**
     * @param mixed $jemaat_username
     */
    public function setJemaatUsername($jemaat_username)
    {
        $this->jemaat_username = $jemaat_username;
    }

    /**
     * @return mixed
     */
    public function getJemaatPassword()
    {
        return $this->jemaat_password;
    }

    /**
     * @param mixed $jemaat_password
     */
    public function setJemaatPassword($jemaat_password)
    {
        $this->jemaat_password = $jemaat_password;
    }

    /**
     * @return mixed
     */
    public function getJemaatLock()
    {
        return $this->jemaat_lock;
    }

    /**
     * @param mixed $jemaat_lock
     */
    public function setJemaatLock($jemaat_lock)
    {
        $this->jemaat_lock = $jemaat_lock;
    }

    /**
     * @return Pekerjaan
     */
    public function getJemaatPekerjaan()
    {
        return $this->jemaat_pekerjaan;
    }

    /**
     * @param Pekerjaan $jemaat_pekerjaan
     */
    public function setJemaatPekerjaan($jemaat_pekerjaan)
    {
        $this->jemaat_pekerjaan = $jemaat_pekerjaan;
    }

    /**
     * @return Gereja
     */
    public function getJemaatGereja()
    {
        return $this->jemaat_gereja;
    }

    /**
     * @param Gereja $jemaat_gereja
     */
    public function setJemaatGereja($jemaat_gereja)
    {
        $this->jemaat_gereja = $jemaat_gereja;
    }




}

?>