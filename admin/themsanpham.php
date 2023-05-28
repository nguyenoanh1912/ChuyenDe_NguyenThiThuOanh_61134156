<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>

<?php 
if (isset($_POST['submit'])) {

	$tensanpham=$_POST['tensanpham'];
	$thongtinsanpham=$_POST['thongtinsanpham'];
	$giaban=$_POST['giaban'];
	$idloaisanpham=$_POST['idloaisanpham'];

	$tenfileanh=generateRandomString().$_FILES['anh']['name'];
	//print_r($_FILES['anh']);
	$giadiple=$_POST["giadiple"];
	$soluongton=$_POST['soluongton'];

	$sql="INSERT INTO sanpham(tensanpham,thongtinsanpham,anh,giaban,idloaisanpham,soluongton,giadiple) VALUES('$tensanpham','$thongtinsanpham','$tenfileanh','$giaban','$idloaisanpham','$soluongton','$giadiple')";

	include '../ketnoicosodulieu.php';
	$result=mysql_query($sql);
	if ($result==true) {
		move_uploaded_file($_FILES["anh"]["tmp_name"], "../images/upload/".$tenfileanh);
		header("Location: danhsachsanpham.php");

	} else{
		echo "Có lỗi xảy ra, xin thử lại";
	}

	
}


function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Thêm hoa mới</h2>
		
		<center>
		<?php 
		if(isset($thongbao)){
			echo $thongbao;
		} ?>				
		</center>

		<form method="POST" enctype="multipart/form-data">
		<table align="center">
			<tr>
				<td>Tên hoa</td>
				<td><input type="text" name="tensanpham" style="width:100%" required></td>
			</tr>
			<tr>
				<td>Mô tả</td>
				<td><textarea class="bogochu" name="thongtinsanpham" required rows="10" cols="35"> </textarea></td>
			</tr>
			<tr>
				<td>Chọn ảnh</td>
				<td><input type="file" name="anh" required></td>
			</tr>
			<tr>
				<td>Giá bán</td>
				<td><input type="number" name="giaban" required></td>
			</tr>
			<tr>
				<td>Giá dịp lễ</td>
				<td>
					<input type="number" name="giadiple">
				</td>
			</tr>	
			<tr>
				<td colspan="2">(nếu nhập sẽ lấy giá này hoặc bỏ trống sẽ không lấy)</td>
			</tr>		
			<tr>
				<td>Loại hoa</td>
				<td>
					<select name="idloaisanpham">
						<?php 
						include '../ketnoicosodulieu.php';
						$sql="SELECT * FROM loaisanpham";
						$result=mysql_query($sql);
						while ($row=mysql_fetch_array($result)) {
						?>
						<option value="<?php echo $row['idloaisanpham'];?>"><?php echo $row['tenloaisanpham'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Số lượng sản phẩm</td>
				<td>
					<select name="soluongton">
						<?php 
						for($i=0;$i<=1000;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Thêm vào" style="width:30%"></td>
			</tr>
		</table>
		</form>
<br><br>
	</div>

</body>
</html>