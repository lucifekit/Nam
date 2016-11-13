<?php
    if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0 ){
        //select * from sanpham where id_sp IN(1,2,5,6,7,8)
        //Khai báo 1 mảng rỗng  A
        //Lặp mảng giỏ hàng , mỗi vòng lặp thì thêm key (id_Sp) vào mảng A
        
        //Cập nhật giỏ hàng 
        if(isset($_POST['submit']))//kiểm tra nhấn nút submit hay chưa ?
        {
            foreach ($_POST['sl'] as $id_sp => $so_luong) {
                if($so_luong<=0) unset($_SESSION['giohang'][$id_sp]);//xóa sản phẩm
                else $_SESSION['giohang'][$id_sp]=$so_luong;//cập nhật lại 
            }
        }

        $arrId=array();
        foreach ($_SESSION['giohang'] as $id_sp => $so_luong) {
           $arrId[]=$id_sp;//thêm phần tử
        }
        $strId=implode(',', $arrId);//chuyển mảng id_sp sang chuỗi id_sp
        $sql="select * from sanpham where id_sp IN($strId) ORDER BY id_sp DESC";
        $query=mysql_query($sql);
?>
<div class="prd-block">
	<h2>giỏ hàng của bạn</h2>
    <form method="post">
    <div class="cart">
        <?php $totalAll=0; while($row=mysql_fetch_assoc($query)){ ?>
    	<table width="100%">
        	<tr>
            	<td class="cart-item-img" width="25%" rowspan="4"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>" /></td>
                <td width="25%">Sản phẩm:</td>
                <td class="cart-item-title" width="50%"><?php echo $row['ten_sp']; ?></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><span><?php echo number_format($row['gia_sp']); ?> VNĐ</span></td>
            </tr>
            <tr>
            	<td>Số lượng:</td>
                <td><input type="text" name="sl[<?php echo $row['id_sp']; ?>]" value="<?php echo $_SESSION['giohang'][$row['id_sp']]; ?>" /> (Bỏ mặt hàng này) <a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp']; ?>">X</a></td>
            </tr>
            <tr>
            	<td>Tổng tiền:</td>
                <td><span><?php echo $total=$_SESSION['giohang'][$row['id_sp']]*$row['gia_sp']; ?> VNĐ</span></td>
            </tr>
        </table>
        <?php  $totalAll=$totalAll+$total; } ?>

        <p>Tổng giá trị giỏ hàng là: <span><?php echo number_format($totalAll); ?> VNĐ</span></p>
        <p class="update-cart"><input type="submit" name="submit" value="Cập nhật giỏ hàng"></p>
        <p><a href="index.html">Bổ sung sản phẩm</a> <span>•</span> <a onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="chucnang/giohang/xoahang.php?id_sp=0">Xóa hết sản phẩm</a> <span>•</span> <a  href="muahang.html">Dừng mua và Thanh toán</a></p>
    </div>
    </form>
</div>
<?php }else echo 'Không có sản phẩm nào cả !'; ?>