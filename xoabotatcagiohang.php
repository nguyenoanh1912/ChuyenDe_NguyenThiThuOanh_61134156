<?php 
@session_start();
unset($_SESSION['cart']);
unset($_SESSION['loaichua']);
header("Location: giohangcuaban.php");
 ?>