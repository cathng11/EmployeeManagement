<?php
    session_start();
    $_SESSION['IDPB']=$_REQUEST['IDPB'];
    $_SESSION['currentPage']='form_capnhatPB.php';
    if(!isset($_SESSION['txtUser']) )
    {
        header('Location: login.php');
    };
    if(!isset($_SESSION['IDPB']))
    {
        header('Location: capnhatXoaPB.php');
    };

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cập nhật phòng ban</title>
		<link rel="stylesheet" type="text/css" href="UI.css">
    </head>
    <body>
        <center>
            <form method="post">
            <table>
                <caption> Cập nhật thông tin</caption>
                <tr><td>Mã phòng ban:</td><td><?php echo $_GET['IDPB'] ?></td></tr>
                <tr><td>Tên phòng ban:</td><td><input type="text" name="txtName"></td></tr>
                <tr><td>Mô tả:</td><td><input type="text" name="txtDesc"></td></tr>
                <tr><td align="right">  <input type="submit" class="btn" name="update" value="Update"></td><td align="left">
                                        <input type="reset" class="btn" value="Reset"></td></tr>
            </table>
            </form>
            <?php
        if(isset($_POST['update']))
        {
            if(empty($_POST['txtName']) && empty($_POST['txtDesc']))
            {
                header('Location: capnhatXoaPB.php');
            }
            else
            {
                $IDPB=$_REQUEST['IDPB'];
                $TenPB=$_POST['txtName'];
                $MoTa=$_POST['txtDesc'];
                $link=mysqli_connect("localhost","root","") or die("Không thể kết nối CSDL");
                mysqli_select_db($link,"dulieu");
                $sql='update phongban set TenPB=\''.$TenPB.'\', MoTa=\''.$MoTa.'\' where IDPB=\''.$IDPB.'\'';
                $result=mysqli_query($link,$sql);
                echo $result;
                if($result)
                {
                    header('Location: capnhatXoaPB.php');
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