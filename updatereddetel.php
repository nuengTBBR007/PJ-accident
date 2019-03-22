
<?php
	include("connect.php");
	$detailhlep = $_POST["detailhlep"];
	$username = $_POST["username"];
	$idhelp = $_POST["idhelp"];
    $HospitalName = $_POST["HospitalName"];
	$namestaff = $_POST["namestaff"];
	$Under = $_POST["Under"];
	$status = 'ช่วยเหลือเสร็จสิ้น';


if(empty($detailhlep) ||
    empty($HospitalName)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
		window.location.href='reddetel.php?Username=$username&idhelp=$idhelp&staff=$namestaff';
    </script>"
    );
}elseif($Under == 'select') {
    $message = "กรุณาเลือกสังกัด";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
		window.location.href='reddetel.php?Username=$username&idhelp=$idhelp&staff=$namestaff';
    </script>"
    );
}else {
   
	$sql = "UPDATE help SET 
		detailhlep = '$detailhlep',
		HospitalName = '$HospitalName',
		Under = '$Under',
		statusstaff = '$status'
		
		WHERE id = $idhelp ";

	$query = mysqli_query($conn, $sql);

	if ($query) {
		$message = "แก้ไขข้อมูลสำเร็จ";
		echo(
		"<script LANGUAGE='JavaScript'>
		window.alert('$message');
		window.location.href='history.php?username=$username';
	</script>"
		);
	} else {
		$message = "แก้ไขข้อมูลล้มเหลว";
		echo(
		"<script LANGUAGE='JavaScript'>
		window.alert('$message');
		window.location.href='reddetel.php?Username=$username&idhelp=$idhelp&staff=$namestaff';
	</script>"
		);
	}
}
	mysqli_close($conn);
?>
