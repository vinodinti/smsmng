<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model{

	public function getModules(){
		$this->db->select('module_attribute_id as ModuleAttributeId, module_name as ModuleName, module_attribute_fk_id as ModuleAttributeFkId, module_img as ModuleImg, module_attribute_status as ModuleAttributeStatus');
		return $this->db->get('module_attribute')->result();
	}

	
}