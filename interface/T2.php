<?php
session_start();
if(isset($_SESSION['txtUser']))
{
    session_destroy();
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<script language="JavaScript"></script>
    <title>T1</title>
    <style>
        .btn{
            width: 100%;
            border: 2px solid #3C3835;
            padding: 10px;
            border-radius: 50px 20px;
            margin-top: 10px;
            background-color: #797B77;
            text-decoration-color: #3C3835;
        }
        .btn:hover
        {
            background-color: #363A34;
        }
        body
        {
            font-weight: bold;
            background-color: #B4A8A0;
        }
        a
        {
            text-decoration: none;
            color: #282523;
        }
        a:hover
        {
            color: #8D918A;           
        }
    </style>
</head>

<body >
    <form style="margin-top: 50%;">
        <table >
        </br>
            <tr><center><button class="btn"><a href="./T3.php"  target="form3">Trang chủ</a></button></center> </tr>
            <tr><button class="btn"><a href="../xemthongtinNV.php" target="form3">Xem thông tin nhân viên</a></button></tr>
            <tr><button class="btn"><a href="../xemthongtinPB.php" target="form3">Xem thông tin phòng ban</a></button></tr>
            <tr><button class="btn"><a href="../capnhatXoaNV.php" target="form3">Chỉnh sửa nhân viên</a></button></tr></br>
            <tr><button class="btn"><a href="../capnhatXoaPB.php" target="form3">Chỉnh sửa phòng ban</a></button></tr></br>
        </table>
    </form>
</body>

</html>