<?php include 'ketnoicosodulieu.php';?>

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
					<?php 
					if (isset($_POST['submit'])) {
						$hoten=$_POST['hoten'];
						$sdt=$_POST['sdt'];
						$email=$_POST['email'];
						$noidung=$_POST['noidung'];
						mail("sale@shophoadanang.com", "Thông tin liên hệ", "$hoten - $sdt - $email <br> $noidung");
						echo "<center>Cảm ơn bạn đã liên hệ. Chúng tôi sẽ trả lời lại bạn trong thời gian sớm nhất</center>";
					}
					 ?>					
					


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>