<?php
 
class Report_model extends CI_Model{
	
	
	public function getMember(){
		 //$this->db->where();
		  $this->db->from("member");
		  $this->db->order_by("report.date_time", "desc"); 
		  $this->db->join('report', 'member.member_id = report.member_id','left');
		 $query = $this->db->get();
		 $outData = array();
		 $i=0;
	     foreach($query->result_array() as $data ){
	     	$outData[$i]["date_time"] = $data["date_time"];
	     	$outData[$i]["member_name"] = $data["member_name"];
	     	$outData[$i]["avg_score"] = $data["avg_score"];
	     	if( $data["pass"] ==1){
	     		$outData[$i]["pass"] = "ผ่าน";
	     	}else{
	     		$outData[$i]["pass"] = "ไมผ่าน";
	     	}
	     	$unit    = @$this->quiz_model->getCategories_Name($data["section"]);
	     	$outData[$i]["section"] =@$unit[0]["categories_name"];
	     	$i++;
	     }
	     return $outData;
	}	
	
	public function total_member(){
		$output=array();
		$yy = date("Y");
		$mm = date("m");
		for($i=1;$i<=12;$i++){
			 if($i<9){
			 	$i = "0".$i;
			 } 
			 $search  = "$yy-$mm-$i";
			// echo $search; 
			$this->db->distinct("member_id");
			 $this->db->like("date_time",$search  );
			 $rs = $this->db->get("report");
			 //echo $this->db->last_query();
			// echo $this->db->count_all_results();
			//print_r($rs );
			 $output[] = $rs->num_rows;
		}
		return $output;
	}
	 
	
}