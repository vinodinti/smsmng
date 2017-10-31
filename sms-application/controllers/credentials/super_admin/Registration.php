<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('credentials/super_admin/RegistrationModel');
	}
	public function index(){
		$data['title']		= 'Dashboard';
		$data['countryList'] = getCountryList();
		$this->load->view('includes/header', $data);
		$this->load->view('credentials/registration', $data);
		$this->load->view('includes/footer', $data);
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'firstname', 
				'label' => 'First Name', 
				'rules' => 'trim|required|xss_clean|max_length[30]'
			), 
			array(
				'field' => 'lastname', 
				'label' => 'Last Name',
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'emailid', 
				'label' => 'Email ID',
				'rules' => 'trim|required|valid_email|max_length[50]|callback__isUserEmailExists|xss_clean'
			),
			array(
				'field' => 'userid', 
				'label' => 'User ID', 
				'rules' => 'trim|required|max_length[40]|callback__isUserIDExists|xss_clean'
			),
			array(
				'field' => 'password',
				'label' => 'Password', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'schoolname', 
				'label' => 'School Name', 
				'rules' => 'trim|required|max_length[250]|xss_clean'
			),
			array(
				'field' => 'registrationno', 
				'label' => 'Registration Number', 
				'rules' => 'trim|max_length[20]|xss_clean'
			),
			array(
				'field' => 'phoneno', 
				'label' => 'Mobile Number', 
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'address', 
				'label' => 'Address1', 
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'address1', 
				'label' => 'Address2', 
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pin', 
				'label' => 'Pin', 
				'rules' => 'trim|min_length[6]|max_length[9]|xss_clean'
			),
			array(
				'field' => 'country',
				'label' => 'Country', 
				'rules' => 'trim|required|min_length[1]|max_length[4]|xss_clean'
			),
			array(
				'field' => 'state',
				'label' => 'State', 
				'rules' => 'trim|required|min_length[1]|max_length[11]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_registration(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			$InsertUserData = array('firstname'		=> $firstname,
									'lastname'		=> $lastname,
									'email'			=> $emailid,
									'user_name'		=> $userid,
									'user_password'	=> sha1(md5("S@ndy110".$password."@Vin112")),
									'created_on'	=> date('Y-m-d H:i:s'),
									'is_active'		=> 1
									);
			//School Info						
			$InsertSchoolData = array('school_name'   => $schoolname,
									  'school_status' => 1
									  );
			//School Address						  
			$InsertAddressData = array('recognition_no'		=> $registrationno,
										'branch_name'		=> 'Main',
										'branch_phone_no1'	=> $phoneno,
										'branch_address1'	=> $address,
										'branch_address2'	=> $address1,
										'branch_pin'		=> $pin,
										'branch_country'	=> $country,
										'branch_state'		=> $state,
										'branch_type'		=> 'M',
										'branch_create_on'  => date('Y-m-d H:i:s'),
										'branch_status'		=> 1
										);
			$ResultStatus = $this->RegistrationModel->createRegistration($InsertUserData, $InsertSchoolData, $InsertAddressData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Registration Successfully Completed!');
				$response = array('status' => true, 
								  'message' => 'Registration Successfully Completed!',
								  'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Registration Fail!');
				$response = array('status' => 2, 'message' => 'Registration Fail!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function get_state_list(){
		if($this->input->post('ID')){
			$Result = array("subresult"=>getStateList($this->input->post('ID')),"status"=>1);
		}else{
			 $Result = array("subresult"=>array(),"status"=>0);
		}
		echo json_encode($Result);
	}
	public function _isUserEmailExists($key = NULL){
		if($key){
			$UserEmailID = array('email'=>$key);
			$Result = $this->RegistrationModel->checkUserIDEmailID($UserEmailID);
			if($Result > 0){
				$this->form_validation->set_message('_isUserEmailExists', "Email ID already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	public function _isUserIDExists($key = NULL){
		if($key){
			$UserID = array('user_name'=>$key);
			$Result = $this->RegistrationModel->checkUserIDEmailID($UserID);
			if($Result > 0){
				$this->form_validation->set_message('_isUserIDExists', "User ID already Exists!");
				return FALSE;
			}return TRUE;
		}
	}

	
}