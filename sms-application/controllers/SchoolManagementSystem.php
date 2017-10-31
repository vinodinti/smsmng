<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SchoolManagementSystem extends CI_Controller {
	
	public function __construct(){
		parent::__construct(); 
	}
	public function index(){
		
		
		$this->load->view('school_management_system');
	}
	
}