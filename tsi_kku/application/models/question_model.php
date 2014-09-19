<?php
 
class Question_model extends CI_Model{
	
	
	public function addQuestion($inQuestion,$inAns){
 
		 $rs = $this->db->insert('question', $inQuestion);
		 $this->db->select_max("question_id","mx");
		 $query  = $this->db->get("question");  
		 $mxx =  $query->result();
  		 $max = $mxx[0]->mx ;
  		 $inAns["question_id"] = $max;
  		 $rs = $this->db->insert('ans', $inAns); 
  		  
  		 
	    return true;
	 		 
	    
	}	
	
	public function editQuestion($q_id,$inQuestion,$inAns){
		 
 		 $this->db->where("question_id",$q_id);
		 $rs = $this->db->update('question', $inQuestion);
		// echo $this->db->last_query();
		
		 $this->db->where("question_id",$q_id);
		 $rs = $this->db->delete('ans'); 
		 $inAns["question_id"] = $q_id;
  		 $rs = $this->db->insert('ans', $inAns); 
  		  
  		 
	    return true;
	 		 
	    
	}
	
 	public function addCategories($inCategories){
        
		 $rs = $this->db->insert('categories', $inCategories);
		// echo $this->db->last_query();
	    return true;
	 		 
	    
	}	

	
	public function deleteCategories($inCategories){
	 		 //print_r($inCategories);
	 		 $this->db->where($inCategories);
			 $rs = $this->db->delete('categories');
			// echo $this->db->last_query();
		    return true;
	 	}	

	 	
	public function deleteQuestion($inQ){
	 		 //print_r($inCategories);
	 		 $this->db->where($inQ);
			 $rs = $this->db->delete('question');
			// echo $this->db->last_query();
		    return true;
	 	}
	 	
	public function updateCategories($inData){
	//	$dataUpdate =array("categori");
		$upData = array("categories_name"=>$inData["categories_name"],"cnt"=>$inData["cnt"]);
	
		
 		$this->db->where("categories_id",$inData["categories_id"]);
		 $rs = $this->db->update('categories',$upData);
		// echo $this->db->last_query();
	    return true;
	    
	 		 
	    
	}	 
	public function listQuestion($catId){
		$this->db->order_by("question_id","ASC");
		$this->db->where("question_categories",$catId);
		$rs=$this->db->get("question");
		return  $rs->result_array();
	//	return $data_question;
	} 
	
	
 	public function getQuestion($qid){
		//$this->db->order_by("question_id","ASC");
		 
		//$rs=$this->db->get("question");
		
		//$this->db->select('*');
		$this->db->where("question.question_id",$qid);
		$this->db->from('question');
		$this->db->join('ans', 'question.question_id = ans.question_id');
		
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return  $rs->result_array();
	//	return $data_question;
	} 
	
	
	
	
	public function getCat($cid){
		//$this->db->order_by("question_id","ASC");
		 
		//$rs=$this->db->get("question");
		
		//$this->db->select('*');
		$this->db->where("categories_id",$cid);
		$this->db->from('categories');
		//$this->db->join('ans', 'question.question_id = ans.question_id');
		
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return  $rs->result_array();
	//	return $data_question;
	} 
	
}