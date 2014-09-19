<?php $session = $this->session->all_userdata(); // ประกาศsessionเข้าตัวแปร$session 
		if(! $this->session->userdata('logged_in')){
		 
			redirect(base_url().'/index.php/login/', 'refresh');
		}
	//	print_r($this->session->userdata('uid'));
?>
<!DOCTYPE html>
<html lang="en">
	<head>

	<meta charset="utf-8">
	<title>MS - KKU</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="<?php echo base_url()?>js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>js/angular.min.js"></script>
	<script src="<?php echo base_url()?>js/kendo.all.min.js"></script>

	<!-- The styles -->
<?php 
    echo link_tag('css/bootstrap.css');
	echo link_tag('css/bootstrap-united.min.css');
    echo link_tag('css/charisma-app.css');
    echo link_tag('css/font-awesome.min.css');
    echo link_tag('css/kendo.common.min.css');
    echo link_tag('css/kendo.bootstrap.min.css');    
	echo link_tag('css/kendo.default.min.css');
    echo link_tag('css/kendo.dataviz.default.min.css');
	//echo link_tag('css/moonlight.min.css');
	
?>
	<!-- jQuery -->
	<script src="<?php echo base_url()?>js/jquery-1.10.2.js"></script>
	<script src="<?php echo base_url()?>js/date_time_th.js"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->
	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<script src="<?php echo base_url()?>js/kendo.all.min.js"></script>
	<style>
body {
<?php if($session['font_size']!="") {
	 echo "font-size:".$session['font_size']."px;"; // set font size by session
	}
	else {
	 echo "font-size:14px;"; // default font size
	}
?>
}
</style>
	</head>

	<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">
      <div class="navbar-inner">
    <button type="button" class="navbar-toggle pull-left animated flip"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div style="position:absolute; top:0px; left:20px;"> <a href="#"><img src="<?php echo base_url()?>images/tsi.png" height="70"></a> </div>
    
    <!-- user dropdown starts -->
    <div class="btn-group pull-right" style="right:300px;top:-10px;"> </div>
    <div class="btn-group pull-right" style="right:100px;top:-10px;">
          <div style=" float:left"> <span class="hidden-sm hidden-xs">ชื่อผู้ใช้งาน :  <?php  echo $this->session->userdata('displayname'); ?></span>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
        <?php $uri = $this->uri->uri_string(); ?>
        
		</div>
          <br>
          <div style=" float:left"> <span id="date_time"></span> 
        <script type="text/javascript">window.onload = date_time('date_time');</script> 
      </div>
        </div>
    <ul class="collapse navbar-collapse nav navbar-nav top-menu">
        </ul>
  </div>
    </div>
<!-- topbar ends -->
<div class="ch-container">
      <div class="row"> 
    
    <!-- left menu starts -->
    <div class="col-sm-2 col-lg-2">
          <div class="sidebar-nav">
        <div class="nav-canvas">
              <div class="nav-sm nav nav-stacked"> </div>
              <ul class="nav nav-pills nav-stacked main-menu">
            <li class="nav-header">ผู้ดูแลระบบ</li>
            <li><?php echo anchor('admin','<i class="glyphicon glyphicon-home"></i>&nbsp;<span> หน้าแรก </span>')?></li>
            <li><?php echo anchor('report','<i class="fa fa-files-o"></i></i>&nbsp;<span> รายงานผู้ทดสอบ </span>')?></li>
            <li><?php echo anchor('quiz/manageQuiz','<i class="fa fa-bar-chart-o"></i>&nbsp;<span> จัดการข้อสอบ </span>')?></li>
           
             <li><?php echo anchor('login/logout','&nbsp;<i class="fa fa-male"></i>&nbsp; <span> Logout </span>')?></li>
          </ul>
            </div>
      </div>
        </div>
    <!--/span--> 
    <!-- left menu ends -->
    <div id="content" class="col-lg-10 col-sm-10"> <?php echo $this->load->view($page)?> </div>
    <!--/#content.col-md-0--> 
  </div>
      <!--/fluid-row-->
      
      <hr>
      <footer class="row">
    <p align="center" class="col-md-12 col-sm-12 col-xs-12 copyright"> 
          <!-- Footer here  --> 
        </p>
  </footer>
    </div>
<!--/.fluid-container--> 
<script src="<?php echo base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url()?>js/charisma.js"></script> 
<script src="<?php echo base_url()?>js/jquery.history.js"></script> 
<script src="<?php echo base_url()?>js/jquery.cookie.js"></script>
</body>
</html>
