<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		AutoRouting();
		//$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/DashboardModel');
		//$this->load->model('dashboardmodel');
	}
	public function index(){
		$this->load->view('includes/dashboard-header');
		$this->load->view("dashboard-view");
		$this->load->view('includes/footer');
	}

	
}