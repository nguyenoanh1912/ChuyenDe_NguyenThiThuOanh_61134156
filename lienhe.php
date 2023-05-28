<?php include 'ketnoicosodulieu.php';@session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Liên hệ</title>
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
					<h3 style="text-align:center;">Liên hệ</h3>
					<h3>SHOP HOA ĐÀ NẴNG </h3>
					<ul>
						<li>
							<h4>Địa chỉ: 12 Lê Duẩn, Đà Nẵng</h4>
						</li>
						<li>
							<h4>Email: sale@shophoadanang.com</h4>
						</li>
						<li>
							<h4>SĐT: 0905.635.253</h4>
						</li>
					</ul>
					<br>
					<br>
					<h3>Hoặc bạn có thể liên hệ trực tiếp tại đây:</h3>
					<form method="POST" action="xulylienhe.php">
					<table width="500">
						<tr>
							<td>Họ tên</td>
							<td><input type="text" name="hoten" required></td>
						</tr>
						<tr>
							<td>SĐT</td>
							<td><input type="number" name="sdt" required></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email" required></td>
						</tr>
						<tr>
							<td>Nội dung</td>
							<td><textarea name="noidung" required cols="30" rows="10"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Gửi" style="width:100px">
								<input type="reset" name="reset" value="Xóa" style="width:100px">							
							</td>
						</tr>
					</table>
					</form>
					
					


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>