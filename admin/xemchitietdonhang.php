<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Xem chi tiết đơn hàng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h3 style="text-align:center;">Chi tiết đơn hàng</h3>
					
		<table align="center" border="1">
			<tr>
				<td align="center">Tên sản phẩm</td>
				<td align="center">Giá (VNĐ)</td>
				<td align="center">Số lượng mua</td>
				<td align="center">Thành tiền (VNĐ)</td>
				<td>Chứa trong</td>
			</tr>
			<?php 
			include '../ketnoicosodulieu.php';
			$idhoadon=$_GET['idhoadon'];
			$sql="SELECT * FROM hoadonchitiet INNER JOIN sanpham ON hoadonchitiet.idsanpham=sanpham.idsanpham WHERE idhoadon='$idhoadon'";
			
			$result=mysql_query($sql);
			while ($row=mysql_fetch_array($result)) {?>
			<tr>
				<td align="center"><?php echo $row['tensanpham'];?></td>
				<td align="center"><?php echo number_format($row['giaban'],0,",",".");?></td>
				<td align="center"><?php echo $row['soluongmua'];?></td>
				<td align="center"><?php echo number_format($row['giaban']*$row['soluongmua'],0,",",".");?></td>
				<td align="center">
					<?php 
						echo $row['loaichua'];
					 ?>
				</td>
			</tr>
			<?php }?>
		</table>

	</div>
</body>
</html>