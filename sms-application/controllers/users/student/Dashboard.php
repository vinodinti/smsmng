<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('users/student/DashboardModel');
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'users/student/dashboard-view';
		$this->load->view('student-template', $data);
	}
	public function getEventTimeTableInfo(){
		$GetTimeTableInfo = $this->getClassInformation();
		if($GetTimeTableInfo){
			$data['ResultStatus'] = $this->DashboardModel->getEventTimeTableInfo($GetTimeTableInfo);
			$data['WeekList'] 	= $this->DashboardModel->getWeeks();
		    $data['PeriodList'] = $this->DashboardModel->getPeriods();
		}
		$this->load->view('users/student/datatable/dashboard-class-time-table', $data);
	}
	private function getClassInformation(){
		if($this->MemberID){
			$StudentBranchClassInfo = $this->DashboardModel->getClassInformation($this->MemberID);
			$GetTimeTableInfo = array('titable.branch_fk_id='  => 1,//$StudentBranchClassInfo->branch_fk_id,
									  'titable.class_fk_id='   => 2,//$StudentBranchClassInfo->class_fk_id,
									  'titable.section_fk_id=' => 3,//$StudentBranchClassInfo->section_fk_id,
									  'school_batch_fk_id='	   => $StudentBranchClassInfo->school_batch_fk_id
									);
			//print_r($GetTimeTableInfo);
			return $GetTimeTableInfo;
		}return false;
	}
	private function eventTimeTableContent($ResultStatus){
		$WeekList 	= $this->DashboardModel->getWeeks();
		$PeriodList = $this->DashboardModel->getPeriods();
		//head section
		$TimeTableMessase = '<table class="table table-striped table-bordered" id="sample_1"><thead><tr><th></th>';
		$PeriodNames = array();
		foreach($PeriodList as $Period){
			foreach($ResultStatus as $Result){
				if($Period->period_id==$Result->period_fk_id){
					if(!(in_array($Result->period_fk_id, $PeriodNames))){
								$TimeTableMessase .= '<th>'.$Period->period_name.'</th>';
								$PeriodNames[] = $Result->period_fk_id;
							}
				}
			}
		}
		$TimeTableMessase .= '</tr></thead><tbody>';
		//body section
			if($ResultStatus){
				$WeekNames = array();
				
				foreach($WeekList as $WeekName){
					foreach($ResultStatus as $Result){
						if($WeekName->week_id==$Result->day_fk_id){
							
							if(!(in_array($Result->day_fk_id, $WeekNames))){
								$TimeTableMessase .= '<tr class="odd gradeX"><td>'.$WeekName->week_name.'</td>';
								$WeekNames[] = $Result->day_fk_id;
							}
					$TimeTableMessase .= "<td>". time_twentyFour_to_twelve($Result->start_time) ."-". time_twentyFour_to_twelve($Result->end_time).' '.$Result->employee_full_name .' '. $Result->subject_name ."</td>";
					
						}
					}
					$TimeTableMessase .= "</tr>";
				} 
			}else{
				$TimeTableMessase .= "<td>No Records Found!</td>";
			}	
		$TimeTableMessase .= "</tbody></table>";
		return $TimeTableMessase;
	}
	
	
	
}