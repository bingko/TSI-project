
        <div id="example">
            <div id="grid"></div>

            <script>
                $(document).ready(function () {
                    $("#grid").kendoGrid({
                        dataSource: {
                            type: "json",
                            transport: {
                                read: "<?php echo base_url();?>/index.php/report/getAllMember"
                            },
                            pageSize: 20
                        },
                        height: 550,
                        groupable: true,
                        sortable: true,
                        pageable: {
                            refresh: true,
                            pageSizes: true,
                            buttonCount: 5
                        },
                        columns: [{
                            field: "date_time",
                            title: "วันที่",
                            width: 150
                        }, {
                            field: "member_name",
                            title: "ชื่อ-สกุล"
                        },  {
                            field: "section",
                            title: "หมวด",
                            	width: 350
                        },
                         {
                            field: "avg_score",
                            title: "ผลประเมิน",
                            template: ' #=avg_score# %' ,
                            width: 80
                         
                        }, {
                            field: "pass",
                            title: "ผล",
                            width: 80
                        },]
                    });
                });
            </script>
        </div>