<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
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
		<?php include 'menu.php';//chèn menu?>
		<br>
		<?php echo '<center>Xin chào '.$_SESSION['admin'].'</center>';?>
		<center>
			<img src="../images/anh1.jpg">
		</center>

	</div>
</body>
</html>