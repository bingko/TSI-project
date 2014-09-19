<?php
 
class Quiz_model extends CI_Model{

	
	public function get_quiz_km($id){
		$rs=$this->db->where("categories_id",$id);
		$rs=$this->db->get("categories");
		$rs_cat = $rs->result_array();
		$outData=array();
		$i=0;
		foreach($rs_cat as $cat_quiz){
			//print_r($cat_quiz);
			$outData[$i]["cat"]= $cat_quiz;
			$quiz_question = $this->get_detail_quiz($cat_quiz["categories_id"],$cat_quiz["cnt"]);
			$outData[$i]["quiz_question"]=$quiz_question ;
			$i++;
		}
		return $outData;
	    
	}
	
	public function get_quiz(){
		$rs=$this->db->get("categories");
		$rs_cat = $rs->result_array();
		$outData=array();
		$i=0;
		foreach($rs_cat as $cat_quiz){
			//print_r($cat_quiz);
			$outData[$i]["cat"]= $cat_quiz;
			$quiz_question = $this->get_detail_quiz($cat_quiz["categories_id"],$cat_quiz["cnt"]);
			$outData[$i]["quiz_question"]=$quiz_question ;
			
			$i++;
		}
		return $outData;
	    
	}	
	
	public function get_detail_quiz($cat_id,$cnt){
		$this->db->where("question_categories",$cat_id);
		$this->db->limit($cnt);
		$this->db->order_by('question_id', 'RANDOM');
		$rs=$this->db->get("question");
		$data_qurstion = $rs->result_array();
		$return_question=array();
		$i=0;
	//	echo "<pre>";
	//s	print_r($data_qurstion );
	//	exit;
		foreach($data_qurstion as $question){
			$return_question[$i]["question_id"] = $question["question_id"];
			$return_question[$i]["question_detail"] = $question["question_detail"];
			$return_question[$i]["question_ans"] = $question["question_ans"];
		    $return_question[$i]["ans"] = $this->get_answer($question["question_id"]);
		    $i++;
		}
		return $return_question;
	}

	
	public function saveVDO($vdo_file,$cat){
		$dataVDO = array("vdo1"=>$vdo_file);
		$this->db->where("categories_id",$cat);
		$rs=$this->db->update("categories",$dataVDO);
		//echo $this->db->last_query();
		//exit;
		return  1;
	//	return $data_question;
	}		
	
	
	public function get_answer($question_id){
		$this->db->where("question_id",$question_id);
		$rs=$this->db->get("ans");
		return  $rs->result_array();
	//	return $data_question;
	}		
	
	

	public function getCategories_Name($id){
		$this->db->where("categories_id",$id);
		$rs=$this->db->get("categories");
		return  $rs->result_array();
	//	return $data_question;
	}
	
	public function listCategories(){
		$this->db->order_by("categories_id","ASC");
		$rs=$this->db->get("categories");
		return  $rs->result_array();
	//	return $data_question;
	}	
	
	
	public function getCnt($catId){
		$this->db->select("cnt");
		$rs=$this->db->where("categories_id",$catId);
		$rs=$this->db->get("categories");
		$total = $rs->result_array();
		return $total[0]["cnt"];
	}
	

	public function sumScore(){
	 
		$rs=$this->db->where("member_id",$this->session->userdata('uid'));
		$rs=$this->db->where("no",$this->session->userdata('no'));
		$rs=$this->db->get("report");
		return    $rs->result_array();
		//return $total[0]["cnt"];
	}
	
	public function sumScoreAll(){
	 
		$rs=$this->db->where("member_id",$this->session->userdata('uid'));
	 
		$rs=$this->db->get("report");
		return    $rs->result_array();
		//return $total[0]["cnt"];
	}	
	
	public function inScore($inData){
		$member_id =  $this->session->userdata('uid');
		
		foreach($inData as $q){
			$total_score = $this->getCnt($q["section"]);
 			$avg = 100*$q["score"]/$total_score ;
 			if($avg >= 50 ){
 				$pass = 1;
 			}else
 			{
 				$pass=0;
 			}
			$data = array("member_id"=>$member_id,
						  "section" =>$q["section"],
						  "total_score" =>$q["score"],
						   "avg_score" =>$avg ,
						  "pass"=>$pass,
						  "no"=>$this->session->userdata('no') );
			$this->db->insert("report",$data);
		}
		 
		return "pass";
	}
}