<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>

<?php 
if (isset($_GET['idsua'])) {
	$idsua=$_GET['idsua'];
	$sql="SELECT * FROM sanpham WHERE idsanpham='$idsua'";
	include '../ketnoicosodulieu.php';
	$array=mysql_fetch_array(mysql_query($sql));
}


if (isset($_POST['submit'])) {
	if(empty($_FILES['anh']['name'])==TRUE){//Trường hợp không cập nhật lại ảnh

		$idsua=$_GET['idsua'];//Lấy id sản phẩm cần sửa trên đường dẫn web
		$tensanpham=$_POST['tensanpham'];
		$thongtinsanpham=$_POST['thongtinsanpham'];
		$giaban=$_POST['giaban'];
		$idloaisanpham=$_POST['idloaisanpham'];
		$giadiple=$_POST["giadiple"];
		$soluongton=$_POST['soluongton'];

		$sql="UPDATE sanpham
		SET 
		tensanpham='$tensanpham',
		thongtinsanpham='$thongtinsanpham',
		giaban='$giaban',
		idloaisanpham='$idloaisanpham',
		soluongton='$soluongton',
		giadiple='$giadiple'
		WHERE idsanpham='$idsua'";

		include '../ketnoicosodulieu.php';
		$result=mysql_query($sql);
		if ($result==true) {			
			header("Location: danhsachsanpham.php");
		}


	} else {//Trường hợp có cập nhật lại ảnh

		$idsua=$_GET['idsua'];//Lấy id sản phẩm cần sửa trên đường dẫn web
		$tensanpham=$_POST['tensanpham'];
		$thongtinsanpham=$_POST['thongtinsanpham'];
		$giaban=$_POST['giaban'];
		$idloaisanpham=$_POST['idloaisanpham'];
		$soluongton=$_POST['soluongton'];
		$tenfileanh=generateRandomString().$_FILES['anh']['name'];
		$giadiple=$_POST["giadiple"];

		$sql="UPDATE sanpham
		SET 
		tensanpham='$tensanpham',
		thongtinsanpham='$thongtinsanpham',
		anh='$tenfileanh',
		giaban='$giaban',
		idloaisanpham='$idloaisanpham',
		soluongton='$soluongton',
		giadiple='$giadiple'
		WHERE idsanpham='$idsua'";

		include '../ketnoicosodulieu.php';
		$result=mysql_query($sql);
		if ($result==true) {
			move_uploaded_file($_FILES["anh"]["tmp_name"], "../images/upload/".$tenfileanh);
			header("Location: danhsachsanpham.php");
		}

	}

	
}

//Hàm tạo chuỗi ngẫu nhiên
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
	<title>Sửa thông tin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="wrapper">
		<h1 style="text-align:center;background-color:green;color:white">Quản lý hệ thống</h1>
		<?php include 'menu.php';//chèn menu?>

		<h2 style="text-align:center">Sửa thông tin hoa</h2>
		
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
				<td><input type="text" name="tensanpham" style="width:100%" required value="<?php echo $array['tensanpham'];?>"></td>
			</tr>
			<tr>
				<td>Mô tả</td>
				<td><textarea class="bogochu" name="thongtinsanpham" required rows="10" cols="35"><?php echo $array['thongtinsanpham'];?></textarea></td>
			</tr>
			<tr>
				<td>Chọn ảnh</td>
				<td>
				<img src="../images/upload/<?php echo $array['anh'];?>" width="100"><br>
				<input type="file" name="anh">
				</td>
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
						<option value="<?php echo $row['idloaisanpham'];?>" <?php if($row['idloaisanpham']==$array['idloaisanpham']){echo 'selected';} ?> ><?php echo $row['tenloaisanpham'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Giá bán</td>
				<td><input type="number" name="giaban" required value="<?php echo $array['giaban'];?>"></td>
			</tr>
			<tr>
				<td>Giá dịp lễ</td>
				<td>
					<input type="number" value="<?php if($array['giadiple']!="0"){echo $array['giadiple'];}?>" name="giadiple">
				</td>
			</tr>	
			<tr>
				<td colspan="2">(nếu nhập sẽ lấy giá này hoặc bỏ trống sẽ không lấy)</td>
			</tr>
			<tr>
				<td>Số lượng sản phẩm</td>
				<td>
					<select name="soluongton">
						<?php 
						for($i=0;$i<=1000;$i++){
						?>
						<option value="<?php echo $i;?>" <?php if($i==$array['soluongton']){echo 'selected';}?>><?php echo $i;?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Lưu lại" style="width:50%"></td>
			</tr>
		</table>
		</form>
<br><br>
	</div>

</body>
</html>