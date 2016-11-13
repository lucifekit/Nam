
<script language="javascript">
    
</script>
<script>
function xoaSanPham(){
	
	var conf = confirm("Bạn có chắc chắn muốn xóa Sản phẩm này không?");
	return conf;	
}
function Search(){
    var kw = $('#search_keyword').val();
    var nhacungcap = $('#nhacungcap').val();
    $.get('ajax.php?action=search&keyword='+kw+'&nhacungcap='+nhacungcap,function(data){
        $('#prds tbody').html(data);
        $('#pagination').hide();
    })

}
function NamKeyPress(e){
    if(e.keyCode==13){
        Search();
        return false;    
    }
    
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

$sql = "SELECT * FROM sanpham
				 INNER JOIN dmsanpham
				 ON sanpham.id_dm = dmsanpham.id_dm 
				 ORDER BY id_sp DESC
				 LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);

//
$totalRows = mysql_num_rows(mysql_query("SELECT * FROM sanpham"));
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
            $checkbox=$_POST['checkbox'];
            if(is_array($checkbox))
            {
                $strId=implode(',',$checkbox);
                //thực hiện xóa 
                 mysql_query("DELETE FROM sanpham WHERE id_sp IN($strId)");
                 header('location:quantri.php?page_layout=danhsachsp');
            }else $thongbao="Bạn chưa chọn bản ghi !";   
       }
       else $thongbao="Bạn chưa chọn hành động !"; 
    }
?>
<h2>quản lý sản phẩm</h2>
<form method="post" action="">
<p><?php echo isset($thongbao)?$thongbao:''; ?></p>
<div id="main">
    <?php
    if($isAdmin){
        ?>
<div id="search_wrapper">
<input id="search_keyword" onkeypress="return NamKeyPress(event)"/>


<select id="nhacungcap">
<option value="0">Lựa chọn</option>
<?php
    $sql = "SELECT * FROM dmsanpham";
    $dm_query = mysql_query($sql);

    while($row = mysql_fetch_array($dm_query)) {
        $id = $row["id_dm"];
        $name = $row["ten_dm"];
        /*
            <option value="<?php=$id?>"><?php=$name?></option>
        */
        echo '<option value="'.$id.'">'.$name.'</option>';
    }

?>


</select>

<a href="javascript:void(0)" onclick="Search()"> Search</a>
</div>
<p id="add-prd"><a href="quantri.php?page_layout=themsp"><span>thêm sản phẩm mới</span></a></p>
        <?php

    }else{
//echo "<a href=\"dcm may luon \">Hihi do cho </a>";
        }?>
    
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <thead>
            <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="5%"><input  id="checkAll" name="checkAll" type="checkbox" ></td>
            <td width="25%">Tên sản phẩm</td>
            <td width="10%">Giá bán lẻ</td>
            <td width="10%">Giá T2</td>
            <td width="10%">Giá T1</td>
            <td width="10%">Giá Net</td>
            <td width="10%">Giá Net net</td>
            <td width="20%">Nhà cung cấp</td>
            <td width="10%">Ảnh mô tả</td>
<?php
            if($isAdmin){
        ?>
<td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        <?php

    }?>
            
        </tr>

        </thead>
        <tbody>
        <?php
        while($row = mysql_fetch_array($query)){
        ?>
        <tr>
            <td><span><?php echo $row['id_sp'];?></span></td>
            <td style="text-align:center" width="5%"><input name="checkbox[]" value="<?php echo $row['id_sp'] ?>" type="checkbox"></td>
            <td class="l5"><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><?php echo $row['ten_sp'];?></a></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp'],0,",",".");?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_2'],0,",",".");?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_3'],0,",",".");?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_4'],0,",",".");?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_5'],0,",",".");?></span></td>
            <td class="l5"><?php echo $row['ten_dm'];?></td>
            <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_sp'];?>" /></span></td>
            <?php
            if($isAdmin){
        ?>
            <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row['id_sp'];?>"><span>Xóa</span></a></td>
        <?php

    }?>

            
        </tr>
        <?php
        }
        ?>
        </tbody>
        
        
        
        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>
</form>