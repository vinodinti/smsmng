<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//$this->MemberID = $this->userinfo->getMemberId();
	}
	public function index(){
		GotoDashboard();
	}
	public function logout(){
		$SessionData = array('is_logged_in', 
							 'member_id', 
							 'member_full_name', 
							 'member_email', 
							 'member_photo', 
							 'member_type_id', 
							 'member_type');
		$this->session->unset_userdata($SessionData);
		redirect(base_url().'credentials/super_admin/signin');
	}
	
}