<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.body {
	background-image: url('images/bglogin.jpg'); 
	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;
	-o-background-size: 100% 100%, auto;
	-moz-background-size: 100% 100%, auto;
	-webkit-background-size: 100% 100%, auto;
	background-size: 100% 100%, auto;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
</head>

<body class="body">
<center>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -60%); width: 100%">
<div><font style="font-size:25px">Register</font> </div>
<div style="margin-top: 1%;">
<form id="form1" name="form1" method="post" action="insertMember.php" enctype="multipart/form-data">
<table width="50%" border="0">
  <tr>
    <td width="30%"><div align="right">Username :</div></td>
    <td width="70%">
      <input type="text" name="Username" id="Username" style="width:60%" />
    </form></td>
  </tr>
  
  <tr>
    <td><div align="right">Password :</div></td>
    <td>
      <input type="password" name="Password" id="Password" style="width:60%" />
    </td>
  </tr>
  <tr>
    <td><div align="right">Re-Password :</div></td>
    <td>
      <input type="password" name="re_Password" id="re_Password" style="width:60%" /></td>
  </tr>
  <tr>
    <td><div align="right">ชื่อ-สกุล :</div></td>
    <td>
      <input type="text" name="nsname" id="nsname" style="width:60%" /></td>
  </tr>
  
   <tr>
    <td><div align="right">Email :</div></td>
    <td>
      <input type="email" name="Email" id="Email" style="width:60%" /></td>
  </tr>
    <td><div align="right">เบอร์โทรศัพท์ :</div></td>
    <td>
      <input type="number" name="tel" id="tel" style="width:60%" /></td>
  </tr>
</table>
  <input type="submit" name="submit" id="submit" value="Register" style="margin-top:2%; font-size:20px; height: 30px;"/>
</form>
</div> 
</div>
</center>
</body>
</html>
