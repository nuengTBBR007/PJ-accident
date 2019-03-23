<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<title>Untitled Document</title>
</head>
<style>
.body {
	background-image: url('images/BGDR3.jpg'); 
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
  right:0;
  left:auto;
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
<header style="align-items: center; display: flex; background-color:#FFCC66; height: 60px;">
<div style="align-items: center; display: flex;justify-content: space-between; width: 100%;">
    <div style="width:25%; margin-left: 2%; align-items: center; display: flex;">
    <!-- Logo icon -->
        <img src="images/logo_web.png" alt="homepage" height="50" width="50"/>
    <!-- Logo text -->
    <font style="font-size: 20px; margin-left:1%;" > Support Accident </font>
    </div>
    <div style="width:100%; margin-left: 0%; align-items: center; display: flex;">
    <?php 
	$Username = "";

	if(isset($_GET["Username"])){
		$Username = $_GET["Username"];
	}
	if($Username === ''):?>
    <a href="home.php" style="margin-left: 4%;font-size:15px"> หน้าหลัก</a>
    <a href="help.php" style="margin-left: 4%;font-size:15px">ขอความช่วยเหลือ</a>
    <a href="massage.php" style="margin-left: 4%;font-size:15px">กระดานรับแจ้งเหตุ</a>
    <a href="hospital.php" style="margin-left: 4%;font-size:15px">สถานพยาบาล</a>
    <a href="helper.php" style="margin-left: 4%;font-size:15px">เจ้าหน้าที่กู้ภัย</a>
    <a href="re-register.php" style="margin-left: 4%;font-size:15px">แก้ไขข้อมูลส่วนตัว</a>
    <a href="login.php" style="margin-left: 4%;font-size:15px">Login</a>
    </div>
    <?php elseif($Username !== ''):
	
	 include('connect.php');

        $sql = "SELECT * FROM member WHERE Username ='$Username'";
        $query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	?>
    <a href="home.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px"> หน้าหลัก</a>
    <a href="help.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">ขอความช่วยเหลือ</a>
    <a href="massage.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">กระดานรับแจ้งเหตุ</a>
    <?php if($result["status"] == 'staff'): ?>
    <a href="status.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">ข้อมูลสถานะอุบัติเหตุ</a>
     <?php elseif($result["status"] !== 'staff'):?>
     <?php endif;?>
    <a href="hospital.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">สถานพยาบาล</a>
    <a href="helper.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">เจ้าหน้าที่กู้ภัย</a>
    <a href="re-register.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">แก้ไขข้อมูลส่วนตัว</a>
    </div>
    <div style=" width: 10%;align-items: center; display: flex;" align="right;">
    	<span style="font-size: 18px;"><?php echo $Username; ?></span>
        <div class="dropdown" style="margin-left:2%;">
          <button class="dropbtn"><img src="images/aeeow_drow.png" width="20" height="20" /></button>
          <div class="dropdown-content">
          <?php if($result["status"] == 'staff'): ?>
          	<a href="history.php?username=<?php echo $Username; ?>">ประวัติการช่วยเหลือ</a>
            <?php elseif($result["status"] !== 'staff'):?>
     		<?php endif;?>
            <a href="logout.php?username=<?php echo $Username; ?>">ออกจากระบบ</a>
          </div>
        </div>
    </div>
    <?php endif;?>
</div>

</header>

<body>
<center><div style="margin-top:3%"><font style="font-size:24px">ข้อมูลเจ้าหน้าที่กู้ภัย</font></div>
<table width="200" border="0"style="margin-top: 1%;">
  <tr>
    <td><img src="images/hh1.gif" width="250" height="200" style= "margin-top:0%; margin-bottom:6px; margin-left:0%"/></td>
    <td><img src="images/hh2.gif" width="250" height="200" style= "margin-top:0%; margin-bottom:6px; margin-left:0%"/></td>
    <td><img src="images/hh3.gif" width="250" height="200" style= "margin-top:0%; margin-bottom:6px; margin-left:0%"/></td>
    
  </tr>
  <tr>
  <center> 
<center>  <td><img src="images/hh11.png" width="250px" height="100px" onclick="window.location.href='https://www.narenthorn.or.th/about'" style= "margin-top:0%"/></td></center>
    <center><td><img src="images/hh21.png" width="250px" height="100px" onclick="window.location.href='http://www.romsaifoundation.com/?cid=2119542'" style= "margin-top:0%"/></td></center>
     <center><td><img src="images/hh31.png" width="250px" height="100px" onclick="window.location.href='https://www.pohtecktung.org/index.php?option=com_content&view=article&id=380&Itemid=228'" style= "margin-top:0%"/></td></center>
     </tr>
</table>
</body>
</html>