
        <div id="example">
            <div id="grid"></div>

            <script>
                $(document).ready(function () {
                    $("#grid").kendoGrid({
                        dataSource: {
                            type: "json",
                            transport: {
                                read: "http://demos.telerik.com/kendo-ui/service/Northwind.svc/Customers"
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
                            field: "ContactName",
                            title: "วันที่",
                            width: 200
                        }, {
                            field: "ContactTitle",
                            title: "ชื่อ-สกุล"
                        }, {
                            field: "CompanyName",
                            title: "ผล"
                        }, {
                            field: "Country",
                            width: 150
                        }]
                    });
                });
            </script>
        </div>