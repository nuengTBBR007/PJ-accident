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


</style>
<script type="text/javascript">
function getLocation() {
	if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(showPosition);
	} else {
	alert('Geolocation is not supported by this browser.');
	}
}
$(document).ready(function() {
	$("#btnGetLocation").click(function() {
		getLocation();
	});
});
</script>
</head>

<body class="body">
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
 <?php
        $Search = null;
        if(isset($_POST["txtSearch"]))
        {
            $Search = $_POST["txtSearch"];
        }


        $sql = "SELECT * FROM help WHERE head LIKE '%".$Search."%' AND staff = '$Username' AND statusstaff != 'ช่วยเหลือเสร็จสิ้น' ";
        $query = mysqli_query($conn, $sql);

    ?>
</header>
<center>
<div style="width: 100%; margin-bottom: 10%; margin-top:3%">	
<h2 style="margin-bottom: 1%">ข้อมูลสถานะอุบัติเหตุ</h2>
                     <center>
                    <form name="search" method="post">
                        <table width="80%" border="0">
                            <tr>
                                <th> <div align="center" style="font-size:16px"> ค้นหารายการอุบัติเหตุ :
                                        <input name="txtSearch" type="text" id="txtSearch" value="<?php echo($Search); ?>"   style="height:20px"/>
                                        <input type="submit" value="ค้นหา" style="font-size:16px" />
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </form>
                </center>
  <table width="90%" border="1" style="font-size:16px; margin-top:30px" >
    <tr style="height: 30px">
      <td align="center">ลำดับ</td>
      <td align="center">ผู้รับเหตุ</td>
      <td align="center">รายการ</td>
      <td align="center">รายการอุบัติเหตุ</td>
      <td align="center">วันที่แจ้งอุบัติเหตุ</td>
      <td align="center">เบอร์โทรศัทพ์</td>
      <td align="center">สถานะ</td>
      <td align="center">ที่อยู่</td>
      <td align="center">รายละเอียดที่อยู่</td>
      <td align="center">แผนที่</td>
      <td align="center">เสร็จสิ้น</td>
    </tr>
    <?php
                    $x = 0;
                    while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
                    {
                        $x = $x + 1;
                        ?>
                        <tr>
                            <td align="center" style="width: 3%"><?php echo ($x) ?></td>
                            <td align="center" style="width: 5%"><?php echo ($result["staff"]) ?></td>
                            <td align="center" style="width: 10%"><?php echo ($result["head"]) ?></td>
                            <td align="center" style="width: 20%"><textarea name="detailAdd"rows="5" style="width: 100%; resize:none;" readonly><?php echo ($result["Details"]) ?></textarea></td>
                            <td align="center" style="width: 10%"><?php echo ($result["date"]) ?></td>
                            <td align="center" style="width: 10%"><?php echo ($result["tel"]) ?></td>
                            <td align="center" style="width: 10%"><?php echo ($result["statusstaff"]) ?></td>
                            <td align="center" style="width: 15%"><?php echo ($result["Latitude"]) ?>,<?php echo ($result["Longitude"]) ?> </td>
                            <td align="center" style="width: 20%"><textarea name="detailAdd"rows="5" style="width:100%; resize:none;" readonly><?php echo ($result["DetailsAdd"]) ?> </textarea></td>
                            <td align="center" style="width: 3%"><button type="button" id="btnGetLocation" style="height:30px;margin-left:1%; margin-top:3%; width:80px" onclick="window.location.href='https://www.google.com/maps/'">Map</button></td>
                            <td align="center" style="width: 3%"><button type="button" id="btnss" style="height:30px;margin-left:1%; margin-top:3%; width:80px" onclick="window.location.href='reddetel.php?Username=<?php echo $Username; ?>&idhelp=<?php echo ($result["id"]); ?>&staff=<?php echo ($result["staff"]); ?>'">เสร็จสิ้น</button></td>
                        </tr>

                        <?php
                    }
                    ?>
                </table>

                <?php
                mysqli_close($conn);
                ?>
                
 </div>
 </center>
                
</body>
</html>