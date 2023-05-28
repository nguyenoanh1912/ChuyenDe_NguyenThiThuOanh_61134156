<?php 
include '../ketnoicosodulieu.php';

@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}


if (isset($_POST['submit'])) {
	//Lưu lại tình trạng đơn hàng
	$trangthai=$_POST['trangthai'];
	$idhoadon=$_POST['idhoadon'];
	//echo $trangthai.' '.$idhoadon;
	$sql="UPDATE hoadon SET trangthai='$trangthai' WHERE idhoadon='$idhoadon'";
	$result=mysql_query($sql);
	if ($result==true) {
		header("Location: quanlydonhang.php");
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa tình trạng đơn hàng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Sửa tình trạng đơn hàng</h2>
		<center>Chọn trạng thái cho đơn hàng #<?php echo $_GET['idhoadon'] ?></center>
		<form method="POST" style="margin:0px auto;width:400px">
			<?php 
			
			
			//Lấy trạng thái của id hóa đơn sửa
			$idhoadon=$_GET['idhoadon'];
			$sql="SELECT trangthai FROM hoadon WHERE idhoadon='$idhoadon'";
			$result=mysql_query($sql);//nhiều hàng nhiều cột, nhưng mà ở đây chỉ có 1 cột do select trangthai

			$array=mysql_fetch_array($result);
			$tt=$array['trangthai'];//
			 ?>
			 <input type="hidden" name="idhoadon" value="<?php echo $idhoadon; ?>">
			<input type="radio" name="trangthai" value="0" <?php if($tt==0){echo 'checked';} ?>> Đang chờ xử lý<br>
  			<input type="radio" name="trangthai" value="1" <?php if($tt==1){echo 'checked';} ?>> Đang giao hàng<br>
  			<input type="radio" name="trangthai" value="2" <?php if($tt==2){echo 'checked';} ?>> Đã giao hàng <br>
  			<input type="radio" name="trangthai" value="3" <?php if($tt==3){echo 'checked';} ?>> Giao hàng thất bại <br>
  			<input type="radio" name="trangthai" value="4" <?php if($tt==4){echo 'checked';} ?>> Hoàn trả <br>

  			<input type="submit" name="submit" value="Lưu lại">
		</form>

	</div>
</body>
</html>