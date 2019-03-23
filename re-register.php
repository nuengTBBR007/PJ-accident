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
<?php
 include('connect.php');
		$sql = "SELECT * FROM member WHERE Username = '$Username' ";
        $query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_array($query, MYSQLI_ASSOC)
?>
<center>
<div style="position: absolute; top: 45.5%; left: 50%; transform: translate(-50%, -55.5%); width: 100%">
    <h1 style="color: black"><center>
<form action="updateMember.php" method="post" enctype="multipart/form-data" target="iframe_target">
                        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            แก้ไขข้อมูลส่วนตัว
    <div class="row" style="width: 100%; justify-content: center;">
        <div style="margin-left: -15%; font-size: 18px">
            <table width="700" border="0" style="font-size:18px; margin-top:30px" >

                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px"> Username :</b></td>
                    <td>
                        <input type="text" name="Username" style="height: 20px; width: 200px" value="<?php echo ($result["Username"]) ?>" />
                        <input type="hidden" name="id" value="<?php echo ($result["ID"]) ?>" />
                        <input type="hidden" name="oldUsername" value="<?php echo ($result["Username"]) ?>" />
                    </td>
                </tr>
                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px">Password :</b></td>
                    <td><input type="text" name="Password" style="height: 20px; width: 200px" value="<?php echo ($result["Password"]) ?>" /></td>
                </tr>
                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px"> Re-Password :</b></td>
                    <td><input type="text" name="RePassword" style="height: 20px; width: 200px" value="<?php echo ($result["Password"]) ?>" /></td>
                </tr>
                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px"> ชื่อ-สกุล :</b></td>
                    <td><input type="text" name="nsname" style="height: 20px; width: 200px" value="<?php echo ($result["nsname"]) ?>" /></td>
                </tr>
                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px"> Email :</b></td>
                    <td>
                        <input type="text" name="Email" style="height: 20px; width: 200px" value="<?php echo ($result["Email"]) ?>" />
                    </td>
                </tr>
                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px"> เลขบัตรประจำตัวประชาชน :</b></td>
                    <td><input type="text" name="IDcard" style="height: 20px; width: 200px" value="<?php echo ($result["IDcard"]) ?>"/></td>
                </tr>
                <tr>
                    <td height="35" align="right"><b style="margin-right: 10px"> เบอร์โทรศัพท์ :</b></td>
                    <td><input type="text" name="tel" style="height: 20px; width: 200px" value="<?php echo ($result["tel"]) ?>"/></td>
                </tr>

                <em>
            </table>
        </div>
        <div style="width: 90%; margin-top: 10%; margin-left: -20%; font-size: 16px">
            <div>แนบบัตรประชาชน / บัตรประจำตัว</div>
            <div>
                <img id="img" src="<?php echo ($result["imgIDcard"]) ?>" width="300" height="180" style="margin: 3% 0px 3% 0px;" >
            </div>
            <input type="file" name="ImgIdCard" style="margin-left: 10%" id="ImgIdCard" value="<?php echo ($result["imgIDcard"]) ?>" onchange="onFileSelected(event)" />
            <input type="hidden" name="0ld_ImgIdCard" value="<?php echo $result["imgIDcard"]; ?>">
        </div>
    </div>
            <button type="submit" style="height:30px; margin-top:3%; width:80px">ยืนยัน</button>
            <button type="reset" style="height:30px; margin-top:3%; width:80px">ยกเลิก</button>
           </form>
            </center></h1>
        <p><center></center></p>
         
</div> 
</div>
</center>
<script type="text/javascript">
    function onFileSelected(event) {
        let selectedFile = event.target.files[0];
        let reader = new FileReader();

        let imgtag = document.getElementById("img");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
</script>
</body>
</html>
