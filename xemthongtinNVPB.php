<!DOCTYPE html>
<html>
	<head>
	<title>Xem thông tin nhân viên phòng ban</title>
	<link rel="stylesheet" type="text/css" href="UI.css">
	</head>
	<body>
        <?php
            session_start();
            $_SESSION['IDPB']=$_REQUEST['IDPB'];
            if(!isset($_SESSION['IDPB']))
            {
                header('Location: xemthongtinPB.php');
            };
        ?>

        <?php
            $link=mysqli_connect("localhost","root","") or die("Không thể kết nối đến cơ sở dữ liệu");
            mysqli_select_db($link,"dulieu");

            $sql='select * from nhanvien where IDPB=\''.$_REQUEST['IDPB'].'\'';
            $result=mysqli_query($link,$sql);
            echo '<table width="100%" border="1"style="text-align:center;">';
            echo '<caption><b>Thông tin nhân viên phòng ban '.$_REQUEST['IDPB'].'</b></caption>';
            echo '<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>';

            while($row=mysqli_fetch_array($result))
            {
                $IDNV=$row['IDNV'];
                $HoTen=$row['HoTen'];
                $IDPB=$row['IDPB'];
                $DiaChi=$row['DiaChi'];
                echo "<tr><td>$IDNV</td><td>$HoTen</td><td>$IDPB</td><td>$DiaChi</td></tr>";
            };
            echo '</table>';
            echo '<br>';
            echo '<center><button><a href="timkiemNV.php?IDPB='.$_REQUEST['IDPB'].'">Tìm kiếm nhân viên</a></button></center>';
        ?>
	</body>
</html>
