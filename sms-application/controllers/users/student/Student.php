<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('users/student/StudentModel');
		$this->CI = & get_instance();
	}
	public function index(){
		$StudentID = $this->MemberID;
		if($StudentID){
			$data['StudentInfo'] = $StudentBranchID = $this->StudentModel->getStudentInfo($StudentID);
			$data['StudentPersonalInfo'] = $this->StudentModel->getStudentPersonalInfo($StudentID);
			if($StudentBranchID->branch_fk_id){
			$this->load->model('users/student/BranchModel');
		    $data['BranchName'] = $this->BranchModel->getBranchInfo($StudentBranchID->branch_fk_id);
			}
			$data['StudentAddress'] = $this->StudentModel->getStudentAddressInfo($StudentID);
			$data['StudentDocuments'] = $this->StudentModel->getStudentDocumentInfo($StudentID);
		}
		$data['body_content']	= 'users/student/preview/student-data-preview';
		$this->load->view('student-template', $data);
	}
	
}