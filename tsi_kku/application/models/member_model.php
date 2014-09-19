<?php
 
class Member_model extends CI_Model{
	
	
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
	
	public function changePassword($member_id,$new_password){
		$this->db->where('member_id', $member_id);
		$query =$this->db->get("member");
		if($query->result()){
			$this->db->where('member_id', $member_id);
			$query =$this->db->update("member",$new_password);
	    	return true;
		}else{
			return false;
		}
	}
	 
	public function checkLogin($login){
		$this->db->where("staff_username",$login["username"]);
		$this->db->where("staff_password",md5($login["password"]));
		$query = $this->db->get("staff");
		 
		if($query->num_rows){
			$outPut = $query->result_array();
			$outPut[0]["status"] = "staff";
			return $outPut;
		}else{
			$this->db->where("username",$login["username"]);
			$this->db->where("password",md5($login["password"]));
			$query = $this->db->get("member");
			if($query->num_rows){
				$outPut = $query->result_array();
				$outPut[0]["status"] = "member";
				return $outPut;
			}else{
				 $outPut[0]["status"] = "false";
				return $outPut;
				 
			}
	
		}
	}
	 
	
}