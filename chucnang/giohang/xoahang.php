<?php  
session_start();
if(isset($_GET['id_sp'])) $id_sp=$_GET['id_sp'];else $id_sp=0;
//Nếu id_Sp >0 thì xóa sp đó khỏi giỏ hàng 
//Nếu id_Sp<=0 thì xóa hết sp trong giỏ hàng 
if($id_sp>0) unset($_SESSION['giohang'][$id_sp]);
else unset($_SESSION['giohang']);
header('location:../../giohang.html');