<?php 
$attributes = array( 'name' => 'myform2');
echo form_open("application/MasterReel",$attributes);
?>
<div id=loading></div>
  <div id="example">
    <textarea id="editor" rows="5" cols="20" style="width:100%;height:400px">
    </textarea>

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

คำตอบที่ 1. <input type=radio name=aaa id=ans1 value=1 class="k-radio" > <input type=text size=50  id="ans_text1" class="k-textbox" > <br><br>
คำตอบที่ 2. <input type=radio name=aaa id=ans2 value=1 class="k-radio" > <input type=text size=50  id="ans_text2" class="k-textbox"> <br><br>
คำตอบที่ 3. <input type=radio name=aaa id=ans3 value=1 class="k-radio" > <input type=text size=50  id="ans_text3" class="k-textbox"> <br><br>
คำตอบที่ 4. <input type=radio name=aaa id=ans4 value=1 class="k-radio" > <input type=text size=50  id="ans_text4" class="k-textbox"> <br>
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
 
    		 var loading = "<center><img src='<?=base_url(); ?>/css/images/loading_home.gif'></center>";
        	 //alert(ans_text1);
    		 $.ajax({
					url : "<?php echo base_url();?>index.php/quiz/saveNewQuiz",
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
							cat : cat
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





                    