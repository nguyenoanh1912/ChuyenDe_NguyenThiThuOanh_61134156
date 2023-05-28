<?php include 'ketnoicosodulieu.php';@session_start(); ?>
<?php
if (!isset($_SESSION['user'])) {
	header("location: dangnhap.php");
	die();
}
?>

<?php
if (isset($_GET['idsanpham'])) {
	$idsanpham=$_GET['idsanpham'];
	//Lấy số lượng tồn kho của sản phẩm hiện tại
	 $sql_sp="SELECT soluongton FROM sanpham WHERE idsanpham='$idsanpham'";
	 $array_sp=mysql_fetch_array(mysql_query($sql_sp));
	 $soluongton_sp= $array_sp['soluongton'];
	 

	if(isset($_SESSION['cart'][$idsanpham]))
	{	 
		 if($soluongton_sp>0){
		 	$soluongdat = $_SESSION['cart'][$idsanpham] + 1;

			if($soluongdat<=$soluongton_sp){
				$_SESSION['cart'][$idsanpham]=$soluongdat;
				header("location:giohangcuaban.php");				
			} else {
				$soluongdat = $soluongdat-1;
				$_SESSION['cart'][$idsanpham]=$soluongdat;
				echo "<meta charset='UTF-8'><script>alert('Số lượng mua vượt quá số lượng tồn kho.');window.location.replace('http://localhost/shophoa');</script>";
			}
		 } else {
				unset($_SESSION['cart'][$idsanpham]);
				echo "<meta charset='UTF-8'><script>alert('Sản phẩm này đã hết hàng.');window.location.replace('http://localhost/shophoa');</script>";
		 }
	}
	else
	{
		if($soluongton_sp>0){
			$soluongdat=1;
			$_SESSION['cart'][$idsanpham]=$soluongdat;
			header("location:giohangcuaban.php");
		} else {
			echo "<meta charset='UTF-8'><script>alert('Sản phẩm này đã hết hàng.');window.location.replace('http://localhost/shophoa');</script>";
		}
	 
	}

	

} else {
	header("Location:index.php");
}

 ?>