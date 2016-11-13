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
$idKhachHang = isset($_GET['id_kh'])?$_GET['id_kh']:0;
$sql = "SELECT * FROM khachhang 
JOIN khachhang_gia 
ON khachhang.kh_id=khachhang_gia.kg_khachhang
JOIN sanpham ON khachhang_gia.kg_sanpham=sanpham.id_sp
WHERE khachhang_gia.kg_khachhang=".$idKhachHang."
";
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
<h2>Báo giá</h2>
<form method="post" action="">
<p><?php echo isset($thongbao)?$thongbao:''; ?></p>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=excel&id_kh=<?php echo $_GET['id_kh'];?>"><span>Xuất excel</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="10%">ID</td>
            
            <td width="70%">Tên sản phẩm</td>
            <!--<td width="35%">Quản lý</td>-->
            <!--<td width="10%">Nhóm</td>-->
			<td width="20%">Giá</td>
            
        </tr>
        
        <?php
        while($row = mysql_fetch_array($query)){
		?>
        <tr>
            <td><span><?php echo $row['id_sp'];?></span></td>
           
            <td class="l5"><?php echo $row['ten_sp'];?></a></td>
            
            <!--<td class="l5"><?php echo $row['kg_gia'];?></a></td>-->
			<td><?php 
            if($row['kg_gia']==1){echo $row['gia_sp'];}
            if($row['kg_gia']==2){echo $row['gia_sp_2'];}
            if($row['kg_gia']==3){echo $row['gia_sp_3'];}
            if($row['kg_gia']==4){echo $row['gia_sp_4'];}
            if($row['kg_gia']==5){echo $row['gia_sp_5'];}

            ?></td>
            

            
        </tr>
        <?php
		}
		?>
        <tr>
            <td colspan="8">
                <select name="hanhdong">
                    <option value="">-------Chọn hành động------</option>
                    <option value="xoa">Xóa bản ghi</option>
                </select>
                <input onclick="return confirm('Bạn có chắc')" type="submit" value="Thực hiện" name="submit"> 
            </td>

        </tr>
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>
</form>