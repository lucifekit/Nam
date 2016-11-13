<?php
if(isset($_GET['id_dm'])){
	$id_dm = $_GET['id_dm'];
}
if(isset($_GET['stt'])){
	$stt = $_GET['stt'];
}

$sql = "SELECT * FROM dmsanpham WHERE id_dm = $id_dm";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

if(isset($_POST['submit'])){
	
	if($_POST['ten_dm'] == ''){
		
		$error_ten_dm = '<span style="color:red;">(*)</span>';
	}
	else{
		$ten_dm = $_POST['ten_dm'];	
	}
	if($_POST['stt'] == ''){
		
		$error_stt = '<span style="color:red;">(*)</span>';
	}
	else{
		$stt = $_POST['stt'];	
	}
	if(isset($ten_dm)&&isset($stt)){
		
		$sql = "UPDATE dmsanpham SET ten_dm = '$ten_dm',stt='$stt' WHERE id_dm = $id_dm";
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=danhsachdm');
	}
	
}


?>
<h2>thêm mới danh mục</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-cat" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên danh mục</label><br /><input type="text" name="ten_dm" value="<?php if(isset($_POST['ten_dm'])){echo $_POST['ten_dm'];}else{echo $row['ten_dm'];}?>" /> <?php if(isset($error_ten_dm)){echo $error_ten_dm;}?></td>
        </tr>
        <tr>
            <td><label>STT</label><br /><input type="text" name="stt" value="<?php if(isset($_POST['stt'])){echo $_POST['stt'];}else{echo $row['stt'];}?>" /> <?php if(isset($error_stt)){echo $error_stt;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Sửa danh mục" /></td>
        </tr>
    </table>
    </form>
</div>