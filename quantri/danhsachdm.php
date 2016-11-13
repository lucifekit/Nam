<script>
function xoaDm(){

	var conf = confirm('Bạn có chắc chắn muốn Xóa Danh mục này không?');
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

$rowsPerPage = 50;
$perRow = $page*$rowsPerPage - $rowsPerPage;

$sql = "SELECT * FROM dmsanpham LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);

$totalRows = mysql_num_rows(mysql_query("SELECT * FROM dmsanpham"));
$totalPages = ceil($totalRows/$rowsPerPage);

$listPages = '';
for($i=1; $i<=$totalPages; $i++){
	if($i==$page){
		$listPages .= '<span>'.$i.'</span> ';
	}
	else{
		$listPages .= '<a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a> ';
	}
}

?>
<h2>quản lý danh mục</h2>
<div id="main">
    <p id="add-cat"><a href="quantri.php?page_layout=themdm"><span>thêm danh mục mới</span></a></p>
    <table id="cats" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="cat-bar">
            <td width="5%">ID</td>
            <td width="85%">Tên danh mục</td>  
            <td width="5%">STT</td>          
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
            
        </tr>
       <?php
       while($row = mysql_fetch_array($query)){
	   ?>
        <tr class="cat-item">
            <td><span><?php echo $row['id_dm'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm'];?>"><?php echo $row['ten_dm'];?></a></td>
            <td class="l5"><a <?php echo $row['stt'];?>"><?php echo $row['stt'];?></a></td>
            <td><a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm'];?>"><span>Sửa</span></a></td>
            <td><a onClick="return xoaDm();" href="xoadm.php?id_dm=<?php echo $row['id_dm'];?>"><span>Xóa</span></a></td>
        </tr>
        <?php
	   }
		?>      
    </table>
    <p id="pagination"><?php echo $listPages;?></p>
</div>