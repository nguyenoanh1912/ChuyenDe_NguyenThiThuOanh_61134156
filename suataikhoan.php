<?php include 'ketnoicosodulieu.php';@session_start(); ?>
<?php 
$idtaikhoan_sua=$_SESSION['user'];
$sql1="SELECT * FROM taikhoan WHERE idtaikhoan='$idtaikhoan_sua'";
$array=mysql_fetch_array(mysql_query($sql1));


if (isset($_POST['submit'])) {
	$matkhau=$_POST['matkhau'];
	$hoten=$_POST['hoten'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$sql2="UPDATE taikhoan SET matkhau='$matkhau',phanquyen='0',hoten='$hoten',diachi='$diachi',sdt='$sdt',email='$email' WHERE idtaikhoan='$idtaikhoan_sua'";

	$result=mysql_query($sql2);

	if ($result==true) {
		$thongbao="Sửa thông tin thành công";
	} else {
		$thongbao="Có lỗi trong quá trình sửa. Xin thử lại";
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa tài khoản</title>
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
					<h3 style="text-align:center;">Sửa thông tin tài khoản</h3>
					<?php 
					if (isset($thongbao)) {
						echo "<center>$thongbao</center>";
					}
					 ?>


					<form method="POST">
					<table>						
						<tr>
							<td>Mật khẩu</td>
							<td><input type="password" name="matkhau" required value="<?php echo $array['matkhau'];?>"></td>
						</tr>
						<tr>
							<td>Họ tên</td>
							<td><input type="text" name="hoten" required placeholder="Nhập họ tên" value="<?php echo $array['hoten'];?>""></td>
						</tr>
						<tr>
							<td>Địa chỉ</td>
							<td><textarea name="diachi" required placeholder="Nhập địa chỉ" rows="5" cols="17"><?php echo $array['diachi'];?></textarea></td>
						</tr>
						<tr>
							<td>SĐT</td>
							<td><input type="number" name="sdt" required maxlength="12" minlength="10" value="<?php echo $array['sdt'];?>""></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" required placeholder="Nhập địa chỉ email" value="<?php echo $array['email'];?>""></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Cập nhật lại">
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