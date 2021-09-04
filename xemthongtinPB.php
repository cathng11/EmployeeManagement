<!DOCTYPE html>
<html>
	<head>
	<title>-Xem thông tin phòng ban </title>
	<link rel="stylesheet" type="text/css" href="UI.css">
	</head>
	<body>
		<?php
			$link=mysqli_connect("localhost","root","") or die("Không thể kết nối đến CSDL MySQL");
			mysqli_select_db($link,"dulieu");
			$sql="select * from phongban";
			$result=mysqli_query($link,$sql);
			echo'<table border="1" width="100%" text style="text-align: center;">';
			echo'<caption> <b>Thông tin phòng ban</b></caption>';
			echo '<tr><th>IDPB</th><th>Tên phòng</th><th>Mô tả</th><th>Danh sách nhân viên</th></tr>';
			while($row=mysqli_fetch_array($result))
			{   
				$idpb=$row["IDPB"];
				$tenphong=$row["TenPB"];
				$mota=$row["MoTa"];
				echo '<tr><td>'.$idpb.'</td><td>'.$tenphong.'</td><td>'.$mota.'</td>
				<td><button><a href=xemthongtinNVPB.php?IDPB='.$row["IDPB"].' >Xem</a></button></td></tr>';
				
			}
			$_SESSION['IDPB']=$idpb;
			echo '</table>';
		?>
	</body>
</html>
