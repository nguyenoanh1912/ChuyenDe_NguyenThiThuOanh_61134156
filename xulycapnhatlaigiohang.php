<?php
@session_start();
if(isset($_POST['submit']))
{
	foreach($_POST['qty'] as $key=>$value)//key la idsanpham,value la Soluong
	{
		if( ($value == 0) and (is_numeric($value)))//nhap so luong=0
		{
			unset ($_SESSION['cart'][$key]);//xoa $_session['cart']['idsp']
			unset ($_SESSION['loaichua'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))//nhap so luong>0
		{
			$_SESSION['cart'][$key]=$value;//gán lại $_session['cart']['idsp']=soluongmoinhap

			foreach($_POST['loaichua'] as $k=>$v){
				$_SESSION['loaichua'][$k]=$v;
			}
			

		}
	}
header("location:giohangcuaban.php");
}
?>