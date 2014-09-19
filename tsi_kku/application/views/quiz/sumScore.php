<?php 
 

 
	foreach($score as $detail){
	 	$section_name = $this->quiz_model->getCategories_Name($detail["section"]);
	 	$sec_name=$section_name[0]["categories_name"] ;
		echo "<h4><br><font color=#088A29>  ".$sec_name."</font> ได้คะแนน ".$detail["avg_score"]." % </h4>";
		if($detail["pass"]==1){
			echo " <h3><font color=green> ผ่านการทดสอบ</font></h3>";
		}else{
			echo " <h3><font color=Red> ไม่ผ่านการทดสอบ</font> </h3> <a href=".base_url()."/index.php/question/km/".$detail["section"]."> เรียนรู้เพิ่มเติม </a>";
		}
		echo "</font> <br>(".$detail["date_time"].")<hr>";
	}

?>