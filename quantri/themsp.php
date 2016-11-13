<?php
$sqlDm = "SELECT * FROM dmsanpham";
$queryDm = mysql_query($sqlDm);

if(isset($_POST['submit'])){

	if($_POST['ten_sp'] == ''){
		$error_ten_sp = '<span style="color:red;">(*)</span>';
	}
	else{
		$ten_sp = $_POST['ten_sp'];
	}
	//
	if($_POST['gia_sp'] == ''){
		$error_gia_sp = '<span style="color:red;">(*)</span>';
	}
	else{
		$gia_sp = $_POST['gia_sp'];
	}

	if($_POST['gia_sp_2'] == ''){
		$error_gia_sp_2 = '<span style="color:red;">(*)</span>';
	}
	else{
		$gia_sp_2 = $_POST['gia_sp_2'];
	}

	if($_POST['gia_sp_3'] == ''){
		$error_gia_sp_3 = '<span style="color:red;">(*)</span>';
	}
	else{
		$gia_sp_3 = $_POST['gia_sp_3'];
	}

	if($_POST['gia_sp_4'] == ''){
		$error_gia_sp_4 = '<span style="color:red;">(*)</span>';
	}
	else{
		$gia_sp_4 = $_POST['gia_sp_4'];
	}

	if($_POST['gia_sp_5'] == ''){
		$error_gia_sp_5 = '<span style="color:red;">(*)</span>';
	}
	else{
		$gia_sp_5 = $_POST['gia_sp_5'];
	}
	//
	
	if($_POST['khuyen_mai'] == ''){
		//$error_khuyen_mai = '<span style="color:red;">(*)</span>';
		$khuyen_mai = "";
	}else{
		$khuyen_mai = $_POST['khuyen_mai'];
	}

	if($_POST['color'] == ''){
		//$error_khuyen_mai = '<span style="color:red;">(*)</span>';
		$color = "";
	}else{
		$color = $_POST['color'];
	}
   if($_POST['link'] == ''){
		//$error_khuyen_mai = '<span style="color:red;">(*)</span>';
		$link = "";
	}else{
		$link = $_POST['link'];
	}
	//
	if($_POST['trang_thai'] == ''){
		$error_trang_thai = '<span style="color:red;">(*)</span>';
	}
	else{
		$trang_thai = $_POST['trang_thai'];
	}
	if(isset($_POST['tinh_trang'])){
		$tinh_trang=1;//new
	}
	else{
		$tinh_trang=0;//new
	}
	//
	if($_POST['chi_tiet_sp'] == ''){
		$error_chi_tiet_sp = '<span style="color:red;">(*)</span>';
	}
	else{
		$chi_tiet_sp = $_POST['chi_tiet_sp'];
	}
	//
	
	if($_FILES['anh_sp']['name'] == ''){
		$anh_sp="";
	}
	else{
		$anh_sp = $_FILES['anh_sp']['name'];
		$tmp_name = $_FILES['anh_sp']['tmp_name'];	
	}
	//
	if($_POST['id_dm'] == 'unselect'){
		$error_id_dm = '<span style="color:red;">(*)</span>';
	}
	else{
		$id_dm = $_POST['id_dm'];
	}
	//


	if(isset($id_dm) 
      && isset($ten_sp) 
      && isset($gia_sp) 
      && isset($gia_sp_2) 
      && isset($gia_sp_3) 
      && isset($gia_sp_4) 
      && isset($gia_sp_5) 
      &&  isset($khuyen_mai) 
      &&  isset($color)
      &&  isset($link)  
      && isset($trang_thai) && isset($chi_tiet_sp)){
		
		if(isset($anh_sp)){
			$uploaded_file = move_uploaded_file($tmp_name, 'anh/'.$anh_sp);	
		}
		
		$sql = "INSERT INTO sanpham(id_dm, ten_sp, anh_sp,
       gia_sp, gia_sp_2, gia_sp_3, gia_sp_4, gia_sp_5, 
       khuyen_mai,color,link,is_new, trang_thai, chi_tiet_sp) 
				VALUES ('$id_dm', '$ten_sp', '$anh_sp',
             '$gia_sp', '$gia_sp_2', '$gia_sp_3', '$gia_sp_4', '$gia_sp_5', 
             '$khuyen_mai','$color','$link','$tinh_trang', '$trang_thai', '$chi_tiet_sp')";
	    
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=danhsachsp');
	}else{
		//var_dump($id_dm,$ten_sp,$gia_sp, $gia_sp_2, $gia_sp_3, $gia_sp_4, $gia_sp_5, $tinh_trang, $khuyen_mai, $trang_thai, $chi_tiet_sp);
		die("set thieu truong du lieu");
	}
}else{
	echo "not have post";
}
?>
<h2>thêm mới sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" required /> <?php if(isset($error_ten_sp)){echo $error_ten_sp;}?></td>
        </tr>
        <tr>
            <td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /> <?php if(isset($error_anh_sp)){echo $error_anh_sp;}?></td>
        </tr>
        <tr>
            <td><label>Nhà cung cấp</label><br />
                <select name="id_dm" required>
                    <option value="unselect" selected="selected">Lựa chọn nhà cung cấp</option>
                    <?php
                    while($rowDm = mysql_fetch_array($queryDm)){
					?>
                    <option value=<?php echo $rowDm['id_dm'];?>><?php echo $rowDm['ten_dm'];?></option>
					<?php
					}
					?>
                </select> <?php if(isset($error_id_dm)){echo $error_id_dm;}?>	
            </td>
        </tr>

        <tr>
            <td><label>Giá Net Net</label><br /><input type="text" name="gia_sp_5" required /> VNĐ <?php if(isset($error_gia_sp_5)){echo $error_gia_sp_5;}?></td>
        </tr>

         <tr>
            <td><label>Giá Net</label><br /><input type="text" name="gia_sp_4" required /> VNĐ <?php if(isset($error_gia_sp_4)){echo $error_gia_sp_4;}?></td>
        </tr>

        <tr>
            <td><label>Giá T1</label><br /><input type="text" name="gia_sp_3" required /> VNĐ <?php if(isset($error_gia_sp_3)){echo $error_gia_sp_3;}?></td>
        </tr>

        <tr>
            <td><label>Giá T2</label><br /><input type="text" name="gia_sp_2" required /> VNĐ <?php if(isset($error_gia_sp_2)){echo $error_gia_sp_2;}?></td>
        </tr>

        <tr>
            <td><label>Giá bán lẻ</label><br /><input type="text" name="gia_sp" required /> VNĐ <?php if(isset($error_gia_sp)){echo $error_gia_sp;}?></td>
        </tr>  

                
        <tr>
            <td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="" /> <?php if(isset($error_khuyen_mai)){echo $error_khuyen_mai;}?></td>
        </tr>
        <tr>
            <td><label>Color</label><br /><input type="text" name="color" value="" /></td>
        </tr>
        <tr>
            <td><label>Tình trạng</label><br />
            	<label><input type="radio" name="trang_thai" checked value="1" /> Còn hàng</label>
            	<label><input type="radio" name="trang_thai" value="2" /> Tạm hết </label>
            	<label><input type="radio" name="trang_thai" value="0" /> Hết hàng</label>

            </td>
        </tr>
        <tr>
            <td><label>Hàng mới</label><br />
            	<label><input type="checkbox" name="tinh_trang" value="0" /> New</label>
            	

            </td>
        </tr>
        <tr>
            <td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp" required></textarea> <?php if(isset($error_chi_tiet_sp)){echo $error_chi_tiet_sp;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>