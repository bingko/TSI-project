 <h2> จัดการข้อสอบ </h2>
 
<? echo form_open("quiz/saveVDO" ); ?>
 <table width=50%><tr><td>บันทึก VDO สำหรับเป็นสื่อการให้ความรู้ <input type=text class="k-text" name="file"  value="<?php echo $cat["vdo1"];?>"></td><td align=left><input type=submit class="k-button"      value="บันทึก VDO"></td></tr></table>
<input type=hidden name=catId value="<?php echo $catID;?>">
 <?php echo form_close();?>
 <hr>
<p align=right>  <input type=button class="k-button"   onclick="window.location='<?php echo base_url();?>/index.php/quiz/newQuiz/<?php echo $catID;?>';"  value="เพิ่มข้อสอบ"> </p>
   <div id="example">
            <div id="grid"></div>
            <script>
            $(document).ready(function () {
                var crudServiceBaseUrl = "<?php echo base_url();?>/index.php/quiz",
                    dataSource = new kendo.data.DataSource({
                        transport: {
                            read:  {
                                url: crudServiceBaseUrl + "/listQuestion/<?php echo $catID;?>",
                                dataType: "json",
                                type: "POST"
                            },
                            
                            destroy: {
                                url: crudServiceBaseUrl + "/destroyQuestion",
                                dataType: "json",
                               type: "POST"
                            },
                             
                            parameterMap: function(options, operation) {
                               // alert(operation);
                                if (operation !== "read" && options.models) {
                                	//  alert(options.models);
                                	//alert(kendo.stringify(options.models));
                                    return {models: kendo.stringify(options.models)};
                                }
                            }
                        },
                       type: "POST",
                        batch: true,
                        pageSize: 20,
                        schema: {
                            model: {
                                id: "question_id",
                                fields: {
                                	question_id: { editable: false, nullable: true },
                                	question_detail: { validation: { required: true } },
                                 
                                }
                            }
                        }
                    });

                $("#grid").kendoGrid({
                  
                    dataSource: dataSource,
                    pageable: true,
                    type: "POST",
                    height: 650,
                    sortable: {
                        mode: "multiple",
                        allowUnsort: true
                    },
                    pageable: {
                        buttonCount: 10
                    },
                
                    columns: [
                        { field:"question_detail", title: "ข้อสอบ", 
                           
                          template: '<a href="<?php echo base_url()."index.php/quiz/editQuestion/".$catID."/";?>#=question_id#">#=question_detail#</a>' 
                          },
                          
                        { command: [  "destroy"], title: "&nbsp;", width: "200px" }],
                    editable: "popup"
                });
            });
            </script>
        </div>
  