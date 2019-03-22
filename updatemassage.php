
<?php
	include("connect.php");
    $Username = $_GET["Username"];
	$id = $_GET["id"];
	$status = 'กำลังให้ความช่วยเหลือ';

        $sql = "UPDATE help SET 
                staff = '$Username',
				statusstaff = '$status'
                
                WHERE id = $id ";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("location:status.php?Username=$Username");
        } else {
            $message = "แก้ไขข้อมูลล้มเหลว";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }

	mysqli_close($conn);
?>
