<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.body {
	background-image: url('images/bglogin.jpg'); 
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
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
</head>

<body class="body">
<center>
<div style="margin-top: 18%"><font style="font-size:25px;">Register</font> </div>
<div style="margin-top: 1%; justify-content: center; width: 100%">
<form id="form1" name="form1" method="post" action="insertMember.php" enctype="multipart/form-data">
<div class="row" style="width: 100%; justify-content: center;">
    <div style="margin-left: 15%; font-size: 18px">
        <table width="700" border="0">
            <tr>
                <td width="30%"><div align="right">Username :</div></td>
                <td width="70%"><input type="text" name="Username" id="Username" style="width:60%" /></td>
            </tr>

            <tr>
                <td><div align="right">Password :</div></td>
                <td>
                    <input type="password" name="Password" id="Password" style="width:60%" />
                </td>
            </tr>
            <tr>
                <td><div align="right">Re-Password :</div></td>
                <td>
                    <input type="password" name="re_Password" id="re_Password" style="width:60%" /></td>
            </tr>
            <tr>
                <td><div align="right">ชื่อ-สกุล :</div></td>
                <td>
                    <input type="text" name="nsname" id="nsname" style="width:60%" /></td>
            </tr>

            <tr>
                <td><div align="right">Email :</div></td>
                <td>
                    <input type="email" name="Email" id="Email" style="width:60%" /></td>
            </tr>
            <tr>
                <td><div align="right">เลขบัตรประจำตัวประชาชน :</div></td>
                <td>
                    <input type="number" name="IDcard" id="IDcard" style="width:60%" /></td>
            </tr>
            <tr>
            <td><div align="right">เบอร์โทรศัพท์ :</div></td>
            <td>
                <input type="number" name="tel" id="tel" style="width:60%" /></td>
            </tr>
        </table>
    </div>
    <div style="width: 40%; margin-top: -1%; margin-left: -20%">
        <div>แนบบัตรประชาชน</div>
        <div>
            <img id="img" src="https://admission.nu.ac.th/student/citizencard.jpg" width="200" height="120" style="margin: 3% 0px 3% 0px;" >
        </div>
        <input type="file" name="ImgIdCard" style="margin-left: 10%" id="ImgIdCard" onchange="onFileSelected(event)" />
    </div>
</div>
  <input type="submit" name="submit" id="submit" value="Register" style="margin-top:2%; font-size:20px; height: 30px;"/> <a href="login.php">login</a>
</form>
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
