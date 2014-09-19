 <center> <table class="table table-bordered" style="border-radius:10px; width:80%;">
 <span id="loading"></span>
<?php 
 	$no = $this->session->userdata('no');
 	 $no=$no+1;
 	$newdata=array( 'no'     => $no);
 	$this->session->set_userdata($newdata);
 	//print_r($quiz_all);
 	$qlist_no = 1;

	foreach($quiz_all as $categies){
		$q_no = 1;
		echo "<tr ><td bgcolor='#F7F8E0' style='border-radius:10px; border-bottom-left-radius:0px; border-bottom-right-radius:0px;'><h1>". $categies["cat"]["categories_name"]."</h1></td></tr>\n";
		$cat_id = $categies["cat"]["categories_id"];
		foreach($categies["quiz_question"] as $question){
			$qq_ans =  $question["question_ans"];
			echo  "<tr><td bgcolor=#D8D8D8><b><font color='#4000FF'>คำถามข้อที่ ".$q_no." </font></b>";
			echo   html_entity_decode( $question["question_detail"])  ;
 			echo 	"</td></tr>\n";
			foreach($question["ans"] as $ans){
				echo "<tr><td><input type=radio name=a_$qlist_no value=1 id=\"ans_$qlist_no\"> 1 ). ". $ans["ans1"]."<br> </td></tr>\n";
				echo "<tr><td><input type=radio name=a_$qlist_no value=2 id=\"ans_$qlist_no\"> 2 ). ". $ans["ans2"]."<br></td></tr>\n";
				echo "<tr><td><input type=radio name=a_$qlist_no value=3 id=\"ans_$qlist_no\"> 3 ). ". $ans["ans3"]."<br></td></tr>\n";
				echo "<tr><td><input type=radio name=a_$qlist_no value=4 id=\"ans_$qlist_no\"> 4 ). ". $ans["ans4"]."<br></td></tr>\n";
				echo "<input type=hidden name=qa id=qa_$qlist_no value=".$qq_ans.">";
				echo "<input type=hidden name=unit_num id=unit_$qlist_no value=".$cat_id.">";
			}
			$q_no++;
			$qlist_no++;
		 
		}
		 
	}
 
?>
 </table>
 <br>
 <input type=button name=calulate id=submit value=" ตรวจสอบคำตอบ " class="k-button" >
 </center>
 <script>
                $(document).ready(function() {
                	$("#submit").click(function(){ 
                		 var loading = "<center><img src='<?=base_url(); ?>/css/images/loading_home.gif'></center>";
                    	var i=0;
                    	<?php 
                    		 for($j=1;$j<$qlist_no;$j++){
                    			echo "var p$j = $(\"#ans_$j:checked\").val(); \n ";
                    			echo "var qa$j = $(\"#qa_$j\").val(); \n ";
                    			echo "var unit_$j = $(\"#unit_$j\").val(); \n ";
                    			echo "var cnt = ". $qlist_no.";";
                    		}
                 
                    	?>
                    	if (confirm("ต้องการจะบันทึกข้อมูลหรือไม่ ?")) 
                        { 
                    		$.ajax({
	        					url : "<?php echo base_url();?>index.php/quiz/check",
	        					type: "POST",
	        					data:({ 
	        						<?php 
	        	                    		 for($j=1;$j<$qlist_no;$j++){
	        	                    			echo "p$j:p$j, \n";
	        	                    			echo "qa$j: qa$j, \n";
	        	                    			echo "unit_$j:unit_$j, \n";
	        	                    			 
	        	                    		}
	        	                 
	        	                    	?>	
	        	                    		cnt:cnt
		        					}),
		        				 beforeSend : function(){
			        				// alert("sdfasdf");
	    								$("#loading").html(loading);
	    								//$("#submit").attr("disabled","disabled");
								 },
								 success : function(rs){
        							 
	            						$("#loading").html('');
	            						 window.location.href ="<? echo base_url()?>index.php/quiz/sumScore";
								 }
                    		});
        					
                        }
                	});
                });
 </script>