<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_terapi extends CI_Controller {

	public function __construct() {
		parent::__construct();


		$this->load->model('Jenisterapi_model');
		$this->load->model('Pegawai_model');
	}
	

	public function index() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$data['terapi'] = $this->Jenisterapi_model->getAllJenisTerapi();
		$this->load->view('admin/V_jenis_terapi', $data);
	}

	public function tambah() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$this->load->view('admin/V_tambah_jenisterapi',$data);
	}

	public function doTambah() {
		$this->form_validation->set_rules('jenis_terapi', 'Jenis Terapi', 'required', 
									array('required' 	=> 'Jenis Terapi Harus di Input'));

		$this->form_validation->set_rules('biaya_terapi', 'Biaya Terapi', 'required|numeric',
									array('required'	=> 'Biaya Terapi Harus di Input',
										  'numeric'		=> 'Biaya Terapi Harus Angka'));

		if($this->form_validation->run() === FALSE) {
			$this->tambah();
		} else {
			$data = array('jenis_terapi'	=> $this->input->post('jenis_terapi'),
						  'biaya_terapi'	=> $this->input->post('biaya_terapi'));

			$this->Jenisterapi_model->insertJenisTerapi($data);

			$this->session->set_flashdata('sukses', 'Jenis Terapi Berhasil di Tambah');

			redirect(site_url('admin/jenis_terapi/tambah'));


		}
	}

	public function edit($id_jenisterapi) {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$data['terapi'] = $this->Jenisterapi_model->getJenisTerapiById($id_jenisterapi);
		$this->load->view('admin/V_edit_jenisterapi', $data);
	}
	public function delete($id_jenisterapi) {
		$data['terapi'] = $this->Jenisterapi_model->deleteJenisTerapi($id_jenisterapi);
		redirect('admin/jenis_terapi');
	}

	public function doUpdate() {

		$this->form_validation->set_rules('jenis_terapi', 'Jenis Terapi', 'required', 
									array('required' 	=> 'Jenis Terapi Harus di Input'));

		$this->form_validation->set_rules('biaya_terapi', 'Biaya Terapi', 'required|numeric',
									array('required'	=> 'Biaya Terapi Harus di Input',
										  'numeric'		=> 'Biaya Terapi Harus Angka'));

		if($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$id = $this->input->post('id_jenisterapi');

			$data = array('jenis_terapi'	=> $this->input->post('jenis_terapi'),
						  'biaya_terapi'	=> $this->input->post('biaya_terapi'));

			$this->Jenisterapi_model->updateJenisTerapi($id, $data);

			$this->session->set_flashdata('sukses', 'Jenis Terapi Berhasil di Update');

			redirect(site_url('admin/jenis_terapi'));


		}
	}

	
}