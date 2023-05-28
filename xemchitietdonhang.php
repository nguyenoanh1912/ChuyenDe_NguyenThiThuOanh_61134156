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
					<h3 style="text-align:center;">Chi tiết đơn hàng</h3>
					
					<table align="center" border="1">
						<tr>
							<td align="center">Mã sản phẩm</td>
							<td align="center">Tên sản phẩm</td>
							<td align="center">Giá (VNĐ)</td>
							<td align="center">Số lượng mua</td>
							<td align="center">Thành tiền (VNĐ)</td>
							<td>Loại chứa</td>
						</tr>
						<?php 
						$idhoadon=$_GET['idhoadon'];
						$sql="SELECT * FROM hoadonchitiet INNER JOIN sanpham ON hoadonchitiet.idsanpham=sanpham.idsanpham WHERE idhoadon='$idhoadon'";
						
						$result=mysql_query($sql);
						while ($row=mysql_fetch_array($result)) {?>
						<tr>
							<td align="center"><?php echo $row['idsanpham'];?></td>
							<td align="center"><?php echo $row['tensanpham'];?></td>
							<td align="center">
								<?php 
								if ($row['giadiple']!=0 && $row['giadiple']!=NULL) {
									echo number_format($row['giadiple'],0,",",".").'(lễ)';
								} else{
									echo number_format($row['giaban'],0,",",".");
								}
								
								?>
									
							</td>
							<td align="center"><?php echo $row['soluongmua'];?></td>
							<td align="center">
							<?php 
								if ($row['giadiple']!=0 && $row['giadiple']!=NULL) {
									echo number_format($row['giadiple']*$row['soluongmua'],0,",",".");
								} else{
									echo number_format($row['giaban']*$row['soluongmua'],0,",",".");
								}
								
							?>	
									
							</td>
							<td>
								<?php 
								echo $row['loaichua'];
								 ?>
							</td>
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