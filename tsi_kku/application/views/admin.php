<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">ผู้ดูแลระบบ</a>
        </li>
        <li>
            <a href="#">พ.ร.บ กฏหมาย</a>
        </li>
    </ul>
</div>
	<div>
    <!-- Detail -->
    <div id="example" ng-app="KendoDemos">
    <div ng-controller="MyCtrl">
        <div kendo-tab-strip k-content-urls="[ null, null]">
          <!-- tab list -->
          <ul>
            <li class="k-state-active">ภาษี</li>
            <li>ควบคุมอาคาร</li>
          </ul>
      
          <div style="padding: 1em">
              <div align="right">
			  <p><?php echo anchor('#','<i class="glyphicon glyphicon-plus" style="font-size:25px;"></i> เพิ่มข้อมูล','data-toggle="modal" data-target="#myModal"')?></p>
              </div>
              <!-- Button trigger modal -->

<!-- Modal -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                <tr>
                  <td width="8%"><div align="center"><strong>ลำดับ</strong></div></td>
                  <td width="15%"><div align="center"><strong>รหัส</strong></div></td>
                  <td width="51%"><div align="center"><strong>ชื่อหมวด</strong></div></td>
                  <td width="17%"><div align="center"><strong>วันที่</strong></div></td>
                  <td width="9%"><div align="center"><strong>จัดการ</strong></div></td>
                </tr>
                <?php for($i=1;$i<15;$i++){?>
                <tr>
                  <td><div align="center"><?php echo $i?></div></td>
                  <td>xxxxxxxxx</td>
                  <td>xxxxxxxxxxxxxxxxxxx</td>
                  <td><div align="center"><?php echo date('Y-m-d')?></div></td>
                  <td><div align="center"><i class="glyphicon glyphicon-list-alt
" style="font-size:25px;"></i> <i class="glyphicon glyphicon-trash" style="font-size:25px;"></i></div></td>
                </tr>
                <?php } ?>
              </table>
          </div>
      
          <div style="padding: 1em">
            This is the second tab
          </div>
        </div>
    </div>
	</div>
<script>
  angular.module("KendoDemos", [ "kendo.directives" ]);
  function MyCtrl($scope) {
  $scope.hello = "Hello from Controller!";
}
</script>
	<!-- Detail -->
    </div>
    </div>