<center> <table class="table table-bordered" style="border-radius:10px; width:80%;">
<?php 

 	//print_r($quiz_all);
 	$qlist_no = 1;

	foreach($quiz_all as $categies){
		$q_no = 1; 	 
		echo "<tr><td bgcolor=#61210B style='border-radius:10px; border-bottom-left-radius:0px; border-bottom-right-radius:0px; color:#fff;'><h1>". $categies["cat"]["categories_name"]."</h1></td></tr>\n";
		echo "<tr><td bgcolor=#cccccc align=center> ";
		
?>

<script type="text/javascript" src="http://www.webestools.com/page/js/flashobject.js"></script>
<div id="player_3164" style="display:inline-block;">
    <a href="http://get.adobe.com/flashplayer/">You need to install the Flash plugin</a> - <a href="http://www.webestools.com/">http://www.webestools.com/</a>
</div>
<script type="text/javascript">
    var flashvars_3164 = {};
    var params_3164 = {
        quality: "high",
        wmode: "transparent",
        bgcolor: "#ffffff",
        allowScriptAccess: "always",
        allowFullScreen: "true",
        flashvars: "fichier=http://192.168.1.3/tsi_kku/abc.mp4&apercu=http%3A%2F%2Fwww.tsi-thailand.org%2Ftemplates%2Ftsi_home2014%2Fimages%2FTSIWebsite2013_tsilogo.png"
        	  };
    var attributes_3164 = {};
    flashObject("http://flash.webestools.com/flv_player/v1_23.swf", "player_3164", "576", "324", "8", false, flashvars_3164, params_3164, attributes_3164);
</script>



<br />
<br>
    วีดีโอนี้เป็นลิขสิทธิ์ของ คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น 
ห้ามนำเผยแพร่ก่อนได้รับอนุญาต  

 <?php echo "</h1></td></tr>\n";
		foreach($categies["quiz_question"] as $question){
			echo  "<tr><td bgcolor=#F7F8E0><b>คำถามข้อที่ ".$q_no." </b>";
			echo   html_entity_decode( $question["question_detail"])  ;
 			echo 	"</td></tr>\n";
 			
			$cat_id = $categies["cat"]["categories_id"];
			foreach($question["ans"] as $ans){
				$qq_ans =  $question["question_ans"];
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
 	$no = $this->session->userdata('no');
 	 $no=$no+1;
 	$newdata=array( 'no'     => $no);
 	$this->session->set_userdata($newdata);
 	//print_r($quiz_all);
 	//$qlist_no = 1;
?>
 </table> <br> 
 
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
        							 //alert(rs);
	            						$("#loading").html('');
	            						  window.location.href ="<? echo base_url()?>index.php/quiz/sumScore";
								 }
                    		});
        					
                        }
                	});
                });
 </script>