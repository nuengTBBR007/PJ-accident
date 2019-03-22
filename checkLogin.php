<?php
    include('connect.php');
    $UserName = $_POST["UserName"];
    $Password = $_POST["Password"];
    if(empty($UserName) || empty($Password)){
		$message = "กรอกข้อมูลไม่ครบ";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
                window.location.href='login.html';
            </script>"
            );
        exit;
    }
    $Sql_Query = "select * from member where Username = '$UserName' and Password = '$Password' ";
	
	$query = mysqli_query($conn, $Sql_Query);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if($result){
            header("location:home.php?Username=$UserName");
        }else{
			$message = "รหัสไม่ถูกต้อง";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
                window.location.href='login.php';
            </script>"
            );
        exit;
        }
		
    mysqli_close($conn);
?>