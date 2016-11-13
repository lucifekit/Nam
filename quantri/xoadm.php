<?php
ob_start();
session_start();
require_once('../cauhinh/ketnoi.php');
if($_COOKIE['id']>0){

	$thanhvien_query = "SELECT * FROM thanhvien WHERE id_thanhvien=".$_COOKIE['id'];
	$thanhvien_data = mysql_query($thanhvien_query);
	$thanhvien_info = mysql_fetch_assoc($thanhvien_data);

	if($thanhvien_info['quyen_truy_cap']==2){
	//quyền truy cập =2 là admin
	//nếu là admin thì được xóa sp

		$id_dm = $_GET['id_dm'];
		$sql = "DELETE FROM dmsanpham WHERE id_dm = $id_dm";
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=danhsachdm');
?>

<script>
	window.location.href="quantri.php?page_layout=danhsachsp";
</script>

<?php

	}
	else{
		echo "Không có quyền xóa sản phẩm";	
	}



}
?>

