<?php
    session_start();
    $_SESSION['currentPage']='capnhatXoaNV.php';
    if(!isset($_SESSION['txtUser']))
    {
        header('Location: login.php');
    }
?>
<?php
$link=mysqli_connect("localhost","root","") or die("Không thể kết nối đến CSDL MySQL");
mysqli_select_db($link,"dulieu");
$sql="select * from nhanvien";
$result=mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html>
<head>
        <title>Chỉnh sửa nhân viên</title>
		<link rel="stylesheet" type="text/css" href="UI.css">
</head>
<body>
    <form method="post">
    <table width="100%" border="1"style="text-align:center;" >
        <caption><b>Chỉnh sửa thông tin nhân viên</b></caption>
        <tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th><th>Cập nhật</th><th>Xoá</th></tr>
        <?php
        while($row=mysqli_fetch_array($result))
        {
            $idnv=$row["IDNV"];
            $hoten=$row["HoTen"];
            $idpb=$row["IDPB"];
            $diachi=$row["DiaChi"];
            echo '<tr><td>'.$idnv.'</td><td>'.$hoten.'</td><td>'.$idpb.'</td><td>'.$diachi.'</td><td><button><a href=./form_capnhatNV.php?IDNV='.$row["IDNV"].'>Cập nhật</a></button></td>';
            ?>
            <td><input type="checkbox" name="ckbList[]" value="<?php echo $idnv ?>" /></td></tr>
         <?php   
        }
        if(empty($idnv))
        {
            $_SESSION['IDNV']='';
        }
        else
        {
            $_SESSION['IDNV']=$idnv;
        }
        ?>  
        <tr>
            <td colspan=5></td>
            <td><input type="submit" class="submit" name="submit" value="Xoá" /></td>
        </tr>     
    </table>

    <br/>
    <center><button><a href="./form_insertNV.php">Thêm nhân viên mới</a></button></center>
    </form>

</body>
</html>
<?php 
        if(isset($_POST['submit']))
        {
            if(!empty($_POST['ckbList']))
            {
                foreach($_POST['ckbList'] as $selected)
                {    
                    $sqlDel='delete from nhanvien where IDNV=\''.$selected.'\'';
                    $resultDel=mysqli_query($link,$sqlDel);
                    if($resultDel)
                    {
                        header('Location: capnhatXoaNV.php');
                    }
                    else
                    {
                        echo "Lỗi không thể xoá";
                    } }
            }
        }
        ?>
