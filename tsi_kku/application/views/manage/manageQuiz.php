 <h2> จัดการประเภทข้อสอบ </h2>

   
 
 <div id="example">
            <div id="grid"></div>

            <script>
                $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url();?>/index.php/quiz",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/listCat",
                                    dataType: "json"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/modifyCat",
                                    dataType: "json",
                                    type: "POST"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/destroyCat",
                                    dataType: "json",
                                   type: "POST"
                                },
                                create: {
                                   
                                    url: crudServiceBaseUrl + "/createCat",
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
                                    id: "categories_id",
                                    fields: {
                                    	categories_id: { editable: false, nullable: true },
                                    	categories_name: { validation: { required: true } },
                                    	cnt: { type: "number",validation: {   min: 0,required: true } },
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
                        toolbar: ["create"],
                        columns: [
                            { field:"categories_name", title: "หมวดข้อสอบ",
                               
                              template: '<a href="<?php echo base_url()."index.php/quiz/listQuiz/";?>#=categories_id#">#=categories_name#</a>' 
                              },
                              {field:"cnt", title: "จำนวนข้อสอบ",},
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "200px" }],
                        editable: "popup"
                    });
                });
            </script>
        </div>