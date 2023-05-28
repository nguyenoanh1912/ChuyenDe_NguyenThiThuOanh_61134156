<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách loại sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Danh sách loại sản phẩm</h2>
		<table align="center" border="1">
			<tr>
				<td>ID</td>
				<td>Tên loại sản phẩm</td>
				<td>Sửa</td>
				<td>Xóa</td>
			</tr>
			<?php 
			include '../ketnoicosodulieu.php';
			$sql="SELECT * FROM loaisanpham";
			$result=mysql_query($sql);

			while($row=mysql_fetch_array($result)){
			 ?>
			<tr>
				<td><?php echo $row['idloaisanpham'];?></td>
				<td><?php echo $row['tenloaisanpham'];?></td>
				<td><a href="sualoaisanpham.php?idsua=<?php echo $row['idloaisanpham'];?>">Sửa</a></td>
				<td><a href="xoaloaisanpham.php?idxoa=<?php echo $row['idloaisanpham'];?>">Xóa</a></td>
			</tr>
			<?php } ?>
		</table>

	</div>
</body>
</html>