<?php 
	$attributes = array( 'name' => 'myform2');
	echo form_open("application/MasterReel",$attributes);
	//echo "<pre>";
	// print_r($question);
	$check_1="";
	$check_2="";
	$check_3="";
	$check_4="";
	
	switch($question["question_ans"]){
		case "1" : $check_1 = "checked"; break;
		case "2" : $check_2 = "checked"; break;
		case "3" : $check_3 = "checked"; break;
		case "4" : $check_4 = "checked"; break;
	}
?>
<div id=loading></div>
  <div id="example">
    <textarea id="editor" rows="5" cols="20" style="width:100%;height:400px">
    <?php echo $question["question_detail"];?></textarea>

    <script>
        $("#editor").kendoEditor({
            tools: [
                "bold",
                "italic",
                "underline",
                "strikethrough",
                "justifyLeft",
                "justifyCenter",
                "justifyRight",
                "justifyFull",
                "insertUnorderedList",
                "insertOrderedList",
                "indent",
                "outdent",
                "createLink",
                "unlink",
                "insertImage",
                "insertFile",
                "subscript",
                "superscript",
                "createTable",
                "addRowAbove",
                "addRowBelow",
                "addColumnLeft",
                "addColumnRight",
                "deleteRow",
                "deleteColumn",
                "viewHtml",
                "formatting",
                "cleanFormatting",
                "fontName",
                "fontSize",
                "foreColor",
                "backColor"
            ]
        });
    </script>
</div>

คำตอบที่ 1. <input type=radio name=aaa id=ans1 value=1 class="k-radio" <?php echo @$check_1;?> > <input type=text size=50  id="ans_text1" class="k-textbox" value="<?php echo $question["ans1"];?>"> <br><br>
คำตอบที่ 2. <input type=radio name=aaa id=ans2 value=2 class="k-radio" <?php echo @$check_2;?> > <input type=text size=50  id="ans_text2" class="k-textbox" value="<?php echo $question["ans2"];?>"> <br><br>
คำตอบที่ 3. <input type=radio name=aaa id=ans3 value=3 class="k-radio" <?php echo @$check_3;?> > <input type=text size=50  id="ans_text3" class="k-textbox" value="<?php echo $question["ans3"];?>"> <br><br>
คำตอบที่ 4. <input type=radio name=aaa id=ans4 value=4 class="k-radio" <?php echo @$check_4;?> > <input type=text size=50  id="ans_text4" class="k-textbox" value="<?php echo $question["ans4"];?>"> <br>


<center>
<br> 
<input type=button id=newQuestion value="บันทึกคำถาม" class="k-button"> <input type=button id=newQuestion value="ยกเลิก" onclick="window.back();" class="k-button">
</center>
    
<?php echo form_close();?>

<script>
    $(document).ready(function() {
    	 $("#newQuestion").click(function(){ 
    		 var question = $("#editor").val();
    		 var ans1 = $("#ans1:checked").val();
    		 var ans2 = $("#ans2:checked").val();
    		 var ans3 = $("#ans3:checked").val();
    		 var ans4 = $("#ans4:checked").val();
    		 var ans_text1 = $("#ans_text1").val();
    		 var ans_text2 = $("#ans_text2").val();
    		 var ans_text3 = $("#ans_text3").val();
    		 var ans_text4 = $("#ans_text4").val();
    		 var cat = <?php echo $this->uri->segment(3) ; ?>;
    		 var qid = <?php echo $this->uri->segment(4) ; ?>;
    		 var loading = "<center><img src='<?=base_url(); ?>/css/images/loading_home.gif'></center>";
        	 //alert(ans_text1);
    		 $.ajax({
					url : "<?php echo base_url();?>index.php/quiz/saveModifyQuiz",
					type: "POST",
					data:({
							question:question,
							ans1:ans1,
							ans2:ans2,
							ans3:ans3,
							ans4:ans4,
							ans_text1:ans_text1,
							ans_text2:ans_text2,
							ans_text3:ans_text3,	
							ans_text4:ans_text4,
							cat : cat,
							qid : qid
						}),
					beforeSend : function(){
						$("#loading").html(loading);
						//$("#submit").attr("disabled","disabled");
					},
					success : function(rs){	 
						$("#loading").html('');
						//alert(rs);
				     window.location.href ="<? echo base_url()?>index.php/quiz/listQuiz/<?php echo $this->uri->segment(3) ; ?>";
					}
    		 });
     	 });
    });
</script>





                    