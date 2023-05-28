<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách các đơn hàng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Danh sách các đơn hàng</h2>
		<table align="center" border="1">
			<tr>
				<td align="center">Mã hóa đơn</td>
				<td align="center">Thời gian đặt</td>
				<td align="center">Liên hệ</td>
				<td align="center">Xem chi tiết</td>
				<td align="center">Trạng thái</td>
				<td align="center">Sửa trạng thái đơn hàng</td>
			</tr>
			<?php 
			include '../ketnoicosodulieu.php';
			$sql="SELECT * FROM hoadon";
			$result=mysql_query($sql);
			while ($row=mysql_fetch_array($result)) {?>
			<tr>
				<td align="center"><?php echo $row['idhoadon'];?></td>
				<td align="center"><?php echo $row['thoigian'];?></td>
				<td align="center">
					Họ tên: <?php echo $row['hoten_datmua'];?> <br>
					Họ tên: <?php echo $row['diachi_datmua'];?> <br>
					Họ tên: <?php echo $row['sdt_datmua'];?> <br>
						
				</td>
				<td align="center"><a href="xemchitietdonhang.php?idhoadon=<?php echo $row['idhoadon'];?>" target="blank">Xem</a></td>
				<td align="center">
				<?php 
				if ($row['trangthai']==0) {
					echo "Đang chờ xử lý";
				} else if($row['trangthai']==1){
					echo "Đang giao hàng";
				} else if($row['trangthai']==2){
					echo "Đã giao hàng";
				} else if($row['trangthai']==3){
					echo "Giao hàng thất bại";
				} else {
					echo "Hoàn trả";
				}
				?>								
				</td>
				<td align="center"><a href="suadonhang.php?idhoadon=<?php echo $row['idhoadon'];?>">Sửa</a></td>
			</tr>
			<?php }?>
		</table>

	</div>
</body>
</html>