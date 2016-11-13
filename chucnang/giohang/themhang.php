<?php
//thêm sản phẩm vào giỏ hàng 
//Nếu sản phẩm A có trong giỏ hàng rồi thì tăng số lượng sp A lên 1 dv
//Nếu chưa có sp A thì thêm sp A vào giỏ hàng 
//Chuyển về trang giỏ hàng 
session_start();
if(isset($_GET['id_sp'])) $id_sp=$_GET['id_sp'];else $id_sp=0;
/*
	mảng giỏ hàng 
	$_SESSION['giohang']['id_sp']=so_luong_sp;
	$_SESSION['giohang'][30]=1;
	$_SESSION['giohang'][31]=3;
*/
if(isset($_SESSION['giohang'][$id_sp]))
{
	$_SESSION['giohang'][$id_sp]++;
}
else $_SESSION['giohang'][$id_sp]=1;

header('location:../../giohang.html');




