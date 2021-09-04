<?php
    session_start();
    $_SESSION['currentPage']='capnhatXoaPB.php';
    if(!isset($_SESSION['txtUser']))
    {
        header('Location: login.php');
    };
?>
<?php
$link=mysqli_connect("localhost","root","") or die("Không thể kết nối đến CSDL MySQL");
mysqli_select_db($link,"dulieu");
$sql="select * from phongban";
$result=mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa phòng ban</title>
	<link rel="stylesheet" type="text/css" href="UI.css">
</head>
<body>
    <form method="post">
    <table width="100%" border="1"style="text-align:center;" >
        <caption><b>Chỉnh sửa thông tin phòng ban</b></caption>
        <tr><th>IDPB</th><th>Tên phòng</th><th>Mô tả</th><th>Danh sách nhân viên</th><th>Cập nhật</th><th>Xoá</th></tr>
        <?php
        while($row=mysqli_fetch_array($result))
        {
            $idpb=$row["IDPB"];
            $tenphong=$row["TenPB"];
            $mota=$row["MoTa"];
            echo '<tr><td>'.$idpb.'</td><td>'.$tenphong.'</td><td>'.$mota.'</td>
            <td><button><a href=xemthongtinNVPB.php?IDPB='.$row["IDPB"].' >Xem</a></button></td>
            <td><button><a href=form_capnhatPB.php?IDPB='.$row["IDPB"].' >Cập nhật</a></button></td>';
            ?>
            <td><input type="checkbox" name="ckbList[]" value="<?php echo $idpb ?>" /></td></tr>
         <?php   
        }
        if(empty($idpb))
        {
            $_SESSION['IDPB']='';
        }
        else
        {
            $_SESSION['IDPB']=$idpb;
        }
        ?>  
        <tr>
            <td colspan=5></td>
            <td><input type="submit" class="submit" name="submit" value="Xoá" /></td>
        </tr>     
    </table>

    <br/>
    <center><button><a href="./form_insertPB.php">Thêm phòng ban mới</a></button></center>
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
                    $sqlDel='delete from phongban where IDPB=\''.$selected.'\'';
                    $resultDel=mysqli_query($link,$sqlDel);
                    if($resultDel)
                    {
                        header('Location: capnhatXoaPB.php');
                    }
                    else
                    {
                        echo "Lỗi không thể xoá";
                    } 
                }
            }
        }
?>
