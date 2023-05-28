<?php 
@session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location: dangnhap.php");
}
 ?>

<?php 
if (isset($_GET['idxoa'])) {
	$idxoa=$_GET['idxoa'];//Lấy idxoa trên đường dẫn web
	include '../ketnoicosodulieu.php';
	$sql="DELETE FROM sanpham WHERE idsanpham='$idxoa'";
	$result=mysql_query($sql);
	if ($result==true) {
		header("Location: danhsachsanpham.php");
	}
}
 ?>
