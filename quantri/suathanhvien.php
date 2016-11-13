<?php
$id_thanhvien = $_GET['id_thanhvien'];

$sql = "SELECT * FROM thanhvien WHERE id_thanhvien = $id_thanhvien";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
if(isset($row)){
	$quyen_truy_cap = $row['quyen_truy_cap'];
	$disable = $row['disable'];
}else{
	die("Invalid staff");
}

if(isset($_POST['submit'])){
	
	if($_POST['tai_khoan'] == ''){
		$error_tai_khoan = '<span style="color:red;">(*)</span>';
	}
	else{
		$tai_khoan = $_POST['tai_khoan'];
	}
	//
	if($_POST['mat_khau'] == ''){
		$error_mat_khau = '<span style="color:red;">(*)</span>';
	}
	else{
		$mat_khau = $_POST['mat_khau'];
	}
	//
	if(!isset($_POST['quyen_truy_cap'])||$_POST['quyen_truy_cap'] == ''){
		
		$error_quyen_truy_cap = '<span style="color:red;">(*)</span>';
	}
	else{

		$quyen_truy_cap = $_POST['quyen_truy_cap'];
	}

	if(isset($_POST['disable'])){
		$disable = 1;
	}else{
		$disable = 0;
	}
	//
	$id_thanhvien = $_GET['id_thanhvien'];
	//
	
	
	if(isset($tai_khoan) && isset($mat_khau) && isset($quyen_truy_cap) && isset($disable)){
		
		
		
		$sql = "UPDATE thanhvien SET tai_khoan = '$tai_khoan', mat_khau = '$mat_khau',quyen_truy_cap = '$quyen_truy_cap', disable = '$disable'
		WHERE id_thanhvien = $id_thanhvien";	
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=thanhvien');
	}
}

?>
<h2>Sửa thông tin thành viên</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tài khoản</label><br /><input type="text" name="tai_khoan" value="<?php if(isset($_POST['tai_khoan'])){echo $_POST['tai_khoan'];}else{echo $row['tai_khoan'];}?>" /> <?php if(isset($error_tai_khoan)){echo $error_tai_khoan;}?></td>
        </tr>
        
        <tr>
            <td><label>Mật khẩu</label><br /><input type="text" name="mat_khau" value="<?php if(isset($_POST['mat_khau'])){echo $_POST['mat_khau'];}else{echo $row['mat_khau'];}?>" />

            	<?php if(isset($error_mat_khau)){echo $error_mat_khau;}?></td>
        </tr>
        
        <tr>
            <td><label>Nhóm</label><br/>
        	<?php 

			echo '
			<select name="quyen_truy_cap">
            	<option '.($quyen_truy_cap==0?'selected':'').' value="0">Kế toán</option>
            	<option '.($quyen_truy_cap==1?'selected':'').' value="1">Sale</option>
            	<option '.($quyen_truy_cap==2?'selected':'').' value="2">Admin</option>
            </select>';
            	if(isset($error_quyen_truy_cap)) echo $error_quyen_truy_cap;
        	?></td>
        </tr>
        <tr>
            <td><label>Nghỉ 
<?php 
		
			echo '<input type="checkbox" name="disable" '.($disable==1?'checked':'').'/>';
            ?>
        </label><br />
            
            <?php if(isset($error_disable)){echo $error_disable;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>