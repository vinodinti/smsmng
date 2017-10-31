<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller{
	function __construct(){
        parent::__construct();
		$this->load->model('users/SigninModel');
    }
	public function index(){
		$this->load->view('users/credentials/login');
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'emailid', 
				'label' => 'Email ID',
				'rules' => 'trim|required|valid_email|max_length[50]|xss_clean'
			),
			array(
				'field' => 'password',
				'label' => 'Password', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			)
		);
		return $rules;
	}
	public function check_login(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			$LoginData = array('emailid'	=> $emailid,
							   'password'	=> sha1(md5("S@ndy110".$password."@Vin112"))
							   );
			$UserInfo = $this->SigninModel->checkLogin($LoginData);
			if($UserInfo){
				$this->_SetSessionData($UserInfo);
				$this->session->set_flashdata('success_message', 'Login Successfull!');
				redirect(base_url()."users/dashboard");
			}else{
				$this->session->set_flashdata('error_message', 'Login Fail!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
		$this->load->view('users/credentials/login');
	}
	private function _SetSessionData($UserInfo = NULL){
		$SessionData = array(
			'is_logged_in'		=> TRUE,
			'member_id'			=> $UserInfo->student_fk_id,
			'member_full_name'  => $UserInfo->student_first_name ." ". $UserInfo->student_middle_name ." ". $UserInfo->student_last_name,
			'member_email'	 	=> $UserInfo->student_email,
			'member_photo'	 	=> $UserInfo->student_photo,
			'member_type_id' 	=> "",
			'member_type' 	 	=> "STUDENT"
		);
		$this->session->set_userdata($SessionData);
	}	
		
}