<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->

<?php 
			echo link_tag('css/kendo.common.min.css');
			echo link_tag('css/kendo.default.min.css');
			
		?>

<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

<!-- Header -->
<header id="header"> 
  <!-- Logo -->
  <div style="position:relative; top:0px; left:50px; float:left; width:100%"> <a href="#"><img src="<?php echo base_url()?>images/en-kku50th.png" ></a></div>
  <!-- Nav --> 
</header>
<body>
<br><br><br><br><br><center> 
<h2>ยินดีต้อนรับคุณ <?php print_r(  $this->session->userdata('displayname'));?> </h2>
<br>
	 <input type="button" name="next" value=" เริ่มการทดสอบ " class="k-button" onclick="window.location.href='<?php echo base_url();?>index.php/quiz/start';">
</center>	
</body>
</html>