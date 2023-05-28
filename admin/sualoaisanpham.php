<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>
 
<?php 
if (isset($_GET['idsua'])) {
	$idsua=$_GET['idsua'];//Lấy idsua trên đường dẫn web
	include '../ketnoicosodulieu.php';
	$sql="SELECT * FROM loaisanpham WHERE idloaisanpham='$idsua'";
	$array=mysql_fetch_array(mysql_query($sql));
}

if (isset($_POST['submit'])) {
	$idsua=$_GET['idsua'];

	$tenloaisanpham=$_POST['tenloaisanpham'];
	$sql="UPDATE loaisanpham SET tenloaisanpham='$tenloaisanpham' WHERE idloaisanpham='$idsua'";
	$result=mysql_query($sql);
	if ($result==true) {
		header("Location: danhsachloaisanpham.php");
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sửa loại sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Sửa loại sản phẩm</h2>


		<form method="POST">
		<table align="center">
			<tr>
				<td>Tên loại sản phẩm</td>
				<td>				
				<input type="text" name="tenloaisanpham" required value="<?php echo $array['tenloaisanpham'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Sửa loại sản phẩm" style="width:100%"></td>
			</tr>
		</table>
		</form>

	</div>
</body>
</html>