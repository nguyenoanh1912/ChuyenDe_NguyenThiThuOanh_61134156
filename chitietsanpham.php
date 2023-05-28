<?php include 'ketnoicosodulieu.php';@session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Xem chi tiết hoa</title>
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
				<?php 
				$idsanpham=$_GET['idsanpham'];
				$sql="SELECT * FROM sanpham WHERE idsanpham='$idsanpham'";
				$array=mysql_fetch_array(mysql_query($sql));
				 ?>	
				<center>
				<h2 style="color:green"><?php echo $array['tensanpham'];?></h2>
				<span style="color:blue;font-weight:bold;"><?php echo number_format($array['giaban'],0,",",".");?> VNĐ
				</span>
				<br>
				<?php 
				if($array['soluongton']==0){
					echo "<center><span style='color:red'>Hết hàng</span></center>";
				} else {
				 ?>
				<a href="themvaogiohang.php?idsanpham=<?php echo $array['idsanpham'];?>">Thêm vào giỏ hàng</a>
				<?php } ?>
				<br>
				<center>(còn <?php echo $array['soluongton'];?> sản phẩm)</center>
				<br>
				<img src="images/upload/<?php echo $array['anh'];?>" width="300">
				</center>
				
				

				<div style="width:600px;margin:0px auto;height:200px;overflow-y:auto;"><?php echo $array['thongtinsanpham'];?></div>
									


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>