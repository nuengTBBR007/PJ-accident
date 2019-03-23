
<?php
	include("connect.php");
    $Username = $_POST["Username"];
	$oldUsername = $_POST["oldUsername"];
	$id = $_POST["id"];
	$Password = $_POST["Password"];
    $RePassword = $_POST["RePassword"];
	$nsname = $_POST["nsname"];
	$Email = $_POST["Email"];
    $tel = $_POST["tel"];
$IDcard = $_POST["IDcard"];
$old_img = $_POST["0ld_ImgIdCard"];

$ImgIDcard ;
if ($_FILES["ImgIdCard"]["name"] !== ""){
    $filename = $conn->real_escape_string($_FILES['ImgIdCard']['name']);
    $filedata= $conn->real_escape_string(base64_encode(file_get_contents($_FILES['ImgIdCard']['tmp_name'])));
    $filetype = $conn->real_escape_string($_FILES['ImgIdCard']['type']);
    $ImgIDcard = 'data:'.$filetype.';base64,'.$filedata;
}else{
    $ImgIDcard = $old_img;
}
if(empty($Username) ||
    empty($Password) ||
    empty($RePassword) ||
    empty($nsname) ||
    empty($Email)||
    empty($tel)||
    empty($IDcard)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}else {
    $Sql_Query = "select * from member where Username = '$Username'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
      if($result["Username"] === $oldUsername){
             $sql = "UPDATE member SET 
                Username = '$Username',
                Password = '$Password',
                nsname = '$nsname',
                Email = '$Email',
               tel = '$tel',
                IDcard = '$IDcard',
                imgIDcard='$ImgIDcard'
                
                WHERE ID = $id ";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $message = "แก้ไขข้อมูลสำเร็จ";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        } else {
            $message = "แก้ไขข้อมูลล้มเหลว";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }
        }else{
            $message = "มีชื่อผู้ใช้นี้แล้ว";
            echo (
            "<script LANGUAGE='JavaScript'>
                        window.alert('$message');
                    </script>"
            );
        }
    }else {
        $sql = "UPDATE member SET 
                Username = '$Username',
                Password = '$Password',
                nsname = '$nsname',
                Email = '$Email',
                tel = '$tel',
                IDcard = '$IDcard',
                imgIDcard='$ImgIDcard'
                
                WHERE ID = $id ";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $message = "แก้ไขข้อมูลสำเร็จ";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        } else {
            $message = "แก้ไขข้อมูลล้มเหลว";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }
    }
}
	mysqli_close($conn);
?>
