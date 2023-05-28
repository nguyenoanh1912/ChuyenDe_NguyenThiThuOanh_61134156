<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách hoa</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		table, th, td {
		  border: 1px solid blue;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Danh sách hoa</h2>
		<table align="center" border="1" width="40%">
			<tr>
				<td>Mã</td>
				<td>Tên hoa</td>				
				<td>Loại hoa</td>
				<td>Số lượng tồn</td>
				<td>Hình ảnh</td>
				<td>Giá ngày thường</td>
				<td>Giá ngày lễ (nếu có)</td>
				<td>Sửa</td>
				<td>Xóa</td>
			</tr>
			<?php 
			include '../ketnoicosodulieu.php';
			$sql="SELECT * FROM sanpham INNER JOIN loaisanpham ON sanpham.idloaisanpham=loaisanpham.idloaisanpham ORDER BY idsanpham DESC";
			$result=mysql_query($sql);

			while($row=mysql_fetch_array($result)){
			 ?>
			<tr>
				<td><?php echo $row['idsanpham'];?></td>
				<td><?php echo $row['tensanpham'];?></td>					
				<td><?php echo $row['tenloaisanpham'];?></td>
				<td><?php echo $row['soluongton'];?></td>
				<td><img src="../images/upload/<?php echo $row['anh'];?>" width="100"></td>
				<td><?php echo $row['giaban'];?></td>
				<td>
					<?php 
					if ($row['giadiple']!="0") {
						echo $row['giadiple'];
					}
					 ?>
				</td>
				
				<td><a href="suasanpham.php?idsua=<?php echo $row['idsanpham'];?>">Sửa</a></td>
				<td><a href="xoasanpham.php?idxoa=<?php echo $row['idsanpham'];?>">Xóa</a></td>
			</tr>
			<?php } ?>
		</table>

	</div>
</body>
</html>