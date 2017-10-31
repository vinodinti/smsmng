<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/SchoolModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/school-view';
		$this->load->view('template', $data);
	}
	public function data_table(){
		$data['getSchoolDetails'] = $this->SchoolModel->getSchoolDetails();
		$this->load->view('datatable/school/school-data-table-view', $data);
	}
	public function create(){
		$this->load->view('create/school/school-create-view');
	}
	public function update(){
		$SchoolID = $this->input->post('RecID');
		if($SchoolID){
			$data['SchoolInfo'] = $SchoolInfo = $this->SchoolModel->getSchoolInfo($SchoolID);
			$data['CountryList'] = getCountryList();
			if($SchoolInfo->branch_country){
				$data['StateList'] = getStateList($SchoolInfo->branch_country);
			}
			$this->load->view('modify/school/school-modify-view', $data);	
		}else{
			
		}
	}
	private function setModifyDataValidation(){
		$rules = array(
			array(
				'field' => 'schoolid', 
				'label' => 'School ID', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch ID', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'schoolname', 
				'label' => 'School Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'registrationno', 
				'label' => 'School Registration No', 
				'rules' => 'trim|max_length[20]|xss_clean'
			),
			array(
				'field' => 'phoneno', 
				'label' => 'Phone No', 
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'contactno', 
				'label' => 'Contact No', 
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'registername', 
				'label' => 'Register By', 
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'registeremail', 
				'label' => 'Register Email', 
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'gender', 
				'label' => 'Gender', 
				'rules' => 'trim|required|max_length[6]|xss_clean'
			),
			array(
				'field' => 'addressone', 
				'label' => 'Address One', 
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'addresstwo', 
				'label' => 'Address Two', 
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pin', 
				'label' => 'Pin Code', 
				'rules' => 'trim|max_length[6]|xss_clean'
			),
			array(
				'field' => 'country', 
				'label' => 'Country', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'state', 
				'label' => 'State', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'city', 
				'label' => 'City', 
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'schoolstatus', 
				'label' => 'School Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function update_school(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			
			$file_photo_name = "";
			if (!empty($_FILES['uploadlogo']['name'])){
			
				$config['upload_path'] 		= 'storage/school-logo';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg'; 
        		$config['encrypt_name']    	= TRUE;    
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('uploadlogo')){
				
					$image_details = $this->upload->data();
					$file_photo_name = $image_details['file_name'];
					
				} else {
					$response['errors'] = array(
						'uploadlogo'  => $this->upload->display_errors()
					);
					echo json_encode($response);
				}
			}
			
			$UpdateSchoolData = array("school_name"	  	   => $schoolname,
									  "register_full_name" => $registername,
									  "register_email"	   => $registeremail,
									  "gender"	  		   => $gender,
									  "school_status" 	   => $schoolstatus
									);
									
			if($file_photo_name){
				$UpdateSchoolData['school_logo'] = $file_photo_name;
				getDeleteFile("storage/school-logo/".$delpath);
			}
			
			$SchoolBranchData = array('recognition_no' => $registrationno,
									'branch_phone_no1' => $contactno,
									'branch_phone_no2' => $phoneno,
									'branch_address1'  => $addressone,
									'branch_address2'  => $addresstwo,
									'branch_country'   => $country,
									'branch_state'     => $state,
									'branch_city'      => $city,
									'branch_pin'       => $pin,
									'branch_modify_by' => $this->MemberID,
									'branch_modify_on' => date('Y-m-d H:i:s'),
									'branch_status'	   => $schoolstatus
									);
			$SchooBranchID  =	array("schoolID" => $schoolid,
									  "branchID" =>	$branchid
									);
									
			$ResultStatus = $this->SchoolModel->modifySchool($UpdateSchoolData, $SchoolBranchData, $SchooBranchID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated School Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated School Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated School Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated School Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function getState(){
		$CountryID = $this->input->post('ID');
		if($CountryID){
			$StateList = getStateList($CountryID);
			$response = array("subresult" => $StateList,"status"=>true);
		}
		echo json_encode($response);
	}
	
	
}