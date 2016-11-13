<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>
<script language="javascript">
    
</script>
<script>

</script>

<?php
$quanly = isset($_COOKIE['id'])?$_COOKIE['id']:0;
if(!$quanly>0){
	die("Invalid user");
}
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

$rowsPerPage = 10;
$perRow = $page*$rowsPerPage - $rowsPerPage;

$sql = "SELECT * FROM khachhang JOIN thanhvien ON khachhang.kh_quanly=thanhvien.id_thanhvien ".($quanly<>1?"WHERE khachhang.kh_quanly=".$quanly:"")."
				 LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);

//
$totalRows = mysql_num_rows(mysql_query("SELECT * FROM khachhang"));
$totalPages = ceil($totalRows/$rowsPerPage);

$listPage = '';
for($i=1; $i<=$totalPages; $i++){
	
	if($page == $i){
		$listPage .= '<span>'.$i.'</span> ';
	}
	else{
		$listPage .= '<a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a> ';
	}
}
?>

<?php
    //xóa nhiều sản phẩm 
    if(isset($_POST['submit']))
    {
       if($_POST['hanhdong']=='xoa')
       {
            
       }
       else $thongbao="Bạn chưa chọn hành động !"; 
    }
?>
<h2>quản lý khách hàng</h2>
<form method="post" action="">
<p><?php echo isset($thongbao)?$thongbao:''; ?></p>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themkh"><span>Thêm khách hàng mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="5%"><input  id="checkAll" name="checkAll" type="checkbox" ></td>
            
            <td width="45%">Tên khách hàng</td>
            <!--<td width="35%">Quản lý</td>-->
            <?php 
            if($quanly==1){ ?>
				<td width="15%">Quản lý</td>
				<td width="20%">Thông tin 1</td>
    		<?php
    			}else{
    		?>
				<td width="35%">Thông tin 2</td>
            <?php
        		}
        	?>
            
            
			<td width="5%">In</td>
            <td width="5%">Sửa</td>
        </tr>
        
        <?php
        while($row = mysql_fetch_array($query)){
		?>
        <tr>
            <td><span><?php echo $row['kh_id'];?></span></td>
            <td style="text-align:center" width="5%"><input name="checkbox[]" value="<?php echo $row['kh_id'] ?>" type="checkbox"></td>
            <td class="l5"><a href="quantri.php?page_layout=inkh&id_kh=<?php echo $row['kh_id'];?>"><?php echo $row['kh_name'];?></a></td>
            <?php 
            	if($quanly==1){
    		?>
			
			<td class="l5"><?=$row['tai_khoan'];?></td>
			<td width="20%"><?=$row['kh_thongtin'];?></td>
    		<?php
            }else{
            	?>
			<td width="35%"><?=$row['kh_thongtin'];?></td>
            	<?php
            }
            ?>

			<td><a href="quantri.php?page_layout=inkh&id_kh=<?php echo $row['kh_id'];?>"><span>IN</span></a></td>
            <td><a href="quantri.php?page_layout=suakh&id_kh=<?php echo $row['kh_id'];?>"><span>Sửa</span></a></td>

            
        </tr>
        <?php
		}
		?>
       
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>
</form>