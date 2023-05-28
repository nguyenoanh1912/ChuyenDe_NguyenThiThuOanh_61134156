<?php
session_start();
if (isset($_GET['idsanpham'])) {
	$idsanpham=$_GET['idsanpham'];
	unset($_SESSION['cart'][$idsanpham]);
	unset ($_SESSION['loaichua'][$idsanpham]);
	header("location:giohangcuaban.php");
} else {
	header("location:giohangcuaban.php");
}


?>