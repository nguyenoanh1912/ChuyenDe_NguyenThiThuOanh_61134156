<?php include 'ketnoicosodulieu.php';@session_start(); ?>
<?php
@session_start();
if (!isset($_SESSION['user'])) {
	header("location: dangnhap.php");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng của bạn</title>
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
					<h3 style="text-align:center;">Giỏ hàng của bạn</h3>								

					<?php 
					if (isset($_SESSION['cart'])) {
						
						$soluongsanphamtronggiohang=count($_SESSION['cart']);
						
						if ($soluongsanphamtronggiohang>0) {
							//echo '<center>Có '.$soluongsanphamtronggiohang.' sản phẩm trong giỏ hàng</center><br>';	
					?>
						<form action="xulycapnhatlaigiohang.php" method="POST">
						<table border="1">
						<tr style="background-color:#1057bd;color:white;text-align:center;">
							<td>Tên sản phẩm</td>
							<td width="150">Giá (VND)</td>				
							<td width="50">Số lượng mua</td>
							<td width="150">Thành tiền (VND)</td>
							<td>Loại chứa</td>
							<td>Xóa</td>
						</tr>
						<?php 
						foreach ($_SESSION['cart'] as $key => $value) {
							$mangcacidsanpham[]=$key;
						}
						$chuoiidsanpham=implode(",", $mangcacidsanpham);//ví dụ 2,3,5
						$sql="SELECT * FROM sanpham WHERE idsanpham in ($chuoiidsanpham)";
						$query=mysql_query($sql);
						$tongtien=0;
						while($row=mysql_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['tensanpham'];?></td>
							<td width="150" style="text-align:right;">
							<?php 
							if ($row['giadiple']!=0 && $row['giadiple']!=NULL) {?>
								<strong><?php echo number_format($row['giadiple'],0,",",".");?> VNĐ (Lễ)</strong>
							<?php
							} else{
							 ?>	
							<strong><?php echo number_format($row['giaban'],0,",",".");?> VNĐ</strong>
							<?php } ?>
								
							</td>
							<td width="50">
							
							<select name="qty[<?php echo $row['idsanpham'];?>]">
								<?php 
								//Lây số lượng tồn sản phẩm
								$idsp=$row['idsanpham'];
								$sql1="SELECT soluongton FROM sanpham WHERE idsanpham='$idsp'";
								$query1=mysql_query($sql1);
								$row1=mysql_fetch_array($query1);
								$soluongtonsp=$row["soluongton"];
								echo $soluongtonsp;
								for($i=1;$i<=$soluongtonsp;$i++){
								 ?>
									<option <?php if($_SESSION['cart'][$row['idsanpham']]==$i){echo 'selected';} ?> value="<?php echo $i; ?>"><?php echo $i;?></option>
								<?php } ?>
							</select>
							</td>
							<td width="150" style="text-align:right;">
							<?php 
							if ($row['giadiple']!=0 && $row['giadiple']!=NULL) {?>
								<strong><?php echo number_format($_SESSION['cart'][$row['idsanpham']]*$row['giadiple'],0,",",".");?> VNĐ</strong>
							<?php
							} else{
							 ?>	
							<strong><?php echo number_format($_SESSION['cart'][$row['idsanpham']]*$row['giaban'],0,",",".");?> VNĐ</strong>
							<?php } ?>	
								
							</td>
							<td>
								<select name="loaichua[<?php echo $row['idsanpham'];?>]">
									<option value="Bó" <?php if(isset($_SESSION['loaichua'][$row['idsanpham']])){if($_SESSION['loaichua'][$row['idsanpham']]=="Bó"){echo 'selected';}}else{$_SESSION['loaichua'][$row['idsanpham']]="Bó";}?>>Bó</option>
									<option value="Lãng" <?php if(isset($_SESSION['loaichua'][$row['idsanpham']])){if($_SESSION['loaichua'][$row['idsanpham']]=="Lãng"){echo 'selected';}}else{$_SESSION['loaichua'][$row['idsanpham']]="Bó";}?>>Lãng</option>
									<option value="Giỏ" <?php if(isset($_SESSION['loaichua'][$row['idsanpham']])){if($_SESSION['loaichua'][$row['idsanpham']]=="Giỏ"){echo 'selected';}}else{$_SESSION['loaichua'][$row['idsanpham']]="Bó";}?>>Giỏ</option>
								</select>
							</td>
							<td><a href="xoakhoigiohang.php?idsanpham=<?php echo $row['idsanpham'];?>">Xóa</a></td>
						</tr>

						<?php 
						if ($row['giadiple']!=0 && $row['giadiple']!=NULL) {
							$tongtien+=$_SESSION['cart'][$row['idsanpham']]*$row['giadiple'];
						}else{
							$tongtien+=$_SESSION['cart'][$row['idsanpham']]*$row['giaban'];
						}
						
						} //Kết thúc vòng lặp while
						?>
						</table>
						<br>
						<div style="text-align:right;padding-right:130px;">Tổng tiền phải trả: <span style="font-weight:bold;color:red;"><?php echo number_format($tongtien,0,",",".");?> VND</span></div>
						
							<center><input type="submit" name="submit" value="Cập nhật lại giỏ hàng" style="width:250px;margin-top:3px;"></center>
							
						</form>

						<center>
						<a href="xoabotatcagiohang.php"><button style="width:250px;margin-top:3px;">Xóa cả giỏ hàng</button></a>
						<br>
						<a href="nhapthongtingiaohang.php"><button style="width:250px;margin-top:3px;">Nhập địa chỉ nhận hàng</button></a>
						<br><br>
						<a href="index.php">Mua hàng tiếp</a>
						</center>
					


						

					<?php		
						} else if($soluongsanphamtronggiohang==0){
							echo '<center>Giỏ hàng rỗng. Vui lòng <a href=index.php>trở lại mua sắm</a></center>';
						}

					} else {//Trường hợp không tồn tại $_SESSION['cart']
						echo '<center>Giỏ hàng rỗng. Vui lòng <a href=index.php>trở lại mua sắm</a></center>';
					}//Kết thúc if(isset($_SESSION['cart'])) {
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