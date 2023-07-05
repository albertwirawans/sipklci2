<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('userdata')){
            redirect('');
        
        }elseif($this->session->userdata('userdata')['level'] != 1){
            redirect('');
        }
        //Do your magic here
    }

    function view($page = 'home')
    {
        if(!file_exists(APPPATH . 'views/admin/' . $page . '.php')){
            $data['content']    = '404';
            // exit;
        }else{
            $data['content']    = 'admin/' . $page;
        }
        
        $this->load->view('template', $data, FALSE);
    }


    function tambah_user()
    {
        $status = true;
        //Form validation
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $status = false;
        }


        if($status){
            /*===========================
            =     Load Models M_user    =
            ===========================*/
            $this->load->model('M_user');
            
            $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);//UBAH PASSWORD KE HASH   
            $code = $this->M_user->generateRandomString(30);//Membuat random string untuk user_code      
            $data = array(
                'username'      => $this->input->post('username'),
                'password'      => $hash,
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'level'         => $this->input->post('level'),
                'user_code'     => $code
            );

            $this->M_user->tambah_data_user($data);
            
            $this->session->set_flashdata('message', 'Berhasil menambah user');
            redirect('administrator/view/data-user');
        
        }else{
            $this->view('tambah-user');
        }
    }

    function read_user($user_code = null)
    {
        /*===========================
        =     Load Models M_user    =
        ===========================*/
        $this->load->model('M_user');
        $user = $this->M_user->get_data_user($user_code);
        if($user){
            $data['user']       = $user;
            $data['content']    = 'admin/read-user';
        }else{
            $data['content']    = '404';
        }
        $this->load->view('template', $data, FALSE);
    }

    function edit_user($user_code = null)
    {
        /*===========================
        =     Load Models M_user    =
        ===========================*/
        $this->load->model('M_user');
        $user = $this->M_user->get_data_user($user_code);
        if($user){

            $data['user']       = $user;
            $data['content']    = 'admin/edit-user';
        }else{
            $data['content']    = '404';
        }
        $this->load->view('template', $data, FALSE);
    }

    function update_data_user()
    {
        $status     = true;
        $content    = 'admin/edit-user';
        $user_code  = $this->input->post('user_code');

        /*===========================
        =     Load Models M_user    =
        ===========================*/
        $this->load->model('M_user');
        $cekusers = $this->M_user->get_data_user($user_code);
        if(!$cekusers){
            $status     = false;
            $content    = '404';
        
        }else{
            $data['user']   = $cekusers;
        }
        
        //Form validation
        $this->form_validation->set_rules('user_code', 'code', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $status             = false;
        }

        if($status){
            $update = array(
                'username'      => $this->input->post('username'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'level'         => $this->input->post('level'),
            );

            $this->M_user->update_user($update, $user_code);
            $this->session->set_flashdata('message', 'Berhasil update data user');
            redirect('administrator/view/data-user');
        }

        $data['content']    = $content; 
        $this->load->view('template', $data, FALSE);
    }

    function hapus_user($user_code = null)
    {
        /*===========================
        =     Load Models M_user    =
        ===========================*/
        $this->load->model('M_user');
        $cekusers = $this->M_user->get_data_user($user_code);
        if($cekusers){
            $this->M_user->delete_user($user_code);
            $this->session->set_flashdata('message', 'Berhasil menghapus user');
            redirect('administrator/view/data-user');
        }else{
            echo "<script>alert('User tidak ditemukan');</script>";
            redirect('administrator/view/data-user');
        }        
    }
}