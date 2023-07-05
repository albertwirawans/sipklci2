<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    private $table = 'tb_user'; 
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

    function tambah_data_user($data)
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

    function get_data_user($user_code)
    {
        $result = array();

        $this->db->where('user_code', $user_code);
        $this->db->join('tb_group', 'tb_group.group_id = tb_user.level');
        $cekuser = $this->db->get($this->table);
        if($cekuser->num_rows() != 0){
            $result = $cekuser->row();
        }

        return $result;
    }

    function update_user($data, $user_code)
    {
        $result = true;

        $this->db->where('user_code', $user_code);
        $this->db->update('tb_user', $data);

        return $result;
    }

    function delete_user($user_code)
    {
        $result = true;

        $this->db->where('user_code', $user_code);
        $this->db->delete('tb_user');

        return $result;
    }
}