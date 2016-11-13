<?php
ob_start();
session_start();
require_once('../cauhinh/ketnoi.php');
if($_COOKIE['id']>0){
	$thanhvien_query = "SELECT * FROM thanhvien WHERE id_thanhvien=".$_COOKIE['id'];
	$thanhvien_data = mysql_query($thanhvien_query);
	$thanhvien_info = mysql_fetch_assoc($thanhvien_data);

	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trang chủ quản trị</title>
	<link rel="stylesheet" type="text/css" href="css/quantri.css" />
	<link rel="stylesheet" type="text/css" href="css/quantri_mobile.css" />
	<?php
		if(isset($_GET['page_layout'])){
			switch($_GET['page_layout']){
			
				case 'danhsachdm': echo '<link rel="stylesheet" type="text/css" href="css/danhsachdm.css" />';
				break;
				
				case 'themdm': echo '<link rel="stylesheet" type="text/css" href="css/themdm.css" />';
				break;
				
				case 'suadm': echo '<link rel="stylesheet" type="text/css" href="css/suadm.css" />';
				break;
				
				case 'danhsachsp': echo '<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />';
				break;
				
				case 'themsp': echo '<link rel="stylesheet" type="text/css" href="css/themsp.css" />';
				break;
				
				case 'suasp': echo '<link rel="stylesheet" type="text/css" href="css/suasp.css" />';
				break;
			}
		}
		if (!isset($_GET['page_layout'])) $_GET['page_layout'] ='quantri';
	?>
	<script type="text/javascript" src="/js/jquery.1.1.js" /></script>
	<?
		if($_SERVER['SERVER_NAME']=='localhost'){

			?>
<script type="text/javascript" src="/dsv/js/jquery.1.1.js" /></script>

			<?
		}
	?>
	</head>
	<body>
	<div id="wrapper">
		<div id="header">
	    	<div id="navbar">
	        	<ul>
	            	<li <?php if(!isset($_GET['page_layout'])) echo 'class="selected"';?>id="admin-home"><a href="quantri.php">Trang chủ quản trị</a></li>
	                <?php //neu thanh vien co quyen truy cap = 2(admin)
	                	if($thanhvien_info['quyen_truy_cap']==2){
	                ?>
						<li <?php 
							if($_GET['page_layout']=='thanhvien') echo 'class="selected"'; //lấy dữ liệu từ page_layout, nếu là thanhvien trong csdl, lấy ra class selected
						?>
						><a href="quantri.php?page_layout=thanhvien">Thành viên</a></li> 
	                <?php //hiển thị trang thành viên
	                	}
	                	
	                ?>
	                
	                <li <?php if($_GET['page_layout']=='danhsachdm') echo 'class="selected"';?>><a href="quantri.php?page_layout=danhsachdm">Danh mục sản phẩm</a></li>
	                <li <?php if($_GET['page_layout']=='danhsachsp') echo 'class="selected"';?>><a href="quantri.php?page_layout=danhsachsp">Sản phẩm</a></li>
	                <li <?php if($_GET['page_layout']=='khachhang') echo 'class="selected"';?>><a href="quantri.php?page_layout=khachhang">Khách hàng</a></li>
	                <li><a target="_blank" href="/">xem website</a></li>
	            </ul>
	            <div id="user-info">
	            	<p>Xin chào <span><?php if(isset($_COOKIE['tk'])){echo $_COOKIE['tk'];}?></span> đã đăng nhập vào hệ thống</p>
	                <p><a href="dangxuat.php">Đăng xuất</a></p>
	            </div>
	        </div>
	        <div id="banner">
	        	<!--<div id="logo"><a href="quantri.php"><img src="anh/logo.png" /></a></div>-->
	        </div>
	    </div>
	    <div id="body">
	        
	        <?php
	        // Mater Page
			if(isset($_GET['page_layout'])){
				if(in_array($_GET['page_layout'],array("danhsachdm","themdm","suadm",
					"danhsachsp","themsp","suasp",
					"khachhang","themkh","inkh","excel","suakh",
					"thanhvien","themthanhvien","suathanhvien"))){
					include_once($_GET['page_layout'].".php");	
				}
				
				
			}
			else{
				include_once('gioithieu.php');
			}
			?>
	        
	    </div>
	    <div id="footer">
	    	<div id="footer-info">
	        	
	            <p>Slogan or Name</p>
	        </div>
	    </div>
	</div>
	</body>
	</html>
<?php
}else{
	die("cookie=0");
	header('location:index.php');	
}
?>