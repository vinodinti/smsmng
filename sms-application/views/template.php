<?php 
	$this->load->view('includes/dashboard-header'); 
	$this->load->view('includes/dashboard-leftbar');
	$this->load->view($body_content);
	$this->load->view('includes/dashboard-footer');
?>