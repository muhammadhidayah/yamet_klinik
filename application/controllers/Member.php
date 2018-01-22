<?php
	/**
	* 
	*/
	class Member extends CI_Controller	{
		
		public function index(){
			$this->load->model('Client_model');
			$this->load->database('Client_model');
			$data ['query'] = $this->Client_model->getdataclient();
			$this->load->view('V_member',$data);
		}

		




		function logout(){
			
			$this->session->sess_destroy();
			redirect('auth/client');
		}
	}
  ?> 