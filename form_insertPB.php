<?php
    session_start();
    $_SESSION['currentPage']='form_insertPB.php';
    if(!isset($_SESSION['txtUser']) )
    {
        header('Location: login.php');
    };
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Thêm phòng ban</title>
        <meta charset="UTF-8">
        <title>Thêm phòng ban</title>
		<link rel="stylesheet" type="text/css" href="UI.css">
    </head>
    <body>
        <center>
            <form method="post">
            <table>
                <caption> Thêm phòng ban</caption>
                <tr><td>Mã phòng ban:</td><td><input type="text" name="txtIDPB"></td></tr>
                <tr><td>Tên phòng ban:</td><td><input type="text" name="txtName"></td></tr>
                <tr><td>Mô tả:</td><td><input type="text" name="txtDesc"></td></tr>
                <tr><td align="right"><input type="submit" class="btn" name="insert" value="Save"></td>
                    <td align="left"><input type="reset" class="btn" value="Reset"></td></tr>
            </table>
            </form>
            <?php
        if(isset($_POST['insert']))
        {
            if(empty($_POST['txtIDPB']) && empty($_POST['txtName']) && empty($_POST['txtDesc']))
            {
                header('Location: xemthongtinPB.php');
            }
            else
            {
                $IDPB=$_POST['txtIDPB'];
                $TenPB=$_POST['txtName'];
                $MoTa=$_POST['txtDesc'];
                $link=mysqli_connect("localhost","root","") or die("Không thể kết nối CSDL");
                mysqli_select_db($link,"dulieu");
                $sql='insert into phongban value(\''.$IDPB.'\', \''.$TenPB.'\' ,\''.$MoTa.'\')';
                $result=mysqli_query($link,$sql);
                echo $result;
                if($result)
                {
                    header('Location: xemthongtinPB.php');
                }
                else
                {
                    echo "Lỗi cập nhật";
                } 
            }
        }
        ?>
        </center>

    </body>
</html>