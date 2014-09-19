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
  <div style="position:absolute; width:100%; height:80px; top:0px; left:px; float:left; background-image:url(../../images/header-kku.jpg)">
<div style="position:absolute; top:0px; left:20px;"> <a href="#"><img src="<?php echo base_url()?>images/tsi.png" height="70"></a> </div>
<div style="position:absolute; top:10px; right:30px;">  <b><a href='<?php echo base_url()."index.php/register/";?>'> ลงทะเบียนใหม่</a></b> </div>
</div>
  <!-- Nav --> 
</header>
<hr><br>

<!-- Intro -->
  <?php echo form_open('admin')?>
  <div align="center" style=" position:relative; left:50%; margin-left:-375px;width:750px;"><strong>REGISTER!</strong><br />
    <br />
    <table align="center" width="100%" height="" style="border:1px; border-style:dotted; border-radius:10px;">
      <tr>
        <td><label id="txt_name" class="required">ชื่อ :</label></td>
        <td><input type="text" name="txt_name" id="txt_name" class="k-textbox" placeholder="Please enter name"  required data-email-msg="Name format is not valid" style="width: 200px;" /></td>
      </tr>
      <tr>
        <td><label id="txt_surename" class="required">สกุล :</label></td>
        <td><input type="text" name="txt_surename" id="txt_surename" class="k-textbox" placeholder="Please enter Lastname"  
        required data-email-msg="Email format is not valid" style="width: 200px;" /></td>
      </tr>
      <tr>
        <td><label id="rdomale">เพศ : </label></td>
        <td><input type="radio" name="rdosex" id="rdomale" value="M">
          Male
          <input type="radio" name="rdosex" id="rdofmale" value="F">
          Female </td>
      </tr>
      <tr>
        <td><label for="tel" class="required">เบอร์โทร : </label></td>
        <td><input type="tel" id="tel" name="tel" class="k-textbox" pattern="\d{10}" placeholder="กรุณาใส่เบอร์โทร 10 หลัก" required
                validationMessage="Enter at least ten digits" style="width: 200px;"/></td>
      </tr>
      <tr>
        <td><label for="txt_email" class="required">E-mail : </label></td>
        <td><input type="email" id="txt_email" name="txt_email" class="k-textbox" placeholder="e.g. myname@example.net"  required data-email-msg="Email format is not valid" style="width:200px;" /></td>
      </tr>
      <tr>
        <td valign="top"><label id="txt_addr">ที่อยู่ :</label></td>
        <td><textarea name="txt_addr" id="txt_addr" class="k-textbox" style="width:300px;"></textarea></td>
      </tr>
      <tr>
        <td><label id="class">การศึกษา :</label></td>
        <td><select name="class" id="class" class="k-textbox" onchange="loadTravelPlace(this.value)">
            <option value="">-- เลือกการศึกษา --</option>
            <option>มัธยมศึกษาตอนต้น</option>
            <option>มัธยมศึกษาตอนปลาย</option>
            <option>ปวช.</option>
            <option>ปวส.</option>
            <option>ปริญญาตรี</option>
            <option>ปริญญาโท</option>
            <option>ปริญญาเอก</option>
          </select>
          <label name="other" id="other">อื่นๆ :</label>
          <input type="text" name="other" id="other" class="k-textbox">
          <br>
          <br></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" class="k-button" style="width:200px;" value="บันทึก"><br><br>

</td>
      </tr>
    </table>
  </div>
  <?php echo form_close()?> 
</body>
</html>