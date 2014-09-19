<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.poptrox.min.js"></script>
<script src="<?php echo base_url()?>js/skel.min.js"></script>
<script src="<?php echo base_url()?>js/init.js"></script>
<?php 
			echo link_tag('css/style.css');
			echo link_tag('css/bootstrap.css');
?>

<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

<!-- Header --> 

<!-- Logo -->
<div class="header_img" style="position:absolute; width:100%; height:80px; top:0px; left:0px">
<div style="position:absolute; top:0px; left:20px;"> <a href="#"><img src="<?php echo base_url()?>images/tsi.png" height="70"></a> </div>
<div style="position:absolute; top:5px; right:30px;">  <b><a href='<?php echo base_url()."index.php/register/";?>'> ลงทะเบียนใหม่</a></b> </div>
</div>

<!-- Nav --> 

<!-- Intro --><br>
<div style="position:absolute; left:0px; top:50px; z-index:-1;" >
<img src="<?php echo base_url()?>images/image.png">
</div>

<div style="position:absolute; right:0px; bottom:10%; z-index:-1;" >
<img src="<?php echo base_url()?>images/bg-kku.png">
</div>
<img src="<?php echo base_url()?>images/tsi2.png"  width="450" style="position:absolute; right:15px;top:80px; z-index:2">
<div align="center" style="position:absolute; width:66%; left:50%; margin-left:-33%; min-height: 100%; top:0%; background:#fff; z-index:-5;" >
</div>
<div align="center" style="position:absolute; left:0px; top:100px; z-index:0;" >

</div>
<div align="center" style="position:absolute; left:35%; margin-left:-426px; top:50%; margin-top:-215px; z-index:-1;" >
<img src="<?php echo base_url()?>images/notebook.png">
</div>
<div align="center">
 </div>
  <div style="position:absolute; left:35%; top:50%; margin-top:-170px; margin-left:-225px; border:#fff solid 1px; width:450px; background:#999;opacity:0.90;">
      <?php echo form_open('login/checkLogin')?>
      <div align="center" style="color:#FFF">
     <div style="height:10px;"></div>
     <strong style="font-size:24px">LOGIN / เข้าสู่ระบบ</strong>
      <div style="height:10px;"></div>
                  <input name="username" type="text" class="form-control" id="username" placeholder="Username" style="background:none; width:300px; border-radius:0px; border-color:#f9f9f9;"/><div style="height:10px;"></div>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" style="background:none; width:300px; border-radius:0px;border-color:#f9f9f9;"/><br> 
        <div align="center">
        <input type="submit" name="button" id="button" value="Login" class="style2" style=" position:relative;height:50px; width:180px; text-align:center"/>
        </div>
                <?php if($this->uri->segment(3)=="fail"){ ?>
        <span style="color:red; font-size:16px;">Username หรือ Password ไม่ถูกต้อง กรุณากรอกใหม่ / </span>
        <?php } ?>
        <a href="#"><span style="font-size:16px;">ลืมรหัสผ่าน?</span></a>
        <div style="height:10px;"></div>
        </div>
      <?php echo form_close()?>
  </div>
</section>
    <div class="footer">
      <div class="container">
        <p class="text-muted">ติดต่อเรา : TSI KKU  Tel. 0-4320-2401 | <a href="mailto:someone@example.com" target="_top">ติดต่อทาง e-mail</a> | 
Copyright © 2014, All rights reserved Thailand Securities Institute (TSI), Khon Kaen University.</p>
      </div>
    </div>
</body>
</html>