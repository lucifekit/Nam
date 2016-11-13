
<script language="javascript">
    
</script>
<script>
function xoaNhanVien(){
	
	var conf = confirm("Bạn có chắc chắn muốn xóa nhân viên này không?");
	return conf;	
}

</script>

<?php
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

$rowsPerPage = 10;
$perRow = $page*$rowsPerPage - $rowsPerPage;

$sql = "SELECT * FROM thanhvien
				 LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);

//
$totalRows = mysql_num_rows(mysql_query("SELECT * FROM thanhvien"));
$totalPages = ceil($totalRows/$rowsPerPage);

$listPage = '';
for($i=1; $i<=$totalPages; $i++){
	
	if($page == $i){
		$listPage .= '<span>'.$i.'</span> ';
	}
	else{
		$listPage .= '<a href="quantri.php?page_layout=thanhvien&page='.$i.'">'.$i.'</a> ';
	}
}
?>

<?php
    //xóa nhiều sản phẩm 
    if(isset($_POST['submit']))
    {
       if($_POST['hanhdong']=='xoa')
       {
            $checkbox=$_POST['checkbox'];
            if(is_array($checkbox))
            {
                $strId=implode(',',$checkbox);
                //thực hiện xóa 
                 mysql_query("DELETE FROM thanhvien WHERE id_thanhvien IN($strId)");
                 header('location:quantri.php?page_layout=thanhvien');
            }else $thongbao="Bạn chưa chọn bản ghi !";   
       }
       else $thongbao="Bạn chưa chọn hành động !"; 
    }
?>
<h2>Quản lý thành viên</h2>
<form method="post" action="">
<p><?php echo isset($thongbao)?$thongbao:''; ?></p>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themthanhvien"><span>Thêm thành viên</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="5%"><input  id="checkAll" name="checkAll" type="checkbox" ></td>
            <td width="25%">Tên đăng nhập</td>
            <td width="10%">Mật khẩu</td>
            <td width="10%">Quyền truy cập</td>
            <td width="10%">Tình trạng</td>
            <td width="5%">Sửa</td>
        </tr>
        
        <?php
        while($row = mysql_fetch_array($query)){
		?>
        <tr class="nv-<?php echo $row['disable'];?>">
            <td><span><?php echo $row['id_thanhvien'];?></span></td>
            <td style="text-align:center" width="5%"><input name="checkbox[]" value="<?php echo $row['id_thanhvien'] ?>" type="checkbox"></td>
            <td class="l5"><a href="quantri.php?page_layout=suathanhvien&id_thanhvien=<?php echo $row['id_thanhvien'];?>"><?php echo $row['tai_khoan'];?></a></td>
            <td class="l5"><span class="price"><?php echo $row['mat_khau'];?></span></td>
            <td class="l5">
                <span class="price"><?php if($row['quyen_truy_cap']==0) echo 'Kế toán';
                if($row['quyen_truy_cap']==1) echo 'Sale';
                if($row['quyen_truy_cap']==2) echo 'Admin';?>
            </select></td>
            <td class="l5"><span class="price"><?php echo ($row['disable']==1?"Đã Nghỉ":"Đang làm việc");?></span></td>
            <td><a href="quantri.php?page_layout=suathanhvien&id_thanhvien=<?php echo $row['id_thanhvien'];?>"><span>Sửa</span></a></td>
            
        </tr>
        <?php
		}
		?>
    
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>
</form>