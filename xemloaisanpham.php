<?php include 'ketnoicosodulieu.php';@session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Xem theo loại hoa</title>
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
					<?php $idloaisanpham=$_GET['idloaisanpham']; ?>

					<h3 style="text-align:center;">Các hoa thuộc loại  
						<?php 
						$idloaisanpham=$_GET['idloaisanpham'];
						$sql="SELECT tenloaisanpham FROM loaisanpham WHERE idloaisanpham='$idloaisanpham'";
						$array=mysql_fetch_array(mysql_query($sql));
						echo $array['tenloaisanpham'];
						 ?>
					</h3>
					<?php 
					$sql="SELECT * FROM sanpham WHERE idloaisanpham='$idloaisanpham' ORDER BY idsanpham DESC LIMIT 0,15";
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result)){
					 ?>
						<div class="boxsanpham">
							<a href="chitietsanpham.php?idsanpham=<?php echo $row['idsanpham'];?>"><img src="images/upload/<?php echo $row['anh'];?>" width="80%" height="170"></a>
							<h3><?php echo $row['tensanpham'];?></h3></h3>
							
							<?php 
							if ($row['giadiple']!=0 && $row['giadiple']!=NULL) {?>
								<strong><?php echo number_format($row['giadiple'],0,",",".");?> VNĐ (Lễ)</strong>
							<?php
							} else{
							 ?>	
							<strong><?php echo number_format($row['giaban'],0,",",".");?> VNĐ</strong>
							<?php } ?>

							
							<br>
							<?php 
							if($row['soluongton']==0){
								echo "<span style='color:red'>Hết hàng</span>";
							} else {
							 ?>
							<a href="themvaogiohang.php?idsanpham=<?php echo $row['idsanpham'];?>">Thêm vào giỏ hàng</a>
							<?php } ?>
						</div>
					<?php }?>
					<div class="clear"></div>
					<!--/Sản phẩm mới nhất-->
					
					


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>