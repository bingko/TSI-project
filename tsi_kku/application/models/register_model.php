<?php
 
class Register_model extends CI_Model{
	
	
	public function newRegister($inData){
		//print_r($inData);
		$rs = $this->db->insert('member', $inData);
		$this->db->select_max('member_id');
		$query = $this->db->get('member');
	     return $query->result_array();
	}
	
	public function getMember($memberId){
		 
		$this->db->where('member_id', $memberId);
		$query =$this->db->get("member");
 
		if($query->result()){
 
		  	return $query->result_array();
		}
		else{
			return false;
		}
	    
	}	
	
	 
	 
	
}