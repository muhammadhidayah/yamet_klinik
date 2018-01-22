<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pegawai_model');
		$this->load->model('Client_model');

	}
		
	public function index(){
		$this->load->view('V_login');
	}

	public function pegawai() {
		$this->load->view('V_login_pegawai');
	}

	public function client() {
		$this->load->view('V_login_client');
	}

	public function pegawaiLogin() {
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username Harus di Input'));

		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password Harus di Isi'));

		if($this->form_validation->run() ===  FALSE) {
			$this->index();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$login = $this->Pegawai_model->getLoginPegawai($username, $password);

			if(count($login) > 0) {

				$datasess = array('username' 			=> $login->username_pegawai,
			    				  'level'				=> $login->level_login,
			    				  'id_pegawai' 			=> $login->id_pegawai,
			    				  'logged_in' 			=> TRUE);

				$this->session->set_userdata($datasess);

				switch ($login->level_login) {
					case 'owner':
						redirect(site_url('owner/dashboard'));
						break;
					case 'admin':
							redirect(site_url('admin/dashboard'));
						break;
					case 'terapis':
							redirect(site_url('terapis/dashboard'));
						break;
					default:
						# code...
						break;
				}
			} else {
				$this->session->set_flashdata('msg', 'Username dan Password Salah!');
				redirect(site_url('auth/pegawai'));
			}
		}
	}

	public function clientLogin() {
		$this->form_validation->set_rules('email_client', 'E-mail Client', 'required|valid_email',
									array('required' 	=> 'E-mail Client Harus di Isi',
										  'valid_email'	=> 'E-mail Harus Valid'));
		$this->form_validation->set_rules('password_client', 'Password Client', 'required',
									array('required'	=> 'Password Harus di Isi'));

		if($this->form_validation->run() ===  FALSE) {
			$this->client();
		} else {
			$email = $this->input->post('email_client');
			$password = $this->input->post('password_client');

			$datalogin = $this->Client_model->getLoginClient($email, $password);

			if($datalogin->status_client == "nonaktif") {
				$this->session->set_flashdata('msg', 'User ini telah di non-aktifkan. Harap menghubungi CS/Admin Yamet Klinik untuk pengaktifan kembali akun');
				redirect(site_url('auth/client'));
				die();
			}

			if(count($datalogin) > 0) {
				$datasess = array('id_client' 		=> $datalogin->id_client, 
								  'nama_client' 	=> $datalogin->nama_client, 
								  'gambar_client' 	=> $datalogin->gambar_client, 
								  'logged_in' => TRUE);

				$this->session->set_userdata($datasess);

				redirect(site_url('client/dashboard'));
			} else {
				$this->session->set_flashdata('msg', 'E-mail dan Password Client Salah');
				redirect(site_url('auth/client'));
			}
		}
	}

	public function logOut() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', 'Anda Telah Berhasil Logout!');
		redirect(site_url('home'));
	}
}
