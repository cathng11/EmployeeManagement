<!DOCTYPE html>
<html>

<head>
	<title>Xem thông tin nhân viên</title>
	<link rel="stylesheet" type="text/css" href="UI.css">
</head>

<body style="background-color:#B4A8A0;">
	<?php
	$link = mysqli_connect("localhost", "root", "") or die("Không thể kết nối đếnn CSDL MySQL");
	mysqli_select_db($link, "dulieu");
	$sql = "select * from nhanvien";
	$result = mysqli_query($link, $sql);
	echo '<table border="1" width="100%" style="text-align:center;">';
	echo '<caption><b>Thông tin nhân viên</b></caption>';
	echo '<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>';
	while ($row = mysqli_fetch_array($result)) {
		$idnv = $row["IDNV"];
		$hoten = $row["HoTen"];
		$idpb = $row["IDPB"];
		$diachi = $row["DiaChi"];
		echo '<tr><td>' . $idnv . '</td><td>' . $hoten . '</td><td>' . $idpb . '</td><td>' . $diachi . '</td></tr>';
	}
	echo '</table>';
	echo '<br>';
	echo '<center><button ><a href="timkiemNV.php">Tìm kiếm nhân viên</a></button></center>'
	?>
</body>

</html>