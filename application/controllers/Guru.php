<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('userdata')){
            redirect('auth/');
        }
        //Do your magic here
    }
    
    function view($page = 'home')
    {
        if(!file_exists(APPPATH . 'views/guru/' . $page . '.php')){
            $data['content']    = '404';
            // exit;
        }else{
            $data['content']    = 'guru/' . $page;
        }
        
        $this->load->view('template', $data, FALSE);
    }

    function tambah_siswa()
    {
        $status = true;
        //Form validation
        $this->form_validation->set_rules('siswa_nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('siswa_kelas', 'Kelas Siswa', 'required');
        $this->form_validation->set_rules('siswa_telepon', 'Telepon Siswa', 'required|numeric');
        $this->form_validation->set_rules('siswa_alamat', 'Alamat Siswa', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');
        $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan', 'required');
        $this->form_validation->set_rules('surat_balasan', 'Surat Balasan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $status = false;
        }

        if($status){
            /*===========================
            =     Load Models M_siswa   =
            ===========================*/
            $this->load->model('M_siswa');
            $code = $this->M_siswa->generateRandomString(30);//Membuat random string untuk siswa_code      
            
            $data = array(
                'siswa_nama'        => $this->input->post('siswa_nama'),
                'siswa_kelas'       => $this->input->post('siswa_kelas'),
                'siswa_telepon'     => $this->input->post('siswa_telepon'),
                'siswa_alamat'      => $this->input->post('siswa_alamat'),
                'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'surat_permohonan'  => $this->input->post('surat_permohonan'),
                'surat_balasan'     => $this->input->post('surat_balasan'),
                'siswa_code'        => $code
            );

            $this->M_siswa->tambah_data_siswa($data);
            
            $this->session->set_flashdata('message', 'Berhasil menambah siswa');
            redirect('guru/view/data-siswa');
        
        }else{
            $this->view('tambah-siswa');
        }
    }

    function read_siswa($siswa_code = '')
    {
        /*===========================
        =     Load Models M_siswa   = 
        ===========================*/
        $this->load->model('M_siswa');
        $cekk_siswa_code = $this->M_siswa->get_data_siswa($siswa_code);
        if($cekk_siswa_code){
            //JIka ada siswa yang mempunyai code tersebut, maka tampilkan
            $data['siswa']      = $cekk_siswa_code;
            $data['content']    = 'guru/lihat-siswa';
            
        }else{
            $data['content']    = '404';
        }
        
        $this->load->view('template', $data, FALSE);
    }

    function edit_siswa($siswa_code)
    {
        /*===========================
        =     Load Models M_siswa   =
        ===========================*/
        $this->load->model('M_siswa');
        $siswa = $this->M_siswa->get_data_siswa($siswa_code);
        if($siswa){

            $data['siswa']      = $siswa;
            $data['content']    = 'Guru/edit-siswa';
        }else{
            $data['content']    = '404';
        }
        $this->load->view('template', $data, FALSE);
    }

    function update_data_siswa()
    {
        $status     = true;
        $content    = 'guru/edit-siswa';
        $siswa_code = $this->input->post('siswa_code');

        /*===========================
        =     Load Models M_siswa   =
        ===========================*/
        $this->load->model('M_siswa');
        $ceksiswa = $this->M_siswa->get_data_siswa($siswa_code);
        if(!$ceksiswa){
            $status     = false;
            $content    = '404';
        
        }else{
            $data['siswa']   = $ceksiswa;
        }
        
        //Form validation
        $this->form_validation->set_rules('siswa_code', 'code', 'required');
        $this->form_validation->set_rules('siswa_nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('siswa_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('siswa_telepon', 'Telepon Siswa', 'required|numeric');
        $this->form_validation->set_rules('siswa_alamat', 'Alamat Siswa', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');
        $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan', 'required');
        $this->form_validation->set_rules('surat_balasan', 'Surat Balasan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $status = false;
        }

        if($status){
            $update = array(
                'siswa_nama'        => $this->input->post('siswa_nama'),
                'siswa_kelas'       => $this->input->post('siswa_kelas'),
                'siswa_telepon'     => $this->input->post('siswa_telepon'),
                'siswa_alamat'      => $this->input->post('siswa_alamat'),
                'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'surat_permohonan'  => $this->input->post('surat_permohonan'),
                'surat_balasan'     => $this->input->post('surat_balasan'),
            );

            $this->M_siswa->update_siswa($update, $siswa_code);
            $this->session->set_flashdata('message', 'Berhasil update data siswa');
            redirect('Guru/view/data-siswa');
        }

        $data['content']    = $content; 
        $this->load->view('template', $data, FALSE);
    }

    function hapus_siswa($siswa_code)
    {
        /*===========================
        =     Load Models M_siswa   =
        ===========================*/
        $this->load->model('M_siswa');
        $cek_query = $this->M_siswa->hapus_siswa($siswa_code);
        if($cek_query){
            $this->session->set_flashdata('message', 'Berhasil Hapus data siswa');
            redirect('Guru/view/data-siswa');
        }else{
            $this->session->set_flashdata('error_message', 'Gagal Hapus data siswa');
            redirect('Guru/view/data-siswa');
        }
    }
}