<?php include 'ketnoicosodulieu.php';@session_start(); ?>
<?php
if (!isset($_SESSION['user'])) {
	header("location: dangnhap.php");
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nhập thông tin giao hàng và thanh toán</title>
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
		
		<?php 
		include 'topmenu.php';?>

		<div class="content">
			<div class="leftcolumn">
				<?php include 'noidungcottrai.php';?>
			</div>

			<div class="rightcolumn">		
											
						<form method="POST" action="xuly.php" id="formthongtinkhachhang">
						<table width="600" border="0" cellspacing="5" cellpadding="0">
						<tr>
						<th colspan="2" align="center" scope="col"><br><h3>Thông tin người nhận hàng</h3></th>
						</tr>

						<tr>
						<td width="130">Họ tên khách hàng</td>
						<td><input name="hoten_datmua" type="text" id="hoten_datmua" size="60" required /></td>
						</tr>
						<tr>
						<td width="130">Số điện thoại</td>
						<td><input type="text" name="sodienthoai_datmua" id="sodienthoai_datmua" required /></td>
						</tr>
						<tr>
						<td width="130">Địa chỉ</td>
						<td><input name="diachi_datmua" type="text" id="diachi_datmua" size="60" required /></td>
						</tr>
						<tr>
						<td colspan="2" align="center">	
						<input type="hidden" name="tongtien" value="<?php echo $tongtien;?>">			
						<input type="submit" name="submit" id="nutmua" value="Đặt hàng" />
						<input type="reset" value="Xóa">
						</td>
						</tr>
						</table>
						</form>
						</center>
					
						


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>