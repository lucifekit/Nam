<?php 
    if(isset($_GET['id_sp'])) $id_sp=$_GET['id_sp'];
    $sql_chitiet="SELECT * FROM sanpham WHERE id_sp=$id_sp";
    $query_chitiet=mysql_query($sql_chitiet);
    $num_chitiet=mysql_num_rows($query_chitiet);
    if($num_chitiet>0){
        $row=mysql_fetch_array($query_chitiet);
?>
<div class="prd-block">
    <div class="prd-only">
    	<div class="prd-img"><img width="50%" src="quantri/anh/<?php echo $row['anh_sp']; ?>" /></div>	
        <div class="prd-intro">
        	<h3><?php echo $row['ten_sp']; ?></h3>
            <p>Giá sản phẩm: <span><?php echo $row['gia_sp']; ?> VNĐ</span></p>
        	<table>
            	<tr>
                	<td width="30%"><span>Bảo hành:</span></td>
                    <td>• <?php echo $row['bao_hanh']; ?></td>
                </tr>
                <tr>
                	<td><span>Đi kèm:</span></td>
                    <td>• <?php echo $row['phu_kien']; ?></td>
                </tr>
                <tr>
                	<td><span>Tình trạng:</span></td>
                    <td>• <?php echo $row['tinh_trang']; ?></td>
                </tr>
                <tr>
                	<td><span>Khuyến Mại:</span></td>
                    <td>• <?php echo $row['khuyen_mai']; ?></td>
                </tr>
                <tr>
                	<td><span>Còn hàng:</span></td>
                    <td>• <?php echo $row['trang_thai']; ?></td>
                </tr>
            </table>
            <p class="add-cart"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $id_sp;  ?>"><span style="background:red">đặt mua</span></a></p>
        </div>
        
        <div class="clear"></div>
        
        <div class="prd-details">
        <?php echo $row['chi_tiet_sp']; ?>
        </div>
    </div>
    
    <div class="prd-comment">
        <?php 

            //kiểm tra nhấn submit hay chưa ?
            if(isset($_POST['submit']))
            {
                $ten=$_POST['ten'];if($ten=='') $error_ten="Bạn chưa nhập tên ?";
                $dien_thoai=$_POST['dien_thoai'];if($dien_thoai=='') $error_dien_thoai="Bạn chưa nhập số điện thoại ?";
                $binh_luan=$_POST['binh_luan'];if($binh_luan=='') $error_binh_luan="Bạn chưa nhập nội dung ?";
                if($ten !='' && $dien_thoai!='' && $binh_luan!='')
                {
                   $ngay_gio = gmdate("Y-m-d G:i:s",time()+7*3600);
                    //thêm bình luận
                    echo $sql_binhluan="
                        INSERT INTO blsanpham(id_sp,ten,dien_thoai,binh_luan,ngay_gio)
                        VALUES($id_sp,'$ten','$dien_thoai','$binh_luan','$ngay_gio')
                    ";
                    mysql_query($sql_binhluan);
                }


            }
        ?>
    <h3>Bình luận sản phẩm</h3>
    <form method="post">
    	<ul>
        	<li class="required">Tên (*)<br /><input type="text" name="ten" /> <span> <?php if(isset($error_ten)) echo $error_ten; ?></span></li>
            <li class="required">Số điện thoại (*)<br /><input type="text" name="dien_thoai" /> <span> <?php if(isset($error_dien_thoai)) echo $error_dien_thoai; ?></span></li>
            <li class="required">Nội dung (*)<br /><textarea name="binh_luan"></textarea> <span> <?php if(isset($error_binh_luan)) echo $error_binh_luan; ?></span></li>
            <li><input type="submit" name="submit" value="Bình luận" /></li>
        </ul>
    </form>
    </div>
    
    <div class="comment-list">
        <?php 
            //lấy ra ds binh luận
            $sql_ds_binhluan="SELECT * FROM blsanpham WHERE id_sp =$id_sp ORDER BY id_bl DESC";
            $ds_binhluan=mysql_query($sql_ds_binhluan);
            while($row =mysql_fetch_array($ds_binhluan)){
        ?>
    	<ul>
        	<li class="com-title"><?php echo $row['ten']; ?><br /><span><?php echo date('H:i d-m-Y',strtotime($row['ngay_gio'])); ?></span></li>
            <li class="com-details"><?php echo $row['binh_luan']; ?></li>
        </ul>
        <?php } ?>
    </div>
    
    <div class="com-pagination"><span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a></div>
    
</div> 
<?php }else echo 'ko có sp nào cả'; ?>