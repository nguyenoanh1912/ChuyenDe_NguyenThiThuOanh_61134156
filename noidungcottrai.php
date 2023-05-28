
<?php 
if (isset($_SESSION['user'])) {
	//$_SESSION['user'] la id tai khoan tao o dangnhap.php
	$idtaikhoan=$_SESSION['user'];
	$sql_tentk="SELECT tentaikhoan FROM taikhoan WHERE idtaikhoan='$idtaikhoan'";
	$arraytk=mysql_fetch_array(mysql_query($sql_tentk));
	$tentk=$arraytk['tentaikhoan'];
	echo "Xin chào ".$tentk.'! <br><br>';
}

 ?>
<h3>Tìm kiếm</h3>
	<input type="text" name="tensanpham" id="tensanpham" placeholder="Nhập tên hoa" style="width:90%;">
	<script type="text/javascript">
		document.getElementById("tensanpham").addEventListener("keyup", function(event){
		    event.preventDefault();
		    if (event.keyCode == 13){
		        window.location = "ketquatimkiem.php?tensp="+document.getElementById("tensanpham").value;//Chuyển hướng đến trang tìm kiếm
		    }
		});
	</script>

<br>
<br>
<h3>Loại hoa</h3>
<?php 
$sql="SELECT * FROM loaisanpham";
$result=mysql_query($sql);
while ($row=mysql_fetch_array($result)) {
 ?>
	<img src="images/arrow_right_icon.jpg "><a href="xemloaisanpham.php?idloaisanpham=<?php echo $row['idloaisanpham'];?>"><span><?php echo $row['tenloaisanpham'];?></span></a><br>
<?php }?>

<br>
<br>
<h3>Đối tác</h3>
<a href="http://hoatuoisaigon.com.vn/" target="_blank"><img src="images/hoatuoisaigon.jpg" width="100%"></a><br><br>
<a href="http://phohoadalat.com/" target="_blank"><img src="images/dalavi.jpg" width="100%"></a><br>
<a href="https://www.marry.vn/nha-cung-cap/hoa-tuoi-rio" target="_blank"><img src="images/rio.jpg" width="100%"></a><br>

<br>
<br>
<h3>Giao hàng</h3>
<img src="images/giaohangmienphi.jpg" width="100%"></a>

<br>
<br>
<h3>Hỗ trợ</h3>
<h4>ĐT: 0905.635.253</h4>
<h4>Email: sale@shophoadanang.com</h4>