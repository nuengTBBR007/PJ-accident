<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<title>Untitled Document</title>
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
body {
	background-image: url(images/BGDR3.jpg);
}
</style>
</head>
<?php
        $Search = null;
        if(isset($_POST["txtSearch"]))
        {
            $Search = $_POST["txtSearch"];
        }

        include('connect.php');

        $sql = "SELECT * FROM help WHERE head LIKE '%".$Search."%'";
        $query = mysqli_query($conn, $sql);
    ?>
<body class="body">
<header style="align-items: center; display: flex; background-color:#FFCC66; height: 60px;">
<div style="align-items: center; display: flex;justify-content: space-between; width: 100%;">
    <div style="width:25%; margin-left: 2%; align-items: center; display: flex;">
    <!-- Logo icon -->
        <img src="images/logo_web.png" alt="homepage" height="50" width="50"/>
    <!-- Logo text -->
    <font style="font-size: 20px; margin-left:1%;" > Support Accident </font>
    </div>
    <div style="width:80%; margin-left: 0%; align-items: center; display: flex;">
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
        $sqluser = "SELECT * FROM member WHERE Username ='$Username'";
        $queryuser = mysqli_query($conn, $sqluser);
		$resultuser = mysqli_fetch_array($queryuser, MYSQLI_ASSOC);
	?>
    <a href="home.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px"> หน้าหลัก</a>
    <a href="help.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">ขอความช่วยเหลือ</a>
    <a href="massage.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">กระดานรับแจ้งเหตุ</a>
    <?php if($resultuser["status"] == 'staff'): ?>
    <a href="status.php?Username=<?php echo $Username; ?>" style="margin-left: 4%;font-size:15px">ข้อมูลสถานะอุบัติเหตุ</a>
     <?php elseif($resultuser["status"] !== 'staff'):?>
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
          <?php if($resultuser["status"] == 'staff'): ?>
          	<a href="history.php?username=<?php echo $Username; ?>">ประวัติการช่วยเหลือ</a>
            <?php elseif($resultuser["status"] !== 'staff'):?>
     		<?php endif;?>
            <a href="logout.php?username=<?php echo $Username; ?>">ออกจากระบบ</a>
          </div>
        </div>
    </div>
    <?php endif;?>
</div>
</header>
 <center>
 <img src="images/Mass.jpg" width="350" height="150" style= "margin-top:3%; margin-bottom:40px"/>
    <form name="search" method="post">
        <table width="80%" border="0">
            <tr>
                <th> <div align="center" style="font-size:16px"> ค้นหารายการอุบัติเหตุ :
                        <input name="txtSearch" type="text" id="txtSearch" value="<?php echo($Search); ?>" style="height: 20px"/>
                        <input type="submit" value="Search" style="font-size:16px"/>
                    </div>
                </th>
            </tr>
        </table>
    </form>
<table width="70%" border="1" style="margin-top: 2%; margin-bottom: 10%; font-size: 18px">	
  <tr style="height: 40px;">
   <td width="49"><center>ลำดับ</center></td>
    <td width="216"><center>รายการ</center></td>
    <td width="107"><center>เวลา/วันที่</center></td>
    <td width="160"><center>สถานะ</center></td>
    <?php if($Username !== '' && $resultuser["status"] == 'staff'):?>
    <td width="165"><center>เช็คข้อมูล </center></td>
    <td width="165"><center>หมายเหตุ</center></td>
     <?php elseif($Username !== '' && $resultuser["status"] == 'user') :?>
     <td width="165"><center>เช็คข้อมูล </center></td>
     <?php elseif($Username == '') :?>
     <?php endif;?>
  </tr>
 <?php

	$x = 0;
	while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		$x = $x + 1;
		?>
  <tr>
    <td align="center" style="width: 5%"><?php echo ($x) ?></td>
    <td align="center"><?php echo ($result["head"]) ?></td>
    <td align="center"><?php echo ($result["date"]) ?></td>
    <td align="center"><?php echo ($result["statusstaff"]) ?></td>
    <?php if($Username !== '' && $resultuser["status"] == 'staff' && $result["statusstaff"] == 'กำลังให้ความช่วยเหลือ'):?>
    <td align="center"><a href="detel.php?Username=<?php echo $Username; ?>&idhelp=<?php echo ($result["id"]); ?>" >ดูข้อมูล </a></td>
    <td align="center">มีผู้รับเหตูไปแล้ว</td>
    <?php elseif($Username !== '' && $resultuser["status"] == 'staff' && $result["statusstaff"] !== 'กำลังให้ความช่วยเหลือ'):?>
    <td align="center"><a href="detel.php?Username=<?php echo $Username; ?>&idhelp=<?php echo ($result["id"]); ?>" >ดูข้อมูล </a></td>
    <td align="center"><input type="submit" name="button" id="button" value="รับเหตุ" style="font-size:18px"
    onclick="JavaScript:if(confirm('ต้องการรับเหตูนี้?')==true)
                {window.location='updatemassage.php?Username=<?php echo $Username; ?>&id=<?php echo ($result["id"]) ?>';}"/></td>
     <?php elseif($Username !== '' && $resultuser["status"] == 'user') :?>
     <td align="center"><a href="detel.php?Username=<?php echo $Username; ?>&idhelp=<?php echo ($result["id"]); ?>" >ดูข้อมูล </a></td>
     <?php elseif($Username == '') :?>
     <?php endif;?>
  </tr>
   <?php
}
?>
</table>
</center>
<?php
mysqli_close($conn);
?>
</body>
</html>