<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_user') != 'admin' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth/pegawai'));
		}


		$this->load->model('User_model');
		$this->load->model('Client_model');
		$this->load->model('Pegawai_model');

	}

	public function index() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$data ['query'] = $this->Client_model->getAllClient();
		$this->load->view('admin/V_client',$data);
	}

	public function tambah_client() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$this->load->view('admin/V_tambah_client',$data);
	}

	public function editClient($id_client) {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$data['client'] = $this->Client_model->getClientById($id_client);
		$this->load->view('admin/V_edit_client', $data);
	}


	// FUNGSI YANG DIGUNAKAN UNTUK RESET PASSWORD CLIENT
	public function resetPassword($id_client) {
		$client = $this->Client_model->getClientById($id_client);

		$password = $this->random_password();

		$data = array('id_client' 		=> $id_client,
					  'password_client' => $password);


		$email_client = $client->email_client;

		$this->Client_model->updateDataClient($id_client, $data);

		redirect(site_url('admin/client'));
	}

	public function updateStatus($id_client) {
		$client = $this->Client_model->getClientById($id_client);
		$status_client = "";

		if($client->status_client == "aktif") {
			$status_client = "nonaktif";
		} else {
			$status_client = "aktif";
		}

		$data = array('id_client' 		=> $id_client,
					  'status_client' 	=> $status_client);

		$this->Client_model->updateDataClient($id_client, $data);

		redirect(site_url('admin/client'));
	}

	public function insertClient() {

		$this->form_validation->set_rules('nama_client', 'Nama Panggilan', 'required', 
									array('required' => 'Nama Panggilan Client Harus di Input'));

		$this->form_validation->set_rules('namapanggilan_client', 'Nama Lengkap', 'required', 
									array('required' => 'Nama Lengkap Client Harus di Input'));

		$this->form_validation->set_rules('tgllahir_client', 'Tanggal Lahir Client', 'required', 
									array('required' => 'Tanggal Lahir Harus di Input'));

		$this->form_validation->set_rules('templahir_client', 'Tempat Lahir', 'required', 
									array('required' => 'Tempat Lahir Harus di Input'));

		$this->form_validation->set_rules('diagnosis_client', 'Diagnosis Client', 'required', 
									array('required' => 'Diagnosis Client Harus di Input'));

		$this->form_validation->set_rules('sekolah_client', 'Sekolah Client', 'required', 
									array('required' => 'Sekolah Client Harus di Input'));

		$this->form_validation->set_rules('notelp_client', 'Nomor Telepon Client', 'required|numeric', 
									array('required' => 'Nomor Telepon Harus di Isi', 
										  'numeric' => 'Nomor Telepon Harus Berupa Angka'));

		$this->form_validation->set_rules('email_client', 'E-mail Client', 'required|valid_email|is_unique[tbl_client.email_client]', 
									array('required' => 'Email Harus di Input', 
										  'valid_email' => 'Harap Input Email Yang Valid',
										  'is_unique' => 'E-mail Sudah di Gunakan, Mohon untuk menggunakan yang lain'));

		$this->form_validation->set_rules('nama_ayahclient', 'Nama Ayah Client', 'required', 
									array('required' => 'Nama Ayah Client Harus di Input'));

		$this->form_validation->set_rules('nama_ibuclient', 'Nama Ibu Client', 'required', 
									array('required' => 'Nama Ibu Client Harus di Input'));

		$this->form_validation->set_rules('password_client', 'Password Login Client', 'required', 
									array('required' => 'Password Login Client Harus di Isi'));

		$this->form_validation->set_rules('alamat_client', 'Alamat Client', 'required', 
									array('required' => 'Alamat Client Harus di Input'));

		if($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			//Memasukkan Data ke tabel User
			$password = $this->random_password();

			$tgl = $this->input->post('tgllahir_client');

			$tgllahir = date("Y-m-d",strtotime(substr($tgl,0,10)));

			$email_client = $this->input->post('email_client');

			$datamember = array('nama_client' 			=> $this->input->post('nama_client'),
								'namapanggilan_client' 	=> $this->input->post('namapanggilan_client'),
								'tgllahir_client' 		=> $tgllahir,
								'templahir_client' 		=> $this->input->post('templahir_client'),
								'diagnosis_client' 		=> $this->input->post('diagnosis_client'),
								'jk_client'				=> $this->input->post('jk_client'),
								'sekolah_client' 		=> $this->input->post('sekolah_client'),
								'nama_ayahclient' 		=> $this->input->post('nama_ayahclient'),
								'nama_ibuclient' 		=> $this->input->post('nama_ibuclient'),
								'alamat_client' 		=> $this->input->post('alamat_client'),
								'notelp_client' 		=> $this->input->post('notelp_client'),
								'email_client'			=> $this->input->post('email_client'),
								'agama_client'			=> $this->input->post('agama_client'),
								'catatankhusus_client'	=> $this->input->post('catatankhusus_client'),
								'password_client'		=> $password);

			$this->Client_model->insertClient($datamember);
			$this->sendEmailToClient($email_client, $password);
			echo "Mantappp";

		}
		redirect('admin/client');

	}

	public function updateClient() {
		$this->form_validation->set_rules('nama_client', 'Nama Panggilan', 'required', 
									array('required' => 'Nama Panggilan Client Harus di Input'));

		$this->form_validation->set_rules('namapanggilan_client', 'Nama Lengkap', 'required', 
									array('required' => 'Nama Lengkap Client Harus di Input'));

		$this->form_validation->set_rules('tgllahir_client', 'Tanggal Lahir Client', 'required', 
									array('required' => 'Tanggal Lahir Harus di Input'));

		$this->form_validation->set_rules('templahir_client', 'Tempat Lahir', 'required', 
									array('required' => 'Tempat Lahir Harus di Input'));

		$this->form_validation->set_rules('diagnosis_client', 'Diagnosis Client', 'required', 
									array('required' => 'Diagnosis Client Harus di Input'));

		$this->form_validation->set_rules('sekolah_client', 'Sekolah Client', 'required', 
									array('required' => 'Sekolah Client Harus di Input'));

		$this->form_validation->set_rules('notelp_client', 'Nomor Telepon Client', 'required|numeric', 
									array('required' => 'Nomor Telepon Harus di Isi', 
										  'numeric' => 'Nomor Telepon Harus Berupa Angka'));

		$this->form_validation->set_rules('nama_ayahclient', 'Nama Ayah Client', 'required', 
									array('required' => 'Nama Ayah Client Harus di Input'));

		$this->form_validation->set_rules('nama_ibuclient', 'Nama Ibu Client', 'required', 
									array('required' => 'Nama Ibu Client Harus di Input'));

		$this->form_validation->set_rules('alamat_client', 'Alamat Client', 'required', 
									array('required' => 'Alamat Client Harus di Input'));

		if($this->form_validation->run() === FALSE) {
			$id_client = $this->input->post('id_client');
			$this->editClient($id_client);
		} else {
			$tgl = $this->input->post('tgllahir_client');

			$tgllahir = date("Y-m-d",strtotime(substr($tgl,0,10)));

			$id_client = $this->input->post('id_client');
			$datamember = array();

			if($this->input->post('password_client') != "") {
				$datamember = array(
								'nama_client' 			=> $this->input->post('nama_client'),
								'namapanggilan_client' 	=> $this->input->post('namapanggilan_client'),
								'tgllahir_client' 		=> $tgllahir,
								'templahir_client' 		=> $this->input->post('templahir_client'),
								'diagnosis_client' 		=> $this->input->post('diagnosis_client'),
								'jk_client'				=> $this->input->post('jk_client'),
								'sekolah_client' 		=> $this->input->post('sekolah_client'),
								'nama_ayahclient' 		=> $this->input->post('nama_ayahclient'),
								'nama_ibuclient' 		=> $this->input->post('nama_ibuclient'),
								'alamat_client' 		=> $this->input->post('alamat_client'),
								'notelp_client' 		=> $this->input->post('notelp_client'),
								'email_client'			=> $this->input->post('email_client'),
								'agama_client'			=> $this->input->post('agama_client'),
								'catatankhusus_client'	=> $this->input->post('catatankhusus_client'),
								'password_client'		=> $this->input->post('password_client'));
			} else {
				$datamember = array(
								'nama_client' 			=> $this->input->post('nama_client'),
								'namapanggilan_client' 	=> $this->input->post('namapanggilan_client'),
								'tgllahir_client' 		=> $tgllahir,
								'templahir_client' 		=> $this->input->post('templahir_client'),
								'diagnosis_client' 		=> $this->input->post('diagnosis_client'),
								'jk_client'				=> $this->input->post('jk_client'),
								'sekolah_client' 		=> $this->input->post('sekolah_client'),
								'nama_ayahclient' 		=> $this->input->post('nama_ayahclient'),
								'nama_ibuclient' 		=> $this->input->post('nama_ibuclient'),
								'alamat_client' 		=> $this->input->post('alamat_client'),
								'notelp_client' 		=> $this->input->post('notelp_client'),
								'agama_client'			=> $this->input->post('agama_client'),
								'catatankhusus_client'	=> $this->input->post('catatankhusus_client'),
								'email_client'			=> $this->input->post('email_client'));	
			}			

			$this->Client_model->updateDataClient($id_client, $datamember);
		}

		redirect('admin/client');
	}

	function sendEmailToClient($email_client, $password) {
		$config = Array(  
		    'protocol' => 'smtp',  
		    'smtp_host' => 'ssl://smtp.googlemail.com',  
		    'smtp_port' => 465,  
		    'smtp_user' => 'masrony37@gmail.com',   
		    'smtp_pass' => 'jregenahsate',   
		    'mailtype' => 'html',   
		    'charset' => 'iso-8859-1'  
	   	);  

		$this->load->library('email', $config);  
		$this->email->set_newline("\r\n");  
		$this->email->from('masrony37@gmail.com', 'Admin Re:Code');   
		$this->email->to($email_client);   
		$this->email->subject('Yamet Account');   
		$this->email->message('Berikut Password Yamet anda:'. $password);
	   
	   if (!$this->email->send()) {  
	    show_error($this->email->print_debugger());   
	   }else{  
	    echo 'Success to send email';   
	   }  
	}


	function random_password() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $password = array(); 
	    $alpha_length = strlen($alphabet) - 1; 

	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alpha_length);
	        $password[] = $alphabet[$n];
	    }

	    return implode($password); 
	}

}
?>
