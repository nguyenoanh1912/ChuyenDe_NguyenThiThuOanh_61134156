<?php include 'ketnoicosodulieu.php';@session_start(); ?>
<?php 
if (isset($_POST['submit'])) {
	$tentaikhoan=$_POST['tentaikhoan'];
	$matkhau=$_POST['matkhau'];
	$hoten=$_POST['hoten'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$sql="INSERT INTO taikhoan(tentaikhoan,matkhau,phanquyen,hoten,diachi,sdt,email) VALUES('$tentaikhoan','$matkhau','0','$hoten','$diachi','$sdt','$email')";
	$result=mysql_query($sql);
	if ($result==true) {
		header("location: dangkythanhcong.php");
		die();
	} else {
		$thongbao="Có lỗi trong quá trình đăng ký. Xin thử lại";
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký thành viên</title>
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
					<h3 style="text-align:center;">Đăng ký thành viên</h3>
					<?php 
					if (isset($thongbao)) {
						echo "<center>$thongbao</center>";
					}
					 ?>
					<form method="POST">
					<table>
						<tr>
							<td>Tên tài khoản</td>
							<td><input type="text" name="tentaikhoan" required placeholder="Nhập tên tài khoản"></td>
						</tr>
						<tr>
							<td>Mật khẩu</td>
							<td><input type="password" name="matkhau" required></td>
						</tr>
						<tr>
							<td>Họ tên</td>
							<td><input type="text" name="hoten" required placeholder="Nhập họ tên"></td>
						</tr>
						<tr>
							<td>Địa chỉ</td>
							<td><textarea name="diachi" required placeholder="Nhập địa chỉ" rows="5" cols="17"></textarea></td>
						</tr>
						<tr>
							<td>SĐT</td>
							<td><input type="number" name="sdt" required maxlength="12" minlength="10"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" required placeholder="Nhập địa chỉ email"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Đăng ký thành viên">
								<input type="reset" name="reset" value="Xóa bỏ">
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