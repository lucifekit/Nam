<?php
$quanly = isset($_COOKIE['id'])?$_COOKIE['id']:0;
if(!$quanly>0){
	die("Invalid user");
}
if(isset($_POST['submit'])){
	$error = false;
	$ten_kh = $_POST['ten_kh'];	
	
	if($_POST['ten_kh'] == ''){
		$error_ten_kh = '<span style="color:red;">(*)</span>';
	}

	$thongtin = $_POST['thongtin'];
	if($thongtin== ''){
		$error_thongtin = '<span style="color:red;">(*)</span>';
	}
	//kiem tra quan ly
	//bo qua	

	//
	if(!$error){
		$sql = "INSERT INTO khachhang(kh_name,kh_quanly,kh_thongtin) VALUES('".addslashes($ten_kh)."',".$quanly.",'".$thongtin."')";
		$query = mysql_query($sql);
		$id_khachhang = mysql_insert_id();


		foreach($_POST['nhom'] as $key=>$value){
			$nhom_data = mysql_query("SELECT * FROM sanpham WHERE id_dm=".$key);
			while($sanpham=mysql_fetch_array($nhom_data)){
				$sql = "INSERT INTO khachhang_gia
				(kg_khachhang,kg_sanpham,kg_gia) VALUES('".addslashes($id_khachhang)."',".$sanpham['id_sp'].",'".$value."')";
				$query = mysql_query($sql);
			}
			
		}
		header('location:quantri.php?page_layout=khachhang');
	}
}
?>
<h2>Thêm mới khách hàng - <?=$quanly?></h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-cat" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên khách hàng</label><br /><input type="text" name="ten_kh" /> <?php if(isset($error_ten_kh)){echo $error_ten_kh;}?></td>
        </tr>
        <tr>
            <td><label>Thông tin</label><br /><input type="text" name="thongtin" /> <?php if(isset($error_thongtin)){echo $error_thongtin;}?></td>
        </tr>
        <tr>
            <td><label>Áp giá</label><br />
            	<ul>
        			<?php

        			$q_nhom = mysql_query("SELECT * FROM dmsanpham");
        			while($row=mysql_fetch_array($q_nhom)){
echo '<li style="float:left;width:100%;height:30px;"><span style="display:block;float:left;width:200px">'.strtoupper($row['ten_dm']).'</span>
	<select style="float:left;width:200px;" name="nhom['.$row['id_dm'].']">';
		echo '<option value="1">Giá bán lẻ</option>
		<option value="2">Giá T2</option>
		<option value="3">Giá T1</option>
		<option value="4">Giá Net</option>
		<option value="5">Giá Net Net</option>';

echo '</select></li>';

        			}
        			?>
            	</ul>

            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>