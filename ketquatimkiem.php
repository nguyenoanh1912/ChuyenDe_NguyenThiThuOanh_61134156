<?php include 'ketnoicosodulieu.php';@session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Kết quả tìm kiếm</title>
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
					<h3 style="text-align:center;">Kết quả tìm kiếm</h3>
					<?php 
					//ketquatimkiem.php?tensp=abc
					if (isset($_GET['tensp']) && $_GET['tensp']<>"") {
						$chuoitimkiem=$_GET['tensp'];
					} else{
						header("location:index.php");
					}
					
					$sql="SELECT * FROM sanpham WHERE tensanpham LIKE '%".$chuoitimkiem."%' ORDER BY idsanpham";
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result)){
					 ?>
						<div class="boxsanpham">
							<a href="chitietsanpham.php?idsanpham=<?php echo $row['idsanpham'];?>"><img src="images/upload/<?php echo $row['anh'];?>" width="80%" height="170"></a>
							<h3><?php echo substr($row['tensanpham'], 0,10).'...';?></h3></h3>
							
							<strong><?php echo number_format($row['giaban'],0,",",".");?> VNĐ</strong>
							<br>
							<a href="themvaogiohang.php?idsanpham=<?php echo $row['idsanpham'];?>"><button class="nutthemgiohang">Thêm vào giỏ hàng</button></a>
						</div>
					<?php }?>
					<div class="clear"></div>
					
					


			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			Bản quyền thuộc về shophoadanang.com
		</div>
	</div>
</body>
</html>