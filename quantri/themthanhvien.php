<?php
if(isset($_POST['submit'])){
	
	if($_POST['tai_khoan'] == ''){
		
		$error_tai_khoan = '<span style="color:red;">(*)</span>';
	}
	else{
		$tai_khoan = $_POST['tai_khoan'];	
	}
	if($_POST['mat_khau'] == ''){
		
		$error_mat_khau = '<span style="color:red;">(*)</span>';
	}
	else{
		$mat_khau = $_POST['mat_khau'];	
	}
	if($tai_khoan){
		$sql = "INSERT INTO thanhvien(tai_khoan,mat_khau,quyen_truy_cap) VALUES('$tai_khoan','$mat_khau',1)";
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=thanhvien');
	}
}
?>
<h2>Thêm thành viên</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-cat" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tài khoản</label><br /><input type="text" name="tai_khoan" /> <?php if(isset($error_tai_khoan)){echo $error_tai_khoan;}?></td>
        </tr>
        <tr>
            <td><label>Mật khẩu</label><br /><input type="password" name="mat_khau" /> <?php if(isset($error_mat_khau)){echo $error_mat_khau;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>