<?php
//admin dc xóa, các tk khác ko đc xóa
session_start();
require_once('../cauhinh/ketnoi.php');
if($_COOKIE['id']>0){

	$thanhvien_query = "SELECT * FROM thanhvien WHERE id_thanhvien=".$_COOKIE['id'];
	$thanhvien_data = mysql_query($thanhvien_query);
	$thanhvien_info = mysql_fetch_assoc($thanhvien_data);

	if($thanhvien_info['quyen_truy_cap']==2){
	//quyền truy cập =2 là admin
	//nếu là admin thì được xóa sp

		$id_sp = $_GET['id_sp']; //lấy id sp từ url
		$sql = "DELETE FROM sanpham WHERE id_sp = $id_sp";


		$query = mysql_query($sql);
		//ob_clean();
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
