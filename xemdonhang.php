<?php include 'ketnoicosodulieu.php';@session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Đơn hàng của bạn</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link type="text/css" href="menu.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="banner">
			<img src="images/banner.jpg">
		</div>
		
		<?php include 'topmenu.php';?>

		<div class="content">
			<div class="leftcolumn">
				<?php include 'noidungcottrai.php';?>
			</div>

			<div class="rightcolumn">		
					<h3 style="text-align:center;">Các đơn hàng của bạn</h3>
					
					<table align="center" border="1">
						<tr>
							<td align="center">Mã hóa đơn</td>
							<td align="center">Thời gian đặt</td>
							<td align="center">Trạng thái</td>
							<td align="center">Xem chi tiết</td>
						</tr>
						<?php 
						$idtaikhoan_dangnhap=$_SESSION['user'];//lay tu dangnhap.php

						$sql="SELECT * FROM hoadon WHERE idtaikhoan='$idtaikhoan_dangnhap'";
						$result=mysql_query($sql);
						while ($row=mysql_fetch_array($result)) {?>
						<tr>
							<td align="center"><?php echo $row['idhoadon'];?></td>
							<td align="center"><?php echo $row['thoigian'];?></td>
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
							<td align="center"><a href="xemchitietdonhang.php?idhoadon=<?php echo $row['idhoadon'];?>">Xem</a></td>
						</tr>
						<?php }?>
					</table>
					


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>