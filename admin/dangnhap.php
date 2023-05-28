<?php 
if (isset($_POST['submit'])) {
	$tentaikhoan=$_POST['tentaikhoan'];//lấy giá trị tên tài khoản từ textbox
	$matkhau=$_POST['matkhau'];//lấy giá trị mật khẩu từ textbox

	include '../ketnoicosodulieu.php';//chèn file kết nối csdl
	$sql="SELECT * FROM taikhoan WHERE tentaikhoan='$tentaikhoan' AND matkhau='$matkhau' AND phanquyen='1'";//câu lệnh sql
	$result=mysql_query($sql);

	$count = mysql_num_rows($result);
	if ($count==1) {
		@session_start();
		$_SESSION['admin']=$_POST['tentaikhoan'];
		header("Location: index.php");//Chuyển hướng đến trang index.php của quản lý hệ thống
	} else if($count==0){
		$thongbao='Đăng nhập thất bại. Xin thử lại';
	}
	
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản lý hệ thống</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>

		<br><br><br>
		
		<center>
		<?php 
		if(isset($thongbao)){
			echo $thongbao;
		} ?>				
		</center>

		<form method="POST">
			<table border="0">
				<tr>
					<td>Tên tài khoản</td>
					<td><input type="text" name="tentaikhoan" required></td>
				</tr>
				<tr>
					<td>Mật khẩu</td>
					<td><input type="password" name="matkhau" required></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Đăng nhập" style="width:48%">
						<input type="reset" name="reset" value="Xóa" style="width:48%">
					</td>
				</tr>
			</table>
		</form>

		<br>
		<center><a href="../index.php">Quay trở về trang chủ</a></center>
	</div>
</body>
</html>