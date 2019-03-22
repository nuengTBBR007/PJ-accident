<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.body {
	background-image: url('./images/bglogin.jpg'); 
	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;
	-o-background-size: 100% 100%, auto;
	-moz-background-size: 100% 100%, auto;
	-webkit-background-size: 100% 100%, auto;
	background-size: 100% 100%, auto;
}

.dropbtn {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
</head>

<body class="body">
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -60%); width: 100%">
    <center>
        <div><font style="font-size:25px">Login</font> </div>
        <div style="margin-top: 3%;">
            <form id="form1" name="form1" method="post" action="checkLogin.php">
            <table width="36%" border="0">
              <tr>
                <td>UserName</td>
              </tr>
              <tr>
                <td height="38">
                  <input type="text" name="UserName" id="UserName" style="width:100%" /></td>
              </tr>
              <tr>
                <td>Password</td>
              </tr>
              <tr>
                <td height="41">
                  <input type="password" name="Password" id="Password" style="width:100%;"/></td>
              </tr>
            </table>
            <button type="submit" name="button" id="button" style="margin-top:2%; font-size:20px; height: 30px;">Login</button>
            </form>
        </div>
    </center>
    <div style ="margin-left:35%">
    	<a href="register.php">Register</a>
        <a href="home.php" style="margin-left:35%">หน้าหลัก</a>
    </div>
    </div>

</body>
</html>
