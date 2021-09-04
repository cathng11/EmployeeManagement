<!DOCTYPE html>
<html>
<head>
        <title>Chỉnh sửa nhân viên</title>
		<link rel="stylesheet" type="text/css" href="UI.css">
</head>
<body>
<center>
<form method="post">
<table>
<caption><b>LOGIN</b></caption>
<tr><td>Username: </td><td><input type="text" name="txtUser"></td></tr>
<tr><td>Password: </td><td><input type="password" name="txtPass"></td></tr>
<tr><td colspan=2 align="center"><input type="submit" class="submit" name="btnLogin"></td></tr> 
</table>
</form>

<?php
//Lưu thông tin
session_start();
if(isset($_POST['btnLogin']))
{
    $username=$_POST['txtUser'];
    $password=$_POST['txtPass'];
    //Loại kí tự đặc biệt,html tag
    //$username=strip_tags($username);
    //Loại kí tự \n,...
    //$username=addslashes($username);
    if(empty($username)||empty($password))
    {
        echo "Username và Password không được để trống";
    }
    else
    {
        $link=mysqli_connect("localhost","root","") or die("Không thể kết nối với CSDL");
        mysqli_select_db($link,"dulieu");
        $sql="select * from admin where username='".$username."' and password='".$password."'";
        $result=mysqli_query($link,$sql);
        if(mysqli_fetch_array($result)==0)
        {
            echo "Username hoặc Password không đúng";
        }
        else
        {
            //Lưu tên đăng nhập vào session
            $_SESSION['txtUser']=$username;
            //Chuyển hướng trang
            header('Location: '.$_SESSION['currentPage']);
        }
    }
}
?>
</center>
</body>
</html>
