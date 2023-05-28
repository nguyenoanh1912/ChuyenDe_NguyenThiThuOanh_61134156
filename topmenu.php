<div id="menu">
    <ul class="menu">
        <li><a href="index.php" class="parent"><span>Trang chủ</span></a></li>
        <li><a href="" class="parent"><span>Danh mục</span></a>
            <div><ul>
            	<?php 
            	$sql="SELECT * FROM loaisanpham";
            	$result=mysql_query($sql);
            	while ($row=mysql_fetch_array($result)) {
            	 ?>
                	<li><a href="xemloaisanpham.php?idloaisanpham=<?php echo $row['idloaisanpham'];?>"><span><?php echo $row['tenloaisanpham'];?></span></a></li>
                <?php }?>
            </ul></div>
        </li>
        <li><a href="giohangcuaban.php"><span>Giỏ hàng</span></a></li>        
        
        <?php 
        if (!isset($_SESSION['user'])) {
         ?>
            <li><a href="dangkythanhvien.php"><span>Đăng ký thành viên</span></a></li>
            <li><a href="dangnhap.php"><span>Đăng nhập</span></a></li>
        <?php } else {?>
            <li><a href="suataikhoan.php"><span>Sửa TK</span></a></li>
            <li><a href="xemdonhang.php"><span>Đơn hàng</span></a></li>
            <li><a href="thoat.php"><span>Thoát</span></a></li>
        <?php }?>

        <li class="last"><a href="lienhe.php"><span>Liên hệ</span></a></li>

    </ul>
</div>

