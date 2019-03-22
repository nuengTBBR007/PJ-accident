<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--[if lte IE 6]><style type="text/css" media="screen">.tabbed { height:420px; }</style><![endif]-->
<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="js/jquery.slide.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
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

.row{
display:-webkit-box;
display:-ms-flexbox;
display:flex;
-ms-flex-wrap:wrap;
flex-wrap:wrap;
margin-right:-10px;
margin-left:-10px
}


.card{
 	box-shadow:0 10px 10px 0 rgba(0,0,0,0.6);
    transition:0.4s;
    width:700px;
	height:800px;
    background-color:#FFCC66;
    text-align:center;
    font-site:16px;
    font-family:sans-serif;
    margin:10px	
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
<center>
<body>
	 <?php 
		$idhelp = $_GET["idhelp"];
		$sqlhelp = "SELECT * FROM help WHERE id = '$idhelp'";
        $queryhelp = mysqli_query($conn, $sqlhelp);
		$resulthelp = mysqli_fetch_array($queryhelp, MYSQLI_ASSOC);
	?>
	<div style="padding-top:2%">
	<h1>เช็ครายละเอียดการช่วยเหลือ</h1>
	</div>
  <div class="card">
    <hr />
<center><table width="66%" height="638" border="0" style="font-size:18px; margin-top:30px" >
  <tr>
    <td width="49%" height="38" >รายการ :</td>
    <td width="51%"><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["head"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="90">รายละเอียดการบาดเจ็บ :</td>
    <td><textarea name="" cols="" rows="" style="width:100%; height:100%" readonly><?php echo ($resulthelp["Details"]) ?></textarea></td>
  </tr>
  <tr>
    <td height="43">ชื่อ-สกุล :</td>
    <td><input name="" type="text" style="width:100% ; height:60%" value="<?php echo ($resulthelp["name"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="72">ผู้รับเหตุ :</td>
    <td><input name="" type="text"style="width:100% ; height:60%"  value="<?php echo ($resulthelp["staff"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="35">สังกัด :</td>
    <td><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["Under"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="90">รายละเอียดการรักษา :</td>
    <td><textarea name="" cols="" rows="" style="width:100%; height:100%" readonly><?php echo ($resulthelp["detailhlep"]) ?></textarea></td>
  </tr>
  <tr>
    <td height="44">ชื่อโรงพยาบาล :</td>
    <td><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["HospitalName"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="65">สถานที่เกิดเหตุ :</td>
    <td><textarea name="" cols="" rows="" style="width:100%;height:100%" readonly><?php echo ($resulthelp["DetailsAdd"]) ?></textarea></td>
  </tr>
  <tr>
    <td height="65">วันที่แจ้งเหตุ :</td>
    <td><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["date"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="65">เบอร์โทรศัพท์ :</td>
    <td><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["tel"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="43">GPS(ละติจูด,ลองติจูด) :</td>
    <td><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["Latitude"]) ?>,<?php echo ($resulthelp["Longitude"]) ?>" readonly/></td>
  </tr>
  <tr>
    <td height="42">สถานะการช่วยเหลือ :</td>
    <td><input name="" type="text" style="width:100%; height:60%" value="<?php echo ($resulthelp["statusstaff"]) ?>" readonly/></td>
  </tr>
</table> 
  </center>

  </div>
   </div>
</center>
</body>
</html>