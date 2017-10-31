<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExamModel extends CI_Model {	

	public function getExamList(){
		return $this->db->get('school_exam')->result();	
	}
	
}