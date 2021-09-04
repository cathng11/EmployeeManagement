<?php
    session_start();
    $_SESSION['IDPB']=$_REQUEST['IDPB'];
    $_SESSION['currentPage']='form_insertNVPB.php';
    if(!isset($_SESSION['txtUser']) )
    {
        header('Location: login.php');
    };
    if(!isset($_SESSION['IDPB']))
    {
        header('Location: xemthongtinPB.php');
    };

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Thêm </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <center>
            <form method="post">
            <table>
                <caption> Thêm nhân viên</caption>
                <tr><td>Mã nhân viên:</td><td><input type="text" name="txtIDNV"></td></tr>
                <tr><td>Tên nhân viên:</td><td><input type="text" name="txtName"></td></tr>
                <tr><td>Mã phòng ban:</td><td><?php echo $_GET['IDPB'] ?></td></tr>
                <tr><td>Địa chỉ:</td><td><input type="text" name="txtAddr"></td></tr>
                <tr><td align="right"><input type="submit" class="btn" name="save" value="Save"></td><td align="left">
                    <input type="reset" class="btn" value="Reset"></td></tr>
            </table>
            </form>
            <?php
        if(isset($_POST['save']))
        {
            if(empty($_POST['txtIDNV']) && empty($_POST['txtName']) && empty($_POST['txtAddr']))
            {
                header('Location: xemthongtinNVPB.php');
            }
            else
            {
                $IDNV=$_REQUEST['txtIDNV'];
                $Name=$_POST['txtName'];
                $IDPB=$_REQUEST['IDPB'];
                $DiaChi=$_POST['txtAddr'];
                
                $link=mysqli_connect("localhost","root","") or die("Không thể kết nối CSDL");
                mysqli_select_db($link,"dulieu");
                $sql='insert into nhanvien value(\''.$IDNV.'\', \''.$Name.'\' ,\''.$IDPB.'\',\''.$DiaChi.'\')';
                $result=mysqli_query($link,$sql);
                if($result)
                {
                    header('Location: xemthongtinNVPB.php');
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