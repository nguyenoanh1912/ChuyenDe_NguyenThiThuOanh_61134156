<?php include 'ketnoicosodulieu.php';@session_start(); ?>
<?php 
if (isset($_POST['submit'])) {
	$tentaikhoan=$_POST['tentaikhoan'];
	$matkhau=$_POST['matkhau'];
	$sql="SELECT * FROM taikhoan WHERE tentaikhoan='$tentaikhoan' AND matkhau='$matkhau' AND phanquyen='0'";
	$result=mysql_query($sql);

	$count = mysql_num_rows($result);
	if ($count==1) {
		$array=mysql_fetch_array($result);
		$idtaikhoan_dangnhap=$array["idtaikhoan"];
		$_SESSION['user']=$idtaikhoan_dangnhap;
		header("Location: index.php");
	} else if($count==0){
		$thongbao='Đăng nhập thất bại. Xin thử lại';
	}
	
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
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
					<h3 style="text-align:center;">Nhập thông tin đăng nhập</h3><br>

					<center>
					<?php 
					if(isset($thongbao)){
						echo $thongbao;
					} ?>				
					</center>
					
					<form method="POST">
					<table align="center">
						<tr>
							<td>Tên tài khoản</td>
							<td><input type="text" name="tentaikhoan"></td>
						</tr>
						<tr>
							<td>Mật khẩu</td>
							<td><input type="password" name="matkhau"></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<input type="submit" name="submit" value="Đăng nhập">
							<input type="reset" name="reset" value="Xóa làm lại"></td>
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