<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    private $table = 'tb_siswa'; 
    private $status= true; 

    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function get_semua_siswa()
    {
        $siswa = $this->db->get($this->table);
        return $siswa;
    }

    function tambah_data_siswa($data)
    {
        /*===========================
        =    INSERT KE DATABASE     =
        ===========================*/
        $insert = $this->db->insert($this->table, $data);
        if(!$insert){
            $this->$status = false;
        }
        return $this->status;  
    }

    //search siswa
    function get_data_siswa($siswa_code)
    {
        $result = array();

        $this->db->where('siswa_code', $siswa_code);
        $ceksiswa = $this->db->get($this->table);
        if($ceksiswa->num_rows() != 0){
            $result = $ceksiswa->row();
        }

        return $result;
    }

    function update_siswa($data, $siswa_code)
    {
        $result = true;

        $this->db->where('siswa_code', $siswa_code);
        $this->db->update('tb_siswa', $data);

        return $result;
    }

    function hapus_siswa($siswa_code)
    {
        $this->db->where('siswa_code', $siswa_code);
        $cek = $this->db->delete($this->table);
        
        return $cek;
    }
}