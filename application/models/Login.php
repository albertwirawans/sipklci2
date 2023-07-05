<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Login extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    function cek_login($data_login)
    {
        $result = array();

        //Mencari user dengan email tertera
        $this->db->where('username', $data_login['username']);
        $this->db->join('tb_group', 'tb_group.group_id = tb_user.level'); //level users
        $cekuser = $this->db->get('tb_user');
        if($cekuser->num_rows() != 0){

            //cocokkan pasword input dengan di database
            if(password_verify($data_login['password'], $cekuser->row()->password)){
                $result = $cekuser->row();
            }
        }

        return $result;
    }
}