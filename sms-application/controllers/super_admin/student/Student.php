<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/student/StudentModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'student/student-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$StudentID = $this->input->post('RecID');
		if($StudentID){
			$data['StudentInfo'] = $StudentBranchID = $this->StudentModel->getStudentInfo($StudentID);
			$data['StudentPersonalInfo'] = $this->StudentModel->getStudentPersonalInfo($StudentID);
			if($StudentBranchID->branch_fk_id){
			$this->load->model('super_admin/school/BranchModel');
		    $data['BranchName'] = $this->BranchModel->getBranchInfo($StudentBranchID->branch_fk_id);
			}
			$data['StudentAddress'] = $this->StudentModel->getStudentAddressInfo($StudentID);
			$data['StudentDocuments'] = $this->StudentModel->getStudentDocumentInfo($StudentID);
			$this->load->view('preview/student/student-data-preview', $data);	
		}
		
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$StudentDetails = $this->StudentModel->getStudentDetails($PerPage, $Offset);
		$RowsCount = $this->StudentModel->getStudentDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($StudentDetails), "total"=> $RowsCount,
					"rows"=>$StudentDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		//$data['getStudentDetails'] = $this->StudentModel->getStudentDetails();
		$this->load->view('datatable/student/student-data-table-view');
	}
	public function create(){
		$data['StudentCustomID'] = $this->StudentModel->getStudentCustomID();
		$data['CountryList'] = getCountryList();
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		
		$this->load->model('super_admin/school/BatchModel');
		$data['BatchDetails'] = $this->BatchModel->getBatchDetails();
		$this->load->view('create/student/student-create-view', $data);
	}
	public function _isStudentCustomIDExists($key = NULL){
		if($key){
			$StudentCustomID = array('student_custom_id' => $key);
			$Result = $this->StudentModel->checkStudentCustomID($StudentCustomID);
			if($Result > 0){
				$this->form_validation->set_message('_isStudentCustomIDExists', "Student ID already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	public function _isStudentEmailIDExists($key = NULL){
		if($key){
			$StudentEmailID = array('student_email' => $key);
			$Result = $this->StudentModel->checkStudentEmailID($StudentEmailID);
			if($Result > 0){
				$this->form_validation->set_message('_isStudentEmailIDExists', "Student Email ID already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'sectionname', 
				'label' => 'Section Name',
				'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
				'field' => 'medium', 
				'label' => 'Medium',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'admissiondate', 
				'label' => 'Admission On',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'admissionnumber', 
				'label' => 'Admission Number',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batch', 
				'label' => 'Batch',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'firstname', 
				'label' => 'First Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'middlename', 
				'label' => 'Middle Name',
				'rules' => 'trim|max_length[50]|xss_clean'
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
				'field' => 'castename', 
				'label' => 'Cast',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'subcastename', 
				'label' => 'Cast',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'dob', 
				'label' => 'Date Of Birth',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'religion', 
				'label' => 'Religion',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'studentmobileno', 
				'label' => 'Student Mobile No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'aadharno', 
				'label' => 'Aadhar No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'socioeconomicalstatus', 
				'label' => 'Socio Economical Status',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'familyincome', 
				'label' => 'Family Income',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'bloodgroup', 
				'label' => 'Blood Group',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'height', 
				'label' => 'Height',
				'rules' => 'trim|required|max_length[4]|xss_clean'
			),
			array(
				'field' => 'weight', 
				'label' => 'Weight',
				'rules' => 'trim|required|max_length[3]|xss_clean'
			),
			array(
				'field' => 'distanceschooltohome', 
				'label' => 'Distance School To Home',
				'rules' => 'trim|required|max_length[6]|xss_clean'
			),
			array(
				'field' => 'modeoftransport', 
				'label' => 'Mode Of Transport',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'mothertongue', 
				'label' => 'Mother Tongue',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'nationality', 
				'label' => 'Nationality',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'birthplace', 
				'label' => 'Birth Place',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'rollno', 
				'label' => 'Roll No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'studentid',
				'label' => 'Custom Student ID',
				'rules' => 'trim|required|max_length[10]|callback__isStudentCustomIDExists|xss_clean'
			),
			array(
				'field' => 'emailid', 
				'label' => 'Email ID',
				'rules' => 'trim|required|max_length[100]|callback__isStudentEmailIDExists|xss_clean'
			),
			array(
				'field' => 'password', 
				'label' => 'Password',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'disability', 
				'label' => 'Disability',
				'rules' => 'trim|max_length[500]|xss_clean'
			),
			array(
				'field' => 'moleone', 
				'label' => 'Mole One',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'moletwo', 
				'label' => 'Mole Two',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			/*array(
				'field' => 'uploadphoto', 
				'label' => 'Upload Photo',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),*/
			array(
				'field' => 'studentinsurance', 
				'label' => 'Student Insurance',
				'rules' => 'trim|required|max_length[3]|xss_clean'
			),
			array(
				'field' => 'isstayinghostel', 
				'label' => 'is Staying Hostel',
				'rules' => 'trim|required|max_length[3]|xss_clean'
			),
			array(
				'field' => 'mothername',
				'label' => 'Mother Name',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'motheroccupation',
				'label' => 'Mother Occupation',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'mothermobileno',
				'label' => 'Mother Mobile No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'motheremail',
				'label' => 'Mother Email',
				'rules' => 'trim|max_length[100]|xss_clean'
			),
			array(
				'field' => 'setemailmother',
				'label' => 'Set Email Mother',
				'rules' => 'trim|max_length[3]|xss_clean'
			),
			array(
				'field' => 'fathername',
				'label' => 'Father Name',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'fatheroccupation',
				'label' => 'Father Occupation',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'fathermobile',
				'label' => 'Father Mobile No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'fatheremail',
				'label' => 'Father Email',
				'rules' => 'trim|max_length[100]|xss_clean'
			),
			array(
				'field' => 'setemailfather',
				'label' => 'Set Email Father',
				'rules' => 'trim|max_length[3]|xss_clean'
			),
			array(
				'field' => 'guardianname', 
				'label' => 'Guardian Name',
				'rules' => 'trim|max_length[100]|xss_clean'
			),
			array(
				'field' => 'guardianoccupation', 
				'label' => 'Guardian Occupation',
				'rules' => 'trim|max_length[25]|xss_clean'
			),
			array(
				'field' => 'guardianmobile', 
				'label' => 'Guardian Mobile No',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'guardianemail', 
				'label' => 'Guardian Email Id',
				'rules' => 'trim|max_length[50]|xss_clean'
			),
			array(
				'field' => 'setemailguardian', 
				'label' => 'set Email Guardian',
				'rules' => 'trim|max_length[3]|xss_clean'
			),
			array(
				'field' => 'paddressone', 
				'label' => 'Address One',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'paddresstwo', 
				'label' => 'Address Two',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pmunicipal', 
				'label' => 'Municipal',
				'rules' => 'trim|max_length[40]|xss_clean'
			),
			array(
				'field' => 'pcountry', 
				'label' => 'Country',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'pstate', 
				'label' => 'State',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'pcity', 
				'label' => 'City',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'ppin', 
				'label' => 'Pin Code',
				'rules' => 'trim|max_length[6]|xss_clean'
			),
			array(
				'field' => 'ppolicestation', 
				'label' => 'Police Station',
				'rules' => 'trim|max_length[40]|xss_clean'
			),
			array(
				'field' => 'taddressone', 
				'label' => 'Address One',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'taddresstwo', 
				'label' => 'Address Two',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tmunicipal', 
				'label' => 'Municipal',
				'rules' => 'trim|max_length[40]|xss_clean'
			),
			array(
				'field' => 'tcountry', 
				'label' => 'Country',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'tstate', 
				'label' => 'State',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'tcity', 
				'label' => 'City',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'tpin', 
				'label' => 'Pin Code',
				'rules' => 'trim|max_length[6]|xss_clean'
			),
			array(
				'field' => 'tpolicestation', 
				'label' => 'Police Station',
				'rules' => 'trim|max_length[40]|xss_clean'
			),
			array(
				'field' => 'studentstatus', 
				'label' => 'Student Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_student(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//DepartmentData Info
			
			$file_photo_name = "";
			if (!empty($_FILES['uploadphoto']['name'])){
			
				$config['upload_path'] 		= 'storage/student-photos';
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
			$InsertStudentData = array('branch_fk_id'		 		 => $branchid,
										'student_first_name'		 => $firstname,
										'student_middle_name'		 => $middlename,
										'student_last_name'			 => $lastname,
										'student_mother_tongue'		 => $mothertongue,
										'student_nationality'		 => $nationality,
										'student_birth_place'		 => $birthplace,
										'student_roll_no'			 => $rollno,
										'student_gender'			 => $gender,
										'student_dob'				 => DateDmY_to_Ymd($dob),
										'student_religion'			 => $religion,
										'student_blood_group'		 => $bloodgroup,
										'student_height'			 => $height,
										'student_weight'			 => $weight,
										'student_distance_home_school'=> $distanceschooltohome,
										'student_mode_of_transport'	 => $modeoftransport,
										'student_disability'		 => $disability,
										'student_insurance'			 => $studentinsurance,
										'is_staying_hostel'			 => $isstayinghostel,
										'student_mobile'			 => $studentmobileno,
										'student_caste'				 => $castename,
										'student_sub_caste'			 => $subcastename,
										'student_aadhar_no'			 => $aadharno,
										'student_photo'				 => $file_photo_name,
										'student_socio_economical_status' => $socioeconomicalstatus,
										'student_socio_family_income'=> $familyincome,
										'student_admission_number'	 => $admissionnumber,
										'student_admission_on'		 => DateDmY_to_Ymd($admissiondate),
										'student_mole_one'			 => $moleone,
										'student_mole_two'			 => $moletwo,
										'student_create_by'			 => $this->MemberID,
										'student_create_on'			 => date('Y-m-d H:i:s'),
										'student_status'			 => $studentstatus
									);
									
			$StudentCustomID = $this->StudentModel->getStudentCustomID();
			$InsertStudentLoginData = array('student_email'	 	=> $emailid,
											'student_custom_id' => $StudentCustomID,
											'student_password' 	=> sha1(md5("S@ndy110".$password."@Vin112")),
											'student_is_active'	=> $studentstatus
											);
			
			$StudentClassInfo = array('branch_fk_id'		   => $branchid,
									 'class_fk_id'			   => $classname,
									 'section_fk_id'		   => $sectionname,
									 'student_class_medium'    => $medium,
									 'school_batch_fk_id'	   => $batch,
									 'student_class_create_on' => date('Y-m-d H:i:s'),
									 'student_class_create_by' => $this->MemberID,
									 'student_class_status'	   => $studentstatus
									);
			
			$InsertStudentParents	=	array(
											array('parents_type' => 'MOTHER',
											'parents_name' 		 => $mothername, 
											'parents_occupation' => $motheroccupation,
											'parents_mobile'	 => $mothermobileno,
											'parents_email' 	 => $motheremail,
											'parents_set_email'  => isset($setemailmother),
											'parents_create_by'  => $this->MemberID,
											'parents_create_on'  => date('Y-m-d H:i:s')
											),
											array('parents_type' => 'FATHER',
											'parents_name' 		 => $fathername, 
											'parents_occupation' => $fatheroccupation,
											'parents_mobile' 	 => $fathermobile,
											'parents_email' 	 => $fatheremail,
											'parents_set_email'  => isset($setemailfather),
											'parents_create_by'  => $this->MemberID,
											'parents_create_on'  => date('Y-m-d H:i:s')
											),
											array('parents_type' => 'GUARDIANS',
											'parents_name' 		 => $guardianname, 
											'parents_occupation' => $guardianoccupation,
											'parents_mobile' 	 => $guardianmobile,
											'parents_email' 	 => $guardianemail,
											'parents_set_email'  => isset($setemailguardian),
											'parents_create_by'  => $this->MemberID,
											'parents_create_on'  => date('Y-m-d H:i:s')
											)
										);								
					
			$InsertStudentAddress	=   array(	
											array('student_address_type' 	 => 'P',
												 'student_address_one'	 	 => $paddressone,
												 'student_address_two'	 	 => $paddresstwo,
												 'student_country'		 	 => $pcountry,
												 'student_state'		 	 => $pstate,
												 'student_city'				 =>	$pcity,
												 'student_municipal'		 => $pmunicipal,
												 'student_policestation'	 => $ppolicestation,
												 'student_pincode'		 	 => $ppin,
												 'student_create_by'	 	 => $this->MemberID,
												 'student_create_on'	 	 => date('Y-m-d H:i:s'),
												 'student_address_is_active' => $studentstatus
											),
											array('student_address_type'	=> 'T',
												'student_address_one'		=> $taddressone,
												'student_address_two'		=> $taddresstwo,
												'student_country'			=> $tcountry,
												'student_state'				=> $tstate,
												'student_city'				=> $tcity,
												'student_municipal'		 	=> $tmunicipal,
												'student_policestation'		=> $tpolicestation,
												'student_pincode'			=> $tpin,
												'student_create_by'			=> $this->MemberID,
												'student_create_on'			=> date('Y-m-d H:i:s'),
												'student_address_is_active' => $studentstatus
											)
										);
			
			$ResultStatus = $this->StudentModel->createStudent($InsertStudentData, $InsertStudentLoginData, $InsertStudentAddress, $InsertStudentParents, $StudentClassInfo);
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
		$StudentID = $this->input->post('RecID');
		if($StudentID){
			
			$data['CountryList'] = getCountryList();
			$this->load->model('super_admin/school/BranchModel');
			$data['BranchList'] = $this->BranchModel->getBranchList();
			$this->load->model('super_admin/school/BatchModel');
			$data['BatchDetails'] = $this->BatchModel->getBatchDetails();
			
			$data['Student'] = $this->StudentModel->getStudentSignInfo($StudentID);
			$data['StudentClass'] = $StudentClassID = $this->StudentModel->getStudentClassInfo($StudentID);
			$data['StudentPersonalInfo'] = $this->StudentModel->getStudentPersonalInfo($StudentID);
			$data['StudentInfo'] = $StudentBranchID = $this->StudentModel->getStudentInfo($StudentID);
			$this->load->model('super_admin/school/BranchClassModel');
			$data['ClassList'] = $this->BranchClassModel->getClassList($StudentBranchID->branch_fk_id);
			$this->load->model('super_admin/school/BranchClassSectionModel');
			$data['SectionList'] = $this->BranchClassSectionModel->getSectionList($StudentClassID->class_fk_id);
			$data['StudentAddress'] = $this->StudentModel->getStudentAddressInfo($StudentID);
	
			$this->load->view('modify/student/student-modify-view', $data);	
		}
	}
	private function setModifyDataValidation(){
		$rules = array(
			array(
				'field' => 'studentid', 
				'label' => 'Student Id',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'studentclassid', 
				'label' => 'Student Class ID',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'sectionname', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'medium', 
				'label' => 'Medium',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'admissiondate', 
				'label' => 'Admission Date',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'admissionnumber', 
				'label' => 'Admission Number',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'batch', 
				'label' => 'Batch',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			/*array(
				'field' => 'uploadphoto', 
				'label' => 'Upload Photo',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),*/
			array(
				'field' => 'firstname', 
				'label' => 'First Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'middlename', 
				'label' => 'Middle Name',
				'rules' => 'trim|max_length[50]|xss_clean'
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
				'field' => 'castename', 
				'label' => 'Caste',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'subcastename', 
				'label' => 'Sub Caste Name',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'dob', 
				'label' => 'Date Of Birth',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'religion', 
				'label' => 'Religion',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'studentmobileno', 
				'label' => 'student Mobile No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'aadharno', 
				'label' => 'Aadhar No',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'socioeconomicalstatus', 
				'label' => 'Socioeconomical Status',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'familyincome', 
				'label' => 'Family Income',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'bloodgroup', 
				'label' => 'Blood Group',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'height', 
				'label' => 'Height',
				'rules' => 'trim|required|max_length[4]|xss_clean'
			),
			array(
				'field' => 'weight', 
				'label' => 'Weight',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'distanceschooltohome', 
				'label' => 'Distance School to Home',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'modeoftransport', 
				'label' => 'Mode of Transport',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'mothertongue', 
				'label' => 'Mother Tongue',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'nationality', 
				'label' => 'Nationality',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'birthplace', 
				'label' => 'Birthplace',
				'rules' => 'trim|required|max_length[20]|xss_clean'
			),
			array(
				'field' => 'rollno', 
				'label' => 'Roll No',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(//callback__isStudentCustomIDExists
				'field' => 'studentid',
				'label' => 'Custom Student ID',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(//callback__isStudentEmailIDExists
				'field' => 'emailid', 
				'label' => 'Email ID',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'disability',
				'label' => 'Disability',
				'rules' => 'trim|max_length[500]|xss_clean'
			),
			array(
				'field' => 'moleone', 
				'label' => 'Mole One',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'moletwo', 
				'label' => 'Mole Two',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'studentinsurance', 
				'label' => 'Student Insurance',
				'rules' => 'trim|required|max_length[4]|xss_clean'
			),
			array(
				'field' => 'isstayinghostel', 
				'label' => 'is Staying Hostel',
				'rules' => 'trim|required|max_length[4]|xss_clean'
			),
			array(
				'field' => 'mothername', 
				'label' => 'Mother Name',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'motheroccupation', 
				'label' => 'Mother Occupation',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'mothermobileno', 
				'label' => 'Mother Mobile No',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'motheremail', 
				'label' => 'Mother Email',
				'rules' => 'trim|max_length[100]|xss_clean'
			),
			array(
				'field' => 'setemailmother', 
				'label' => 'Set Email Mother',
				'rules' => 'trim|max_length[1]|xss_clean'
			),
			array(
				'field' => 'fathername', 
				'label' => 'Father Name',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'fatheroccupation', 
				'label' => 'Father Occupation',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'fathermobile', 
				'label' => 'Father Mobile No',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'fatheremail', 
				'label' => 'Father Email',
				'rules' => 'trim|max_length[100]|xss_clean'
			),
			array(
				'field' => 'setemailfather', 
				'label' => 'Set Email Father',
				'rules' => 'trim|max_length[1]|xss_clean'
			),
			array(
				'field' => 'guardianname', 
				'label' => 'Guardian Name',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'guardianoccupation', 
				'label' => 'Guardian Occupation',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'guardianmobile', 
				'label' => 'Guardian Mobile No',
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'guardianemail', 
				'label' => 'Guardian Email',
				'rules' => 'trim|max_length[100]|xss_clean'
			),
			array(
				'field' => 'setemailguardian', 
				'label' => 'Set Email Guardian',
				'rules' => 'trim|max_length[1]|xss_clean'
			),
			array(
				'field' => 'paddressone', 
				'label' => 'Address One',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pmunicipal', 
				'label' => 'Municipal',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'paddresstwo', 
				'label' => 'Address Two',
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
				'label' => 'city',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'ppin', 
				'label' => 'Pin Code',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'ppolicestation', 
				'label' => 'Police Station',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'taddressone', 
				'label' => 'Address One',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'taddresstwo', 
				'label' => 'Address Two',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tmunicipal', 
				'label' => 'municipal',
				'rules' => 'trim|required|max_length[25]|xss_clean'
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
				'field' => 'tpin', 
				'label' => 'Pin Code',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'tpolicestation', 
				'label' => 'Police Station',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			)
			/*,array(
				'field' => 'studentstatus', 
				'label' => 'Student Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)*/
		);      
		return $rules;
	}
	public function update_student(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$file_photo_name = "";
			if (!empty($_FILES['uploadphoto']['name'])){
			
				$config['upload_path'] 		= 'storage/student-photos';
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
			
			$UpdateStudentData = array('branch_fk_id'		 		 	  => $branchid,
										//'student_admission_on'			  => $DateDmY_to_Ymd($admissiondate),
										'student_admission_number'		  => $admissionnumber,
										'student_first_name'		 	  => $firstname,
										'student_middle_name'		 	  => $middlename,
										'student_last_name'			 	  => $lastname,
										'student_gender'			 	  => $gender,
										'student_caste'				 	  => $castename,
										'student_sub_caste'				  => $subcastename,
										'student_dob'				 	  => DateDmY_to_Ymd($dob),
										'student_religion'			 	  => $religion,
										'student_mobile'				  => $studentmobileno,
										'student_aadhar_no'				  => $aadharno,
										'student_socio_economical_status' => $socioeconomicalstatus,
										'student_socio_family_income'	  => $familyincome,
										'student_blood_group'			  => $bloodgroup,
										'student_height'				  => $height,
										'student_weight'				  => $weight,
										'student_distance_home_school'	  => $distanceschooltohome,
										'student_mode_of_transport'		  => $modeoftransport,
										'student_mother_tongue'			  => $mothertongue,
										'student_nationality'			  => $nationality,
										'student_birth_place'			  => $birthplace,
										'student_roll_no'				  => $rollno,
										'student_disability'			  => $disability,
										'student_mole_one'				  => $moleone,
										'student_mole_two'			 	  => $moletwo,
										'student_insurance'				  => $studentinsurance,
										'is_staying_hostel'				  => $isstayinghostel,
										'student_modify_by'			 	  => $this->MemberID,
										'student_modify_on'			 	  => date('Y-m-d H:i:s')
										//'student_status'				  => $studentstatus
									);
			if($file_photo_name){
				$UpdateStudentData['student_photo'] = $file_photo_name;
				if($delpath)
					getDeleteFile("storage/student-photos/".$delpath);
			}					
			//$StudentCustomID = $this->StudentModel->getStudentCustomID();
			$UpdateStudentClassData = array("student_class_id"	   => $studentclassid,
											"branch_fk_id"		   => $branchid,
											"class_fk_id"		   => $classname,
											"section_fk_id"		   => $sectionname,
											"student_class_medium" => $medium,
											"school_batch_fk_id"   => $batch,
											"student_class_modify_by"=> $this->MemberID,
											"student_class_modify_on"=> date('Y-m-d H:i:s')
										);
			$UpdateStudentParent  = array(
										array(
										  'parents_id'			=> $motherid,
										  'parents_name'		=> $mothername ,
										  'parents_occupation'  => $motheroccupation ,
										  'parents_mobile' 		=> $mothermobileno,
										  'parents_email' 		=> $motheremail,
										  'parents_set_email' 	=> isset($setemailmother),
										  'parents_modify_by'	=> $this->MemberID,
										  'parents_modify_on'	=> date('Y-m-d H:i:s')
										),
										array('parents_id'		=> $fatherid,
										  'parents_name' 		=> $fathername ,
										  'parents_occupation' 	=> $fatheroccupation,
										  'parents_mobile' 		=> $fathermobile,
										  'parents_email' 		=> $fatheremail,
										  'parents_set_email' 	=> isset($setemailfather),
										  'parents_modify_by'	=> $this->MemberID,
										  'parents_modify_on'	=> date('Y-m-d H:i:s')
										),
										array('parents_id'		=> $guardiansid,
										  'parents_name' 		=> $guardianname ,
										  'parents_occupation'  => $guardianoccupation,
										  'parents_mobile' 		=> $guardianmobile,
										  'parents_email' 		=> $guardianemail,
										  'parents_set_email' 	=> isset($setemailguardian),
										  'parents_modify_by'	=> $this->MemberID,
										  'parents_modify_on'	=> date('Y-m-d H:i:s')
										)
									);
			$UpdateStudentLoginData = array('student_email'	 	  => $emailid
											//'student_custom_id' => $StudentCustomID,
											//'student_password'  => $password,
											);
					
			$UpdateStudentAddress	=   array(	
											array(
												'student_address_id'		=> $pstudentaddressid,
												 'student_address_one'	 	 => $paddressone,
												 'student_address_two'	 	 => $paddresstwo,
												 'student_municipal'		 => $pmunicipal,
												 'student_country'		 	 => $pcountry,
												 'student_state'		 	 => $pstate,
												 'student_city'				 =>	$pcity,
												 'student_pincode'		 	 => $ppin,
												 'student_policestation'	 => $ppolicestation,
												 'student_modify_by'	 	 => $this->MemberID,
												 'student_modify_on'	 	 => date('Y-m-d H:i:s')
											),
											array(
												'student_address_id'		=> $tstudentaddressid,
												'student_address_one'		=> $taddressone,
												'student_address_two'		=> $taddresstwo,
												'student_municipal'		 	=> $tmunicipal,
												'student_country'			=> $tcountry,
												'student_state'				=> $tstate,
												'student_city'				=> $tcity,
												'student_pincode'			=> $tpin,
												'student_policestation'	 	=> $tpolicestation,
												'student_modify_by'			=> $this->MemberID,
												'student_modify_on'			=> date('Y-m-d H:i:s')
											)
										);
			
			
			$ResultStatus = $this->StudentModel->modifyStudent($studentid, $UpdateStudentData, $UpdateStudentParent, $UpdateStudentLoginData, $UpdateStudentAddress, $UpdateStudentClassData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Student Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Student Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Student Details!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Student Details!');
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
	public function create_event_previous_school(){
		$StudentID = $this->input->post('RecID');
		if($StudentID){
			$data['StudentID'] = $StudentID;
		$this->load->view('event/student/create-previous-school-details', $data);
		}
	}
	private function setPreviousSchoolDataValidation($StudentID){
			$rules = array(
			array(
				'field' => 'studentid', 
				'label' => 'Student Id',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'schoolname', 
				'label' => 'School Name',
				'rules' => 'trim|required|max_length[60]|xss_clean'
			),
			array(
				'field' => 'fromclass', 
				'label' => 'From Class',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'toclass', 
				'label' => 'To Class',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'rollno', 
				'label' => 'Roll No',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'totalmarks', 
				'label' => 'Total Marks',
				'rules' => 'trim|required|max_length[4]|xss_clean'
			),
			array(
				'field' => 'marksobtained', 
				'label' => 'Marks Obtained',
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'medium', 
				'label' => 'Medium',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'board',
				'label' => 'Board',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'batch', 
				'label' => 'Batch',
				'rules' => 'trim|required|max_length[20]|callback__isStudentPreviousSchoolExists['.$StudentID.']|xss_clean'
			),
			array(
				'field' => 'schooladdress', 
				'label' => 'School Address',
				'rules' => 'trim|required|max_length[300]|xss_clean'
			),
			array(
				'field' => 'admissionno', 
				'label' => 'Admission No',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'admissionon', 
				'label' => 'Admission date',
				'rules' => 'trim|max_length[10]|xss_clean'
			)
		);   
		return $rules;
	} 
	public function _isStudentPreviousSchoolExists($key = NULL, $StudentID){
		if($key && $StudentID){
			$StudentPreviousID = array('student_fk_id' => $StudentID, 'batch'=> $key);
			$Result = $this->StudentModel->checkStudentPreviousSchoolExists($StudentPreviousID);
			if($Result > 0){
				$this->form_validation->set_message('_isStudentPreviousSchoolExists', "Student Previous School Batch already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	public function create_previous_school_info(){
	
	$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setPreviousSchoolDataValidation($this->input->post('studentid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));

		$InsertStudentPreviousSchoolData = array('student_fk_id' 			  => $studentid,
												'school_name'		 		  => $schoolname,
												'school_address'		 	  => $schooladdress,
												'batch'		 				  => $batch,
												'from_class'			 	  => $fromclass,
												'to_class'		 			  => $toclass,
												'roll_no'		 			  => $rollno,
												'board'		 				  => $board,
												'medium'			 		  => $medium,
												'total_marks'			 	  => $totalmarks,
												'marks_obtained'			  => $marksobtained,
												'admission_number'			  => $admissionno,
												'student_admission_on'		  => DateDmY_to_Ymd($admissionon),
												'previous_academic_create_by' => $this->MemberID,
												'previous_academic_create_on' => date('Y-m-d H:i:s'), 	
												'previous_academic_status'	  => 1
											);
			
			$ResultStatus = $this->StudentModel->createStudentPreviousSchoolData($InsertStudentPreviousSchoolData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Student Previous School Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Student Previous School Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Student Previous School Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Student Previous School Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);	
	
	}
	public function create_event_student_attachments(){
		$StudentID = $this->input->post('RecID');
		if($StudentID){
			$data['StudentID'] = $StudentID;
		$this->load->view('event/student/create-certificates-details', $data);
		}
	}
	public function setStudentAttachmentsDataValidation(){
		$rules = array(
			array(
				'field' => 'studentid', 
				'label' => 'Student Id',
				'rules' => 'trim|max_length[10]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_event_student_attachments_info(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setStudentAttachmentsDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$config['upload_path'] 		= 'storage/student-docs';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf'; 
        	$config['encrypt_name']    	= TRUE;    
			$this->load->library('upload', $config);
			
			$files = $_FILES['uploadphoto'];
			foreach($documenttitle as $key => $value){
				if($files['name'][$key]){
					$_FILES['uploadphoto[]']['name'] = $files['name'][$key];
					$_FILES['uploadphoto[]']['type'] = $files['type'][$key];
					$_FILES['uploadphoto[]']['tmp_name'] = $files['tmp_name'][$key];
					$_FILES['uploadphoto[]']['error'] = $files['error'][$key];
					$_FILES['uploadphoto[]']['size'] = $files['size'][$key];
					$file_photo_name = "";
					if($this->upload->do_upload('uploadphoto[]')){
						$image_details = $this->upload->data();
						$file_photo_name = $image_details['file_name'];
					}else{
						$response['errors'] = array('uploadphoto'  => $this->upload->display_errors());
						echo json_encode($response);
					}
				}
			$InsertStudentAttachmentsData[] = array('student_fk_id'    => $studentid,
												'student_document_title '	   => $value,
												'student_document_url'		   => $file_photo_name,
												'student_document_description' => $docdescription[$key],
												'student_document_create_by'   => $this->MemberID,
												'student_document_create_on'   => date('Y-m-d H:i:s'), 	
												'student_document_status'	   => 1
											 );
				
			}
			/*foreach($documenttitle as $key => $doctitle){	
			$InsertStudentAttachmentsData[] = array('student_fk_id'    => $studentid,
													'student_document_title '	   => $doctitle,
													'student_document_url'		   => $key,
													'student_document_description' => $docdescription[$key],
													'student_document_create_by'   => $this->MemberID,
													'student_document_create_on'   => date('Y-m-d H:i:s'), 	
													'student_document_status'	   => 1
												);
												
			}*/
			$ResultStatus = $this->StudentModel->createStudentAttachmentsData($InsertStudentAttachmentsData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Student Certificates Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Student Previous School Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Certificates School Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Certificates School Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function delete(){
		$StudentRecIDS = $this->input->post("recid");
		if(!empty($StudentRecIDS)){
			$ResultStatus = $this->StudentModel->deleteStudent($StudentRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Student Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Student Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Student Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Student Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Student Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Student Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$StudentRecIDS = $this->input->post("recid");
		if(!empty($StudentRecIDS)){
			$ResultStatus = $this->StudentModel->trashStudent($StudentRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Student Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Student Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Student Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Student Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Student Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Student Information!');
		}
		echo json_encode($response);
	}
	
}