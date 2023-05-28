<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>

<?php 

if (isset($_POST['submit'])) {
	$tenloaisanpham=$_POST['tenloaisanpham'];
	
	include '../ketnoicosodulieu.php';

	$sql="INSERT INTO loaisanpham(tenloaisanpham) VALUES('$tenloaisanpham')";//câu lệnh sql thêm 
	$result=mysql_query($sql);//thực thi câu lệnh sql

	if ($result==true) {//thêm loại sản phẩm thành công
		header("Location: danhsachloaisanpham.php");
	} else {//$result==false
		$thongbao="Thêm loại sản phẩm thất bại";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm loại sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Thêm loại sản phẩm mới</h2>
		
		<center>
		<?php 
		if(isset($thongbao)){
			echo $thongbao;
		} ?>				
		</center>

		<form method="POST">
		<table align="center">
			<tr>
				<td>Tên loại sản phẩm</td>
				<td><input type="text" name="tenloaisanpham" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Thêm loại sản phẩm" style="width:100%"></td>
			</tr>
		</table>
		</form>

	</div>
</body>
</html>