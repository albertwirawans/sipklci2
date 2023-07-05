<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	
	public function __construct()
	{
		parent::__construct();
		//Cek apapkah sudah memiliki Session
		
		//Do your magic here
	}
	
	public function index()
	{
		if($this->session->userdata('userdata')){
			$userdata = $this->session->userdata('userdata');
			//Cek level user
			if($userdata['level'] == 1){
				//Administrator
				redirect('administrator/view/');

			}elseif($userdata['level'] == 2){
				//Guru 
				redirect('guru/view/');
			}
		}
		$this->load->view('authentication/login');
	}

	public function do_login()
	{
		$status = true;
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$status = false;
		}
		
		if($status){
			//Load Models
			$this->load->model('Login');
			$data_login = array(
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password')
			);
			
			$cekk = $this->Login->cek_login($data_login);
	
			if($cekk){
				echo "success, mohon tunggu sebentar";
				$user_login = array(
					'userdata'	=> array(
						'id'			=> $cekk->id,
						'username'		=> $cekk->username,
						'nama_lengkap'	=> $cekk->nama_lengkap,
						'level'			=> $cekk->level,
						'group_name'	=> $cekk->group_name
					),
				);

				$this->session->set_userdata($user_login);
				redirect('', 'refresh');
				
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning">Username atau Password salah</div>');
				$this->load->view('authentication/login');
				// echo "<script>alert('Username dan password salah');</script>";
				// redirect('', 'refresh');
			}
		
		}else{
			$this->load->view('authentication/login');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('userdata');
		redirect('');
	}

	function information()
	{
		$data['content']	= 'information';
		$this->load->view('template', $data);
	}
}
