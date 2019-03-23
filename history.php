<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<title>Untitled Document</title>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<style>

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
.row{
display:-webkit-box;
display:-ms-flexbox;
display:flex;
-ms-flex-wrap:wrap;
flex-wrap:wrap;
margin-right:-10px;
margin-left:-10px
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>

<body>
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

	if(isset($_GET["username"])){
		$Username = $_GET["username"];
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
<?php
        $Search = null;
        if(isset($_POST["txtSearch"]))
        {
            $Search = $_POST["txtSearch"];
        }
 	include('connect.php');
	$user = $Username;
	$sql = "SELECT * FROM help WHERE head LIKE '%".$Search."%' AND statusstaff = 'ช่วยเหลือเสร็จสิ้น' AND staff ='$Username'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($query);
?>
<div>
<div style="position: absolute; top: 30%; left: 40%; transform: translate(-40%, -70%); width: 100%">
<center>
<h1>ประวัติการช่วยเหลือ</h1>
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
    <?php if($row>0): ?>
<table width="793" height="67" border="1">
  <tr>
    <td>ลำดับ</td>
    <td>ผู้รับเหตุ</td>
    <td>รายการ</td>
    <td>วันที่</td>
    <td>สถานะ</td>
    <td>เช็คข้อมูล</td>
  </tr>
   <?php
 
	$x = 0;
	while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		$x = $x + 1;
		?>
  <tr>
    <td align="center"><?php echo $x ?></td>
    <td align="center"><?php echo ($result["staff"]) ?></td>
    <td align="center"><?php echo ($result["name"]) ?></td>
    <td align="center"><?php echo ($result["date"]) ?></td>
    <td align="center"><?php echo ($result["statusstaff"]) ?></td>
    <td align="center"><a href="detel.php?Username=<?php echo $Username; ?>&idhelp=<?php echo ($result["id"]); ?>" >ดูข้อมูล </a></td>
  </tr>
  <?php
}
?>
</table>
 <?php else:?>
 <font>ไม่มีข้อมูล </font>
<?php endif;?>
</center> 
</center>
</div>
</body>
</html>