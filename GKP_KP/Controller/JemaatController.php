<?php


class JemaatController
{
    private $JemaatDao;
    private $PekerjaanDao;

    /**
     * JemaatController constructor.
     * @param $JemaatDao
     */
    public function __construct()
    {
        $this->JemaatDao = new JemaatDaoImpl();
        $this->PekerjaanDao = new PekerjaanDaoImpl();
    }
    public function login(){
        $btnLogin = FILTER_INPUT(INPUT_POST, 'btnLogin');
        if(isset($btnLogin)){

            $username = FILTER_INPUT(INPUT_POST, 'uname');
            $password = FILTER_INPUT(INPUT_POST, 'pwd');

            $pengguna = new Jemaat();
            $pengguna->setJemaatUsername($username);
            $pengguna->setJemaatPassword($password);

            $data = $this->JemaatDao->masuk($pengguna);

            $result =$data->fetch();
            if(isset($result)&&$result['jemaat_id'] > 0){
                $_SESSION['approved_user'] = TRUE;
                $_SESSION['userid'] = $result['jemaat_id'];
                $_SESSION['username'] = $result['jemaat_username'];
                $_SESSION['userrole'] = $result['jemaat_role'];
                $_SESSION['name'] = $result['jemaat_nama_depan'];
            }
            header('location:index.php');
        }

        require_once 'View/Login.php';
    }

    function mengolahJemaat(){
        $btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitJemaat');
        if($btnSubmit){
            $jnama = FILTER_INPUT(INPUT_POST, 'nama');
//            $jstatus = FILTER_INPUT(INPUT_POST, 'status');
//            $jtgllahir = FILTER_INPUT(INPUT_POST, 'tgllahir');
//            $jkotakelahiran = FILTER_INPUT(INPUT_POST, 'kotakelahiran');
//            $jalamat = FILTER_INPUT(INPUT_POST, 'alamat');
//            $jrt = FILTER_INPUT(INPUT_POST, 'rt');
//            $jrw = FILTER_INPUT(INPUT_POST, 'rw');
//            $jkecamatan = FILTER_INPUT(INPUT_POST, 'kecamatan');
//            $jkelurahan = FILTER_INPUT(INPUT_POST, 'kelurahan');
//            $jkota = FILTER_INPUT(INPUT_POST, 'kota');
//            $jkodepos = FILTER_INPUT(INPUT_POST, 'kodepos');
//            $jpekerjaan_id = FILTER_INPUT(INPUT_POST, 'pekerjaan');

            $namafile = $_FILES['cover']['name'];
            $tmp = $_FILES['cover']['tmp_name'];
            $ukuran = $_FILES['cover']['size'];
            $ext = pathinfo($namafile, PATHINFO_EXTENSION);

            $app_ext = array('png', 'jpg', 'jpeg', 'gif', 'svg', 'bmp');
            $newfile = $jnama.'.'.$ext;

            if(in_array(strtolower($ext), $app_ext) == TRUE && $ukuran <= 1024*1024*2){
                move_uploaded_file($tmp, 'images/'.$newfile); //mau mindahin tmpnya ke images, kalau di tempat cuma ''
                $jemaat = new Jemaat();
                $msg = $this->JemaatDao->insertJemaat($jemaat);
            }else{
                $msg = 'ext';
            }
            header('location:index.php?menu=jemaat&msg='.$msg);
        }
        $hasilPekerjaan = $this->PekerjaanDao->getAllPekerjaan();
        $hasil = $this->JemaatDao->getAllJemaat();
        require_once 'KP/GKP_KP/View/Jemaat.php';
    }
    function mengubahJemaat(){

    }
}

?>