<!DOCTYPE HTML>
<html>
<head>
<title>Register - สมัครสมาชิก</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->

<?php 
			echo link_tag('css/style.css');
			echo link_tag('css/kendo.common.min.css');
			echo link_tag('css/kendo.default.min.css');
			
		?>

<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

<!-- Header -->
  <!-- Logo -->
<div class="header_img" style="position:absolute; width:100%; height:80px; top:0px;">
<div style="position:absolute; top:0px; left:20px;"> <a href="#"><img src="<?php echo base_url()?>images/tsi.png" height="70"></a> </div>
<div style="position:absolute; top:5px; right:30px;">  <b><a href='<?php echo base_url()."index.php";?>'> เข้าสู่ระบบ</a></b> </div>
</div>
  <!-- Nav --> 

<!-- Intro -->
  <?php echo form_open('register/regist')?><br>

  <div align="center" style=" position:relative; left:50%; margin-left:-375px;width:750px;">
    <br />
    <table align="center" bgcolor="#f9f9f9" width="80%" height="" style="border:1px; border-style:solid; border-radius:10px;">
        <tr>
    	<td colspan="2" align="center"><strong style="font-size:32px">REGISTER / สมัครสมาชิก</strong></td>
        <td></td>
    </tr>

      <tr>
        <td   width="30%" align=right><label id="txt_name" class="required">ชื่อ &nbsp;</label></td>
        <td><input type="text" name="txt_name" id="txt_name" class="k-textbox" style="width:450px;" placeholder="ชื่อ-สกุล"  required data-email-msg="Name format is not valid" style="width: 200px;" /></td>
      </tr>
 	<tr>
        <td  align=right><label for="txt_email" class="required">E-mail (Username) &nbsp; </label></td>
        <td><input type="email" id="txt_email" name="txt_email" class="k-textbox" style="width:450px;" placeholder="e.g. myname@example.net"  required data-email-msg="Email format is not valid" style="width:200px;" /></td>
      </tr>
	 <tr>
        <td width="20%" align=right><label id="txt_name" class="required">สร้างรหัสผ่าน &nbsp;</label></td>
        <td><input type="password" name="pwd1" id="txt_name" class="k-textbox" style="width:450px;" placeholder="สร้างรหัสผ่าน"  required data-email-msg="Name format is not valid" style="width: 200px;" /></td>
      </tr>
	 <tr>
        <td width="20%" align=right><label id="txt_name" class="required">ยืนยันการสร้างรหัสผ่าน &nbsp;</label></td>
        <td><input type="password" name="pwd2" id="txt_name" class="k-textbox" style="width:450px;" placeholder="ยืนยันการสร้างรหัสผ่าน"  required data-email-msg="Name format is not valid" style="width: 200px;" /></td>
      </tr>    
      <tr>
        <td  align=right><label id="rdomale">เพศ &nbsp;</label></td>
        <td><input type="radio" name="rdosex" id="rdomale" value="1" checked>
          ชาย
          <input type="radio" name="rdosex" id="rdofmale" value="0">
          หญิง </td>
      </tr>
      <tr>
        <td  align=right><label for="tel" class="required">เบอร์โทร &nbsp;</label></td>
        <td><input type="tel" id="tel" name="tel" class="k-textbox" style="width:450px;" pattern="\d{10}" placeholder="กรุณาใส่เบอร์โทร 10 หลัก" required
                validationMessage="Enter at least ten digits" style="width: 200px;"/></td>
      </tr>
      
      <tr>
        <td valign="top"  align=right><label id="txt_addr">ที่อยู่ &nbsp;</label></td>
        <td><textarea name="txt_addr" id="txt_addr" class="k-textbox" style="width:450px;"></textarea></td>
      </tr>
      <tr>
        <td  align=right><label id="class">การศึกษา &nbsp;</label></td>
        <td><select name="degree" id="class" class="k-textbox" style="width:450px;" onchange="loadTravelPlace(this.value)">
            <option value="">-- เลือกการศึกษา --</option>
            <option>มัธยมศึกษาตอนต้น</option>
            <option>มัธยมศึกษาตอนปลาย</option>
            <option>ปวช.</option>
            <option>ปวส.</option>
            <option>ปริญญาตรี</option>
            <option>ปริญญาโท</option>
            <option>ปริญญาเอก</option>
          </select>
          
         </td>
      </tr>
      <tr>
        <td colspan="2" align="center"> <br><input type="submit" name="btn_submit" id="btn_submit" class="k-button" style="width:300px;" value="บันทึก"><br><br>

</td>
      </tr>
    </table>
  </div>
  <?php echo form_close()?> 
</body>
</html>