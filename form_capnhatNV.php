<?php
    session_start();
    $_SESSION['IDNV']=$_REQUEST['IDNV'];
    $_SESSION['currentPage']='form_capnhatNV.php';

    if(!isset($_SESSION['txtUser']) )
    {
        header('Location: login.php');
    };
    if(!isset($_SESSION['IDNV']))
    {
        header('Location: capnhatXoaNV.php');
    };

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cập nhật nhân viên</title>
		<link rel="stylesheet" type="text/css" href="UI.css">
    </head>
    <body>
        <center>
            <form method="post">
            <table>
                <caption> Thêm nhân viên</caption>
                <tr><td>Mã nhân viên:</td><td><?php echo $_GET['IDNV'] ?></td></tr>
                <tr><td>Tên nhân viên:</td><td><input type="text" name="txtName"></td></tr>
                <tr><td>Mã phòng ban:</td><td><input type="text" name="txtIDPB"></td></tr>
                <tr><td>Địa chỉ:</td><td><input type="text" name="txtAddr"></td></tr>
                <tr><td align="right"><input type="submit" class="btn" name="save" value="Save"></td><td align="left">
                    <input type="reset" class="btn" value="Reset"></td></tr>
            </table>
            </form>
            <?php
        if(isset($_POST['save']))
        {
            if(empty($_POST['txtName'])  && empty($_POST['txtIDPB']) && empty($_POST['txtAddr']))
            {
                header('Location: capnhatXoaNV.php');
            }
            else
            {
                $IDNV=$_REQUEST['IDNV'];
                $Name=$_POST['txtName'];
                $IDPB=$_REQUEST['txtIDPB'];
                $DiaChi=$_POST['txtAddr'];
                
                $link=mysqli_connect("localhost","root","") or die("Không thể kết nối CSDL");
                mysqli_select_db($link,"dulieu");
                $sql='update nhanvien set HoTen=\''.$Name.'\', IDPB=\''.$IDPB.'\', DiaChi=\''.$DiaChi.'\' where IDNV=\''.$IDNV.'\'';
                $result=mysqli_query($link,$sql);
                if($result)
                {
                    header('Location: capnhatXoaNV.php');
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