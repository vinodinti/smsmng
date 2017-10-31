<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/BatchModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/batch-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$BatchID = $this->input->post('RecID');
		if($BatchID){
			$data["BatchInfo"]= $this->BatchModel->getBatchInfo($BatchID);
			$this->load->view('preview/school/batch-data-preview', $data);	
		}	
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		/*array("school_batch_value"=>"<input type='text'>",
		"school_batch_start_on"=>"<input type='text'>,
		"school_batch_end_on"=>"<input type='text'>,
		"school_batch_create_on"=>"<input type='text'>);*/
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$BatchDetails = $this->BatchModel->getBatchDetails($PerPage, $Offset);
		$RowsCount = $this->BatchModel->getBatchDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($BatchDetails), "total"=> $RowsCount,
					"rows"=>$BatchDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		/*
		$PerPage 	= $this->input->get('perpage')?$this->input->get('perpage'):10;
		$Offset 	= $this->input->get('per_page') ? $this->input->get('per_page') : 0;

		$data['BatchDetails'] = $this->BatchModel->getBatchDetails($PerPage, $Offset);
		$data['RowsCount'] = $BatchDetailsCount = $this->BatchModel->getBatchDetailsCount();
		
		$P_URL = base_url().'super_admin/school/batch?';
		$data['Pagination']	= BootstrapCreatePagination($P_URL, $BatchDetailsCount, $PerPage, 'pagination-sm no-margin pull-right');
		*/
		$this->load->view('datatable/school/batch-data-table-view');
	}
	public function create(){
		$this->load->view('create/school/batch-create-view');
	}
	public function _isBatchNameExists($BatchName = NULL){
		if($BatchName){
			$Result = $this->BatchModel->checkBatchName($BatchName);
			if($Result){
				$this->form_validation->set_message('_isBatchNameExists', "Batch Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'batchname', 
				'label' => 'Batch Name',
				'rules' => 'trim|required|max_length[10]|callback__isBatchNameExists|xss_clean'
			),
			array(
				'field' => 'batchstarton', 
				'label' => 'Batch Start On',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batchendon', 
				'label' => 'Batch End On',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batchstatus', 
				'label' => 'Batch Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_batch(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			       
			$InsertBatchData = array("school_batch_value"	  => $batchname,
									 "school_batch_start_on"  => DateDmY_to_Ymd($batchstarton),
									 "school_batch_end_on"	  => DateDmY_to_Ymd($batchendon),
									 "school_batch_create_by" => $this->MemberID,
									 "school_batch_create_on" => date('Y-m-d H:i:s'),
									 "school_batch_status"	  => $batchstatus,
									);
			
			$ResultStatus = $this->BatchModel->createBatch($InsertBatchData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Grade Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Grade Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Grade Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Grade Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$BatchID = $this->input->post('RecID');
		if($BatchID){
			$data['BatchInfo'] = $this->BatchModel->getBatchInfo($BatchID);
			$this->load->view('modify/school/batch-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($BatchID = NULL){
		$rules = array(
			array(
				  'field' => 'batchid', 
				  'label' => 'Batch ID',
				  'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				  'field' => 'batchname', 
				  'label' => 'Batch Name',
				  'rules' => 'trim|required|max_length[10]|callback__isModifyBatchNameExists['. $BatchID .']|xss_clean'
			),
			array(
				'field' => 'batchstarton', 
				'label' => 'Batch Start On',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batchendon',
				'label' => 'Batch End ON',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batchstatus', 
				'label' => 'Batch Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function _isModifyBatchNameExists($BatchName = NULL, $BatchID = NULL){
		if($BatchID)
			$this->db->where('school_batch_id !=', $BatchID);			
		$this->db->where(array('school_batch_value' => $BatchName));
		$Status = $this->db->get('school_batch');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyBatchNameExists', "Batch Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function update_batch(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('batchid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			    
			$UpdateBatchData = array('school_batch_value'    => $batchname,
									'school_batch_start_on'  => DateDmY_to_Ymd($batchstarton),
									'school_batch_end_on' 	 => DateDmY_to_Ymd($batchendon),
									'school_batch_modify_by' => $this->MemberID,
									'school_batch_modify_on' => date('Y-m-d H:i:s'),
									'school_batch_status'	 => $batchstatus
									);
			$BatchID = array('school_batch_id' => $batchid);
			$ResultStatus = $this->BatchModel->modifyBatch($UpdateBatchData, $BatchID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Batch Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Batch Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Batch Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Batch Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function delete(){
		$BatchRecIDS = $this->input->post("recid");
		if(!empty($BatchRecIDS)){
			$ResultStatus = $this->BatchModel->deleteBatch($BatchRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Batch Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Batch Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Batch Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Batch Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Batch Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Batch Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$BatchRecIDS = $this->input->post("recid");
		if(!empty($BatchRecIDS)){
			$ResultStatus = $this->BatchModel->trashBatch($BatchRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Batch Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Batch Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Batch Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Batch Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Batch Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Batch Information!');
		}
		echo json_encode($response);
	}
	
}