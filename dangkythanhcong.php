<?php include 'ketnoicosodulieu.php';@session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký thành công</title>
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
				<h2 style="text-align:center;">Chúc mừng!</h2>		
				<center>Bạn đã đăng ký tài khoản thành công. <a href='dangnhap.php'>Nhấn vào đây</a> để đăng nhập</center>					


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>