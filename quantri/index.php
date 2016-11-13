<?php
ob_start();
session_start();
require_once('../cauhinh/ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập hệ thống</title>
<link rel="stylesheet" type="text/css" href="css/dangnhap.css" />
</head>
<body>

<?php
if(isset($_POST['submit'])){

	if($_POST['tk'] == ''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';
	}
	else{
		$tk = $_POST['tk'];
	}
	
	if($_POST['mk'] == ''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';
	}
	else{
		$mk = $_POST['mk'];
	}
	if(isset($tk) && isset($mk)){
		
		$sql = "SELECT * FROM thanhvien WHERE tai_khoan = '$tk' AND mat_khau = '$mk'";
		$query = mysql_query($sql);
		$rows = mysql_num_rows($query);
		echo $sql;
		if($rows <= 0){
			$error = 'Tài khoản hoặc Mật khẩu không hợp lệ!';
		}
		else{
			setcookie('tk',$tk);
			
			while($row = mysql_fetch_array($query)){
				setcookie('id',$row['id_thanhvien']);
			}
			header('location:quantri.php');
			header_remove('location:index.php');
		}
		
	}
}
?>

<form method="post">
<div id="form-login">
	<h2><?php if(isset($error)){echo '<span>'.$error.'</span>';}else{echo 'đăng nhập hệ thống quản trị';}?></h2>
    <ul>
        <li><label>tài khoản</label><input type="text" name="tk" /></li>
        <li><label>mật khẩu</label><input type="password" name="mk" /></li>
        <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
        <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
    </ul>
</div>
</form>
</body>
</html>