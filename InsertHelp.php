<?php
include("connect.php");
	$Username = $_POST["username"];
	$namepd = $_POST["namepd"];
    $headpd = $_POST["headpd"];
	$detailpd = $_POST["detailpd"];
	$detailAdd = $_POST["detailAdd"];
    $Latitude = $_POST["Latitude"];
	$Longitude = $_POST["Longitude"];
    $date = $_POST["date"];
    $linepd = $_POST["linepd"];
	$statusstaff = 'ยังไม่ได้รับการช่วยเหลือ';

if(empty($namepd) ||
    empty($headpd) ||
    empty($detailpd) ||
    empty($linepd)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
		window.location.href='help.php?Username=$Username';
    </script>"
    );
}else{
    $Sql_Query = "select * from help where head = '$headpd'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if(!$result){
        $sql = "INSERT INTO help (name, head, Details, Latitude, Longitude, date, tel, DetailsAdd, statusstaff) 
			VALUES ('$namepd', '$headpd', '$detailpd', '$Latitude', '$Longitude', '$date', '$linepd', '$detailAdd', '$statusstaff')";

        $query = mysqli_query($conn, $sql);

        if($query){
            $message = "เพิ่มข้อมูลเสร็จสิ้น";
            echo (
            "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
					window.location.href='massage.php?Username=$Username';
                </script>"
            );
        }else{
            $message = "เพิ่มข้อมูลล้มเหลว";
            echo (
            "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
					window.location.href='help.php?Username=$Username';
                </script>"
            );
        }

    }else {
        $message = "มีแล้ว";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
			window.location.href='help.php?Username=$Username';
        </script>"
        );
        }
    }
	
	mysqli_close($conn);
?>