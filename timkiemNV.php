<!DOCTYPE hmtl>
<Html>
	<head>
		<title>Tìm kiếm nhân viên</title>
		<link rel="stylesheet" type="text/css" href="UI.css">
	</head>
	<body>
	<center>
	<form method="post" action="timkiemNV.php" >
		<caption><b>Tìm kiếm thông tin nhân viên <?php if (empty($_REQUEST['IDPB'])) echo ''; else echo 'phòng ban '.$_REQUEST['IDPB'].''?></b> </caption>
		<table>
		<tr>	
					<td ><input type="radio" id="idnv" name="radio" value="IDNV">IDNV
					<input type="radio" id="hoten" name="radio" value="HoTen">Họ tên
					<input type="radio" id="diachi" name="radio" value="DiaChi">Địa chỉ</td>
			</tr>
			<tr>	
					<td ><input type="text" id="text" name="text">
					<input type="submit" class="submit" id="search" value="Search" name="search"></td>
		</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['search']))
		{
			$link=mysqli_connect("localhost","root","") or die("Không thể kết nối đến CSDL MySQL");
			mysqli_select_db($link,"dulieu");
			$value=$_POST['text'];
			
			if(empty($value) && empty($condition))
			{
				$sql="select * from nhanvien";
			}
			else
			{
				if(!empty($_REQUEST['IDPB']))
				{
					if(empty($_POST['radio'])) $sql='select * from nhan vien contains(*,'.$value.') where IDPB=\''.$_REQUEST['IDPB'].'\'';
					else
					{
						$condition=$_POST['radio'];
						$sql="select * from nhanvien where ".$condition." like '%".$value."%' where IDPB=\'".$_REQUEST['IDPB']."\'";
					}
				}
				else
				{
					if(empty($_POST['radio'])) $sql="select * from nhanvien contains(*,$value)";
					else
					{
						$condition=$_POST['radio'];
						$sql="select * from nhanvien where ".$condition." like '%".$value."%'";
					}			
				}

			}
			$result=mysqli_query($link,$sql);

			if(empty($result)) echo "Chọn thuộc tính cần tìm";
			else
			{
				echo'<table border="1" width="100%">';
				echo'<caption> Dữ liệu nhân viên</caption>';
				echo '<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>';
				while($row=mysqli_fetch_array($result))
				{
					$idnv=$row["IDNV"];
					$hoten=$row["HoTen"];
					$idpb=$row["IDPB"];
					$diachi=$row["DiaChi"];
					echo "<tr><td>$idnv</td><td>$hoten</td><td>$idpb</td><td>$diachi</td></tr>";
				}
				echo '</table>';
			}

		}
	?>
	</center>
	</body>
</Html>