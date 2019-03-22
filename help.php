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
<script type="text/javascript">
function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition);
} else {
alert('Geolocation is not supported by this browser.');
}
}
function showPosition(position) {
var Latitude = position.coords.latitude;
var Longitude = position.coords.longitude;
$('#Latitude').val(Latitude);
$('#Longitude').val(Longitude);
}
$(document).ready(function() {
$("#btnGetLocation").click(function() {
getLocation();
});
});
</script>
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
   <div style="width:80%; margin-left: 0%; align-items: center; display: flex;">
    <?php 
	$Username = "";

	if(isset($_GET["Username"])){
		$Username = $_GET["Username"];
	}
	if($Username === ''):header("location:login.php?");?>
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
	
<div style="position: absolute; top: 84%; left: 35%; transform: translate(-40%, -70%); width: 100%">
<center>
 	
 <form id="form1" name="form1" method="post" action="InsertHelp.php" enctype="multipart/form-data">
          <div class="tab-content" style="display:block; margin-left: 10%">
            <h1><center>
            ขอความช่วยเหลือ
                <table width="50%" border="0" style="font-size:18px; margin-top:30px" > 
              </tr>
              <tr>
                <td height="35" align="right"><b style="margin-right: 10px"> ชื่อนามสกุล</b></td>
                <td><input type="text" name="namepd" style="height: 20px; width: 200px" /></td>
                <input type="hidden" name="username" value="<?php echo $Username; ?>" />
              </tr>
              <tr>
                <td height="35" align="right"><b style="margin-right: 10px"> เหตุแจ้งข้อความช่วยเหลือ</b></td>
                <td><input type="text" name="headpd" style="height: 20px; width: 200px" /></td>
              </tr> 
              <tr>
                <td height="35" align="right"><b style="margin-right: 10px"> อาการบาทเจ็บ </b></td>
                <td>
                <textarea name="detailpd" cols="40" rows="6" style="width: 90%; resize:none;"></textarea>
                </td>
              </tr>
              <tr>
              <tr>
                <td height="35" align="right"><b style="margin-right: 10px"> รายละเอียดที่อยู่ </b></td>
                <td><textarea name="detailAdd"rows="5" style="width: 90%; resize:none;"></textarea></td>
              </tr>
               <tr>
                <td height="35" align="right"><b style="margin-right: 10px"> สถานที่เกิดเหตุ </b></td>
                <td>
               <input type="button" name="btnGetLocation" id="btnGetLocation" value="Get Location"> 
               <input type="text" id="Latitude" name="Latitude" readonly="readonly">
               <input type="text" id="Longitude" name="Longitude" readonly="readonly">
                <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>"/>
                </td>
              </tr>
               <tr>
                <td height="35" align="right"><b style="margin-right: 10px"> เบอร์ติดต่อ </b></td>
                <td><input type="number" name="linepd" style="height: 20px; width: 200px" /></td>
              </tr>
            </table>
        
            <button type="submit" style="height:30px; margin-top:3%; width:80px">ยืนยัน</button>
            
          </form>
  </center>

    
   
  

<img src="images/BGDR4.jpg" width="100%" height="300px"/>
</div>
</body>
</html>
