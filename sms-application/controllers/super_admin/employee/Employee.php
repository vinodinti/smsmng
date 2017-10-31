<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/employee/EmployeeModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'employee/employee-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		
		$EmployeeID = $this->input->post('RecID');
		if($EmployeeID){
			$data['Employee'] = $this->EmployeeModel->getEmployeeSignInfo($EmployeeID);
			$data['EmployeeInfo'] = $EmpBranchDeptPostID = $this->EmployeeModel->getEmployeeInfo($EmployeeID);
			
			if($EmpBranchDeptPostID->branch_fk_id){
			$this->load->model('super_admin/school/BranchModel');
		    $data['BranchName'] = $this->BranchModel->getBranchInfo($EmpBranchDeptPostID->branch_fk_id);
			}
			if($EmpBranchDeptPostID->department_fk_id){
			$this->load->model('super_admin/school/DepartmentModel');
			$data['DepartmentName'] = $this->DepartmentModel->getDepartmentInfo($EmpBranchDeptPostID->department_fk_id);
			}
			if($EmpBranchDeptPostID->department_posts_fk_id){
			$this->load->model('super_admin/school/DepartmentPostModel');
			$data['DepartmentPostName'] = $this->DepartmentPostModel->getDepartmentPostInfo($EmpBranchDeptPostID->department_posts_fk_id);
			}
			
			$data['EmployeeAddress'] = $this->EmployeeModel->getEmployeeAddressInfo($EmployeeID);
			$data['EmployeeDocuments'] = $this->EmployeeModel->getEmployeeDocumentInfo($EmployeeID);
			$this->load->view('preview/employee/employee-data-preview', $data);	
		}
		
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$EmployeeDetails = $this->EmployeeModel->getEmployeeDetails($PerPage, $Offset);
		$RowsCount = $this->EmployeeModel->getEmployeeDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($EmployeeDetails), "total"=> $RowsCount,
					"rows"=>$EmployeeDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		$data['getEmployeeDetails'] = $this->EmployeeModel->getEmployeeDetails();
		$this->load->view('datatable/employee/employee-data-table-view', $data);
	}
	public function create(){
		$data['EmployeeCustomID'] = $this->EmployeeModel->getEmployeeCustomID();
		$data['CountryList'] = getCountryList();
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->model('super_admin/school/subjectsmodel');
		$data['SubjectList'] = $this->subjectsmodel->getSubjectsList();
		$this->load->view('create/employee/employee-create-view', $data);
	}
	public function _isEmployeeCustomIDExists($key = NULL){
		if($key){
			$EmployeeCustomID = array('employee_custom_id' => $key);
			$Result = $this->EmployeeModel->checkEmployeeCustomID($EmployeeCustomID);
			if($Result > 0){
				$this->form_validation->set_message('_isEmployeeCustomIDExists', "Employee ID already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	public function _isEmployeeEmailIDExists($key = NULL){
		if($key){
			$EmployeeEmailID = array('employee_email' => $key);
			$Result = $this->EmployeeModel->checkEmployeeEmailID($EmployeeEmailID);
			if($Result > 0){
				$this->form_validation->set_message('_isEmployeeEmailIDExists', "Employee Email ID already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'departmentid', 
				'label' => 'Department Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'departmentpostid', 
				'label' => 'Department Post Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'employeetype', 
				'label' => 'Employee Type',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'subjects', 
				'label' => 'Subjects',
				'rules' => 'trim|xss_clean'
			),
			array(
				'field' => 'firstname', 
				'label' => 'First Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'middlename', 
				'label' => 'Middle Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'lastname', 
				'label' => 'last Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'gender', 
				'label' => 'Gender',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			),
			array(
				'field' => 'dob', 
				'label' => 'Date Of Birth',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'mobileno', 
				'label' => 'Mobile No',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'contactno', 
				'label' => 'Contact No',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'specification', 
				'label' => 'Specification',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'qualifiacation', 
				'label' => 'Qualifiacation',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'religion', 
				'label' => 'Religion',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'employeeid',
				'label' => 'Custom Employee ID',
				'rules' => 'trim|required|max_length[100]|callback__isEmployeeCustomIDExists|xss_clean'
			),
			array(
				'field' => 'emailid', 
				'label' => 'Email ID',
				'rules' => 'trim|required|max_length[100]|callback__isEmployeeEmailIDExists|xss_clean'
			),
			array(
				'field' => 'password', 
				'label' => 'Password',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'joindate', 
				'label' => 'Join date',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			/*array(
				'field' => 'uploadphoto', 
				'label' => 'Upload Photo',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),*/
			
			array(
				'field' => 'fathername', 
				'label' => 'Father Name',
				'rules' => 'trim|required|max_length[12]|xss_clean'
			),
			array(
				'field' => 'mothernname', 
				'label' => 'Mother Name',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'contactpersonname', 
				'label' => 'Contact Person Name',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'contactpersonmobileno', 
				'label' => 'Contact Person Mobile No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'contactpersonrelation', 
				'label' => 'Contact Person Relation',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'maritalstatus', 
				'label' => 'Marital Status',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'spousename', 
				'label' => 'Spouse Name',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'noofchildren', 
				'label' => 'No Of Children',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'anniversarydate', 
				'label' => 'Anniversary Date',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'paddressone', 
				'label' => 'Address 1',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'paddressone', 
				'label' => 'Address 1',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'paddresstwo', 
				'label' => 'Address 2',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'ppin', 
				'label' => 'Pin Code',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pcountry', 
				'label' => 'Country',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pstate', 
				'label' => 'State',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pcity', 
				'label' => 'City',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'taddressone', 
				'label' => 'Address 1',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'taddresstwo', 
				'label' => 'Address 2',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tpin', 
				'label' => 'Pin Code',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tcountry', 
				'label' => 'Country',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tstate', 
				'label' => 'State',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tcity', 
				'label' => 'City',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'aadharno', 
				'label' => 'Aadhar No',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'pancardno', 
				'label' => 'PAN Card No',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'employeestatus', 
				'label' => 'Employee Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_employee(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//DepartmentData Info
			
			$file_photo_name = "";
			if (!empty($_FILES['uploadphoto']['name'])){
			
				$config['upload_path'] 		= 'storage/staff-photos';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg'; 
        		$config['encrypt_name']    	= TRUE;    
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('uploadphoto')){
					$image_details = $this->upload->data();
					$file_photo_name = $image_details['file_name'];	
				} else {
					$response['errors'] = array(
						'uploadphoto'  => $this->upload->display_errors()
					);
					echo json_encode($response);
				}
			}
			
			$InsertEmployeeData = array('employee_type'=>$employeetype,
										'employee_first_name'=>$firstname,
										'employee_middle_name'=>$middlename,
										'employee_last_name'=> $lastname,
										'employee_gender'=> $gender,
										'employee_dob'=>DateDmY_to_Ymd($dob),
										'employee_mobile_no'=>$mobileno,
										'employee_contact_no'=>$contactno,
										'employee_specification'=>$specification,
										'employee_qualifiacation'=>$qualifiacation,
										'employee_photo'=>$file_photo_name,
										'employee_religion'=>$religion,
										'employee_join_on'=>DateDmY_to_Ymd($joindate),
										'employee_father_name'=>$fathername,
										'employee_mother_name'=>$mothernname,
										'employee_marital_status'=>$maritalstatus,
										'employee_anniversary_date'=>DateDmY_to_Ymd($anniversarydate),
										'employee_spouse_name'=>$spousename,
										'employee_no_of_children'=>$noofchildren,
										'employee_contact_person_name'=>$contactpersonname,
										'employee_contact_person_mobile_no'=>$contactpersonmobileno,
										'employee_contact_person_relation'=>$contactpersonrelation,
										'branch_fk_id'=> $branchid,
										'department_fk_id'=>$departmentid,
										'department_posts_fk_id'=>$departmentpostid,
										'employee_create_by'=> $this->MemberID,
										'employee_create_on'=> date('Y-m-d H:i:s'),
										'employee_aadhar_no'=> $aadharno,
										'employee_pan_card_no'=> $pancardno,
										'employee_is_status'=> $employeestatus
									);
									
			$EmployeeCustomID = $this->EmployeeModel->getEmployeeCustomID();
			
			$InsertEmployeeLoginData = array('employee_email'	 => $emailid,
											'employee_custom_id' => $EmployeeCustomID,
											'employee_password'=> sha1(md5("S@ndy110".$password."@Vin112")),
											'employee_is_active'=>$employeestatus
											);
												
			$InsertEmployeeAddress	=   array(	
											array('employee_address_type'=>'P',
												 'employee_address_one'=>$paddressone,
												 'employee_address_two'=>$paddresstwo,
												 'employee_country'=>$pcountry,
												 'employee_state'=>$pstate,
												 'employee_city'=>$pcity,
												 'employee_pincode'=>$ppin,
												 'employee_create_by'=>$this->MemberID,
												 'employee_create_on'=>date('Y-m-d H:i:s'),
												 'employee_address_is_active'=>$employeestatus
											),
											array('employee_address_type'=>'T',
												'employee_address_one'=> $taddressone,
												'employee_address_two'=>$taddresstwo,
												'employee_country'=>$tcountry,
												'employee_state'=>$tstate,
												'employee_city'=>$pcity,
												'employee_pincode'=>$tpin,
												'employee_create_by'=>$this->MemberID,
												'employee_create_on'=>date('Y-m-d H:i:s'),
												'employee_address_is_active'=>$employeestatus
											)
										);
			
			$ResultStatus = $this->EmployeeModel->createEmployee($InsertEmployeeData, $InsertEmployeeLoginData, $InsertEmployeeAddress, $subjects);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Employee Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Employee Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Employee Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Employee Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$EmployeeID = $this->input->post('RecID');
		if($EmployeeID){
			$data['CountryList'] = getCountryList();
			$this->load->model('super_admin/school/BranchModel');
			$data['BranchList'] = $this->BranchModel->getBranchList();
			
			$data['Employee'] = $this->EmployeeModel->getEmployeeSignInfo($EmployeeID);
			$data['EmployeeInfo'] = $EmpBranchDeptPostID = $this->EmployeeModel->getEmployeeInfo($EmployeeID);
			$data['EmployeeAddress'] = $this->EmployeeModel->getEmployeeAddressInfo($EmployeeID);
			
			if($EmpBranchDeptPostID->branch_fk_id){
		    $data['BranchName'] = $this->BranchModel->getBranchInfo($EmpBranchDeptPostID->branch_fk_id);
			}
			if($EmpBranchDeptPostID->department_fk_id){
			$this->load->model('super_admin/school/DepartmentModel');
			$data['DepartmentName'] = $this->DepartmentModel->getDepartmentInfo($EmpBranchDeptPostID->department_fk_id);
			}
			if($EmpBranchDeptPostID->department_posts_fk_id){
			$this->load->model('super_admin/school/DepartmentPostModel');
			$data['DepartmentPostName'] = $this->DepartmentPostModel->getDepartmentPostInfo($EmpBranchDeptPostID->department_posts_fk_id);
			}
			$this->load->view('modify/employee/employee-modify-view', $data);	
		}
	}
	public function update_employee(){
		$EmployeeID = $this->input->post('RecID');
		if($EmployeeID){
			$data['Employee'] = $this->EmployeeModel->getEmployeeSignInfo($EmployeeID);
			$data['EmployeeInfo'] = $EmpBranchDeptPostID = $this->EmployeeModel->getEmployeeInfo($EmployeeID);
			
			if($EmpBranchDeptPostID->branch_fk_id){
			$this->load->model('super_admin/school/BranchModel');
		    $data['BranchName'] = $this->BranchModel->getBranchInfo($EmpBranchDeptPostID->branch_fk_id);
			}
			if($EmpBranchDeptPostID->department_fk_id){
			$this->load->model('super_admin/school/DepartmentModel');
			$data['DepartmentName'] = $this->DepartmentModel->getDepartmentInfo($EmpBranchDeptPostID->department_fk_id);
			}
			if($EmpBranchDeptPostID->department_posts_fk_id){
			$this->load->model('super_admin/school/DepartmentPostModel');
			$data['DepartmentPostName'] = $this->DepartmentPostModel->getDepartmentPostInfo($EmpBranchDeptPostID->department_posts_fk_id);
			}
			
			$data['EmployeeAddress'] = $this->EmployeeModel->getEmployeeAddressInfo($EmployeeID);
			$data['EmployeeDocuments'] = $this->EmployeeModel->getEmployeeDocumentInfo($EmployeeID);
			$this->load->view('preview/employee/employee-modify-view', $data);	
		}
	}
	public function getState(){
		$CountryID = $this->input->post('ID');
		if($CountryID){
			$StateList = getStateList($CountryID);
			$response = array("subresult" => $StateList,"status"=>true);
		}
		echo json_encode($response);
	}
	public function getEmployeeAssignSubjects(){
		$SubjectID = $this->input->post('ID');
		if($SubjectID){
			$EmployeeAssignSubjects = $this->EmployeeModel->getEmployeeAssignSubjects($SubjectID);
			$response = array("subresult" => $EmployeeAssignSubjects, "status"=>true);
		}
		echo json_encode($response);
	}
	public function delete(){
		$EmployeeRecIDS = $this->input->post("recid");
		if(!empty($EmployeeRecIDS)){
			$ResultStatus = $this->EmployeeModel->deleteEmployee($EmployeeRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Employee Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Employee Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$EmployeeRecIDS = $this->input->post("recid");
		if(!empty($EmployeeRecIDS)){
			$ResultStatus = $this->EmployeeModel->trashEmployee($EmployeeRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Employee Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Employee Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Information!');
		}
		echo json_encode($response);
	}
	
}