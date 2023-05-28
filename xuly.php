<?php
//Thuc hien 3 viec: tao hoa don, hoa don chi tiet
@session_start();


if (isset($_POST['submit'])) {//Lay tu form nhapthongtingiaohang.php
	
	//Ghi vao hoa don va hoa don chi tiet voi trang thai chua thanh toan
	date_default_timezone_set("Asia/Bangkok");
  	$thoigian = date('Y-m-d h:i:s', time());
  	$hoten_datmua=$_POST['hoten_datmua'];
  	$diachi_datmua=$_POST['diachi_datmua'];
  	$sodienthoai_datmua=$_POST['sodienthoai_datmua'];
  	$idtaikhoan_dangnhap=$_SESSION['user'];//Lay idtaikhoan thanh vien dang dang nhap

	$sql1="INSERT INTO hoadon(thoigian,hoten_datmua,diachi_datmua,sdt_datmua,trangthai,idtaikhoan) VALUES('$thoigian','$hoten_datmua','$diachi_datmua','$sodienthoai_datmua','0','$idtaikhoan_dangnhap')";//0 la trang thai chua tra tien

	include 'ketnoicosodulieu.php';
	$result=mysql_query($sql1);
	if ($result==true) {
		//Lay idhoadon moi nhat
		$sql2="SELECT idhoadon FROM hoadon ORDER BY idhoadon DESC LIMIT 0,1";
		$array=mysql_fetch_array(mysql_query($sql2));
		$idhoadon_lastest=$array['idhoadon'];

		//Chen vao bang hoa don chi tiet
		@session_start();
		$mangcart=$_SESSION['cart'];
		foreach ($mangcart as $key => $value) {//Duyet qua array cart
			$loaichua=$_SESSION['loaichua'][$key];//Loại bó, lãng,giỏ 

			$sql3="INSERT INTO hoadonchitiet(idhoadon,idsanpham,soluongmua,loaichua) VALUES('$idhoadon_lastest','$key','$value','$loaichua')";
			mysql_query($sql3);
		}//Ket thuc foreach

		@session_start();
		unset($_SESSION['cart']);
		unset($_SESSION['loaichua']);
		header("Location: success.php");

	}

 
}
?>
