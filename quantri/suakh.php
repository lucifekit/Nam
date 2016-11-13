<?php

$quanly = isset($_COOKIE['id'])?$_COOKIE['id']:0;
if(!$quanly>0){
	die("Invalid user");
}
$id_kh = $_GET['id_kh'];
$sql = "SELECT * FROM khachhang WHERE kh_id = $id_kh";
$query = mysql_query($sql); //lấy dữ liệu kh
$row_khachhang = mysql_fetch_array($query);
//$sql = "SELECT * FROM khachhang_gia WHERE kg_khachhang = $id_kh";
//$query = mysql_query($sql); //lấy dữ liệu kh
//$row_kg = mysql_fetch_assoc($query);
//$row_kg = array();
//while($temp_row_kg = mysql_fetch_assoc($query)){
//	$row_kg[$temp_row_kg['kg_sanpham']] = $temp_row_kg['kg_gia'];
//}

//echo '<pre>';
//var_dump($row_kg);
//echo '</pre>';
//die();
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
		$sql = "UPDATE khachhang SET kh_name='".addslashes($ten_kh)."',
		kh_thongtin='".$thongtin."' WHERE kh_id=$id_kh";
		$query = mysql_query($sql);
		


		foreach($_POST['nhom'] as $key=>$value){
			$nhom_data = mysql_query("SELECT * FROM sanpham WHERE id_dm=".$key);
			while($sanpham=mysql_fetch_array($nhom_data)){
				$sql = "UPDATE khachhang_gia
					SET kg_gia='".$value."'
					WHERE = kg_khachhang='".addslashes($id_khachhang)."' 
					AND kg_sanpham='".$sanpham['id_sp']."'";
				$query = mysql_query($sql);
			}
			
		}
		header('location:quantri.php?page_layout=khachhang');
	}
}
?>
<h2>Sửa khách hàng - <?=$quanly?></h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-cat" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên khách hàng</label><br /><input type="text" name="ten_kh" value="<?php echo $row_khachhang['kh_name'];?>"/></td>
        </tr>
        <tr>
            <td><label>Thông tin</label><br /><input type="text" name="thongtin" value="<?php echo $row_khachhang['kh_thongtin'];?>"/></td>
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
            <td><input type="submit" name="submit" value="Sửa" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>