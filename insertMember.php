<?php
include("connect.php");
	$Username = $_POST["Username"];
    $Email = $_POST["Email"];
	$Password = $_POST["Password"];
	$re_Password = $_POST["re_Password"];
	$nsname = $_POST["nsname"];
$IDcard = $_POST["IDcard"];
	$tel = $_POST["tel"];
    $Status = 'user';

if(empty($Username) || empty($Email) || empty($Password)|| empty($re_Password)||empty($nsname) ||empty($tel) ||empty($IDcard)) {
		echo ("<a href='register.php'> กรอกข้อมูลไม่ครบ </a>");
		exit;
	}elseif( Strlen($Password) < 7 || 
	Strlen($Password) > 10 ||
	Strlen($re_Password) < 7 ||
	Strlen($re_Password) > 10 ) {
			echo ("<a href='register.php'> กรุณากรอกรหัสผ่าน 7-10 ตัว </a>");
			exit;
		}else if($Password !== $re_Password ) {
			echo ("<a href='register.php'> รหัสผ่านไม่ตรงกัน </a>");
			exit;
}else if($_FILES["ImgIdCard"]["name"] == "" ) {
    echo ("<a href='register.php'> กรุณาแนบรูปบัตรประชาชน</a>");
    exit;
}else if(Strlen($IDcard) != 13) {
    echo ("<a href='register.php'> เลขบัตรประชาชนต้องมี 13 ตัว</a>");
    exit;
}else if(Strlen($tel) != 10) {
    echo ("<a href='register.php'> เบอร์โาทรศัพท์ต้องมี 10 ตัว</a>");
    exit;
}else{
			$sql = "SELECT * FROM member WHERE Username = '$Username' ";
			$query = mysqli_query($conn, $Sql_Query);
			$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
			if($result){
				echo ("<a href='register.php'> Usernameนี้ถูกใช้ไปแล้ว </a>");
				exit;
			}else{
                $sql = "INSERT INTO member (Username,  Password,  Email, status, nsname, tel, ImgIDcard, IDcard ) 
					VALUES ('$Username', '$Password', '$Email', '$Status','$nsname', '$tel','$ImgIDcard','$IDcard')";
			
				$query = mysqli_query($conn, $sql);
				
				if($query){
					$message = "ลงทะเบียนเสร็จสิ้น";
					echo (
					"<script LANGUAGE='JavaScript'>
						window.alert('$message');
						window.location.href='login.php';
					</script>"
					);
				}else{
					$message = "ลงทะเบียนล้มเหลว";
					echo (
					"<script LANGUAGE='JavaScript'>
						window.alert('$message');
						window.location.href='register.php';
					</script>"
					);
				}
			}
		}

	
	mysqli_close($conn);
?>
