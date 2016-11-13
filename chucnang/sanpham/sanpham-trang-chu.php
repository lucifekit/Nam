<?php 
    //sản phẩm đặc biệt
    $sql_dacbiet="SELECT * FROM sanpham WHERE dac_biet=1 ORDER BY id_sp DESC LIMIT 6";
    $query_dacbiet=mysql_query($sql_dacbiet);
    $num_dacbiet=mysql_num_rows($query_dacbiet);
?>

<?php if($num_dacbiet>0){ ?>
<div class="prd-block">
	<h2>sản phẩm đặc biệt</h2>
    <div class="pr-list">
        <?php while($row=mysql_fetch_array($query_dacbiet)){ ?>
    	<div class="prd-item">
        	<a href="chitietsp/<?php echo $row['id_sp']; ?>/<?php echo makeURL($row['ten_sp']); ?>.html"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
            <p class="price"><span>Giá: <?php echo $row['gia_sp']; ?> VNĐ</span></p>
        </div>
       <?php } ?>
        <div class="clear"></div>
    </div>
</div>
<?php }else echo'Không có sp nào cả'; ?>
<?php 
    //sản phẩm mới về
    $sql_moi="SELECT * FROM sanpham  ORDER BY id_sp DESC LIMIT 6";
    $query_moi=mysql_query($sql_moi);
    $num_moi=mysql_num_rows($query_moi);
?>
<div class="prd-block">
	<h2>sản phẩm mới về</h2>
    <div class="pr-list">
    	 <?php while($row=mysql_fetch_array($query_moi)){ ?>
        <div class="prd-item">
            <a href="chitietsp/<?php echo $row['id_sp']; ?>/<?php echo makeURL($row['ten_sp']); ?>.html"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>" /></a>
            <h3><a href="#"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
            <p class="price"><span>Giá: <?php echo $row['gia_sp']; ?> VNĐ</span></p>
        </div>
       <?php } ?>
       
        
        <div class="clear"></div>
    </div>
</div>