<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeAttendanceModel extends CI_Model {
	
	public function getEmployeeAttendanceDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("CONCAT(emp.employee_first_name,' ',emp.employee_middle_name,' ',emp.employee_last_name) as full_name, emp.employee_id, empatt.employee_attendance_id, empatt.employee_fk_id, (empatt.employee_morning_attendance + empatt.employee_noon_attendance) as attendance, empatt.attendance_date_on");
		$this->db->from("employee as emp");
		$this->db->join("employee_attendance as empatt", "empatt.employee_fk_id=emp.employee_id", "LEFT");
		$this->db->where("emp.employee_is_status",1);
		$this->db->order_by("empatt.attendance_date_on", "DESC");
		$this->db->order_by("empatt.employee_fk_id", "ASC");
		return $this->db->get("")->result();
	}
	public function getEmployeeAttendanceDetailsCount(){
				$this->db->select("count(employee_fk_id) as rowcount");
		return  $this->db->get('employee_attendance')->row()->rowcount;
	}
	public function getBranchEmployeeAttendanceList($Attendance = NULL){
		if($Attendance){
			if($Attendance['attendance_type']=="MORNING"){
					$this->db->select("CONCAT(emp.employee_first_name,' ',emp.employee_middle_name,' ',emp.employee_last_name) as full_name, emp.employee_id, empatten.employee_attendance_id, empatten.employee_morning_attendance as employee_attendance");
					$this->db->from("employee as emp");
					$this->db->join("employee_attendance as empatten", 'empatten.employee_fk_id=emp.employee_id AND empatten.attendance_date_on="'.$Attendance['attendance_date'].'"', "LEFT");
					$this->db->where(array('emp.branch_fk_id=' => $Attendance["branch_id"]));
					$this->db->order_by("emp.employee_id", "ASC");
			return	$this->db->get("")->result();
			}else if($Attendance['attendance_type']=="NOON"){
					$this->db->select("CONCAT(emp.employee_first_name,' ',emp.employee_middle_name,' ',emp.employee_last_name) as full_name, emp.employee_id, empatten.employee_attendance_id, empatten.employee_noon_attendance as employee_attendance");
					$this->db->from("employee as emp");
					$this->db->join("employee_attendance as empatten", 'empatten.employee_fk_id=emp.employee_id AND empatten.attendance_date_on="'.$Attendance['attendance_date'].'"', "LEFT");
					$this->db->where(array('emp.branch_fk_id=' => $Attendance["branch_id"]));
					$this->db->order_by("emp.employee_id", "ASC");
			return	$this->db->get("")->result();
			}else{
			return false;
			}
		}return false;
	}
	public function createEmployeeAttendance($InsertEmployeeAttendance = NULL){
		if($InsertEmployeeAttendance){
			   $this->db->insert_batch('employee_attendance', $InsertEmployeeAttendance);
		return $this->db->affected_rows();
		}return false;
	}
	public function updateEmployeeAttendance($UpdateEmployeeAttendance = NULL){
		if($UpdateEmployeeAttendance){
			   $this->db->update_batch('employee_attendance', $UpdateEmployeeAttendance, 'employee_attendance_id');
		return $this->db->affected_rows();
		}return false;
	}
	public function deleteEmployeeAttendance($AttendanceRecIDS = NULL){
		if($AttendanceRecIDS){
				$this->db->where_in("employee_attendance_id", $AttendanceRecIDS);
		return  $this->db->delete("employee_attendance");		
		}return false;
	}
	public function trashEmployeeAttendance($AttendanceRecIDS = NULL){
		if($AttendanceRecIDS){
				$this->db->where_in("employee_attendance_id", $AttendanceRecIDS);
		return  $this->db->delete("employee_attendance");		
		}return false;
	}
	
}