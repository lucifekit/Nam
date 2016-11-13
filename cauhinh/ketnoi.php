<?php 
	define("HOST","localhost");
	define('USER', 'root');
	define("PASS","");
	define('DBNAME', 'nhdieeub_dsv');

	mysql_connect(HOST,USER,PASS) or die("Connect server error !");//Kết nối tới server
	mysql_select_db(DBNAME) or die("Select database error !");//Chọn CSDL để làm việc
	mysql_query("SET NAMES 'utf8'");// ngôn ngữ utf8
	$isAdmin=false;
	if(isset($_COOKIE['id'])){
		$thanhvien_query = "SELECT * FROM thanhvien WHERE id_thanhvien=".$_COOKIE['id'];
	    $thanhvien_data = mysql_query($thanhvien_query);
	    $thanhvien_info = mysql_fetch_assoc($thanhvien_data);
	$isAdmin =false;
	    if($thanhvien_info['quyen_truy_cap']==2){
	        $isAdmin = true;
	    }	
	}
?>