<?php
$id_sp = $_GET['id_sp'];

$sqlDm = "SELECT * FROM dmsanpham";
$queryDm = mysql_query($sqlDm);

$sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

if(isset($_POST['submit'])){
	//echo "Updating...";
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
	//ko co cai nay, co the xoa
	//if($_POST['tinh_trang'] == ''){
		//$error_tinh_trang = '<span style="color:red;">(*)</span>';
	//}
	//else{
		//$tinh_trang = $_POST['tinh_trang'];
	//}
	
	if($_POST['khuyen_mai'] == ''){
		$khuyen_mai = "";
	}else{
		$khuyen_mai = $_POST['khuyen_mai'];
	}
	if($_POST['color'] == ''){
		$color = "";
	}else{
		$color = $_POST['color'];
	}
   
   if($_POST['link'] == ''){
		$link = "";
	}else{
		$link = $_POST['link'];
	}
	//else{
		//$khuyen_mai = $_POST['khuyen_mai'];
	//}
	//chac la thieu cai thang lon nay nay=))
	if($_POST['trang_thai'] == ''){
		$error_trang_thai = '<span style="color:red;">(*)</span>';
	}
	else{
		$trang_thai = $_POST['trang_thai'];
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
		$anh_sp = $_POST['anh_sp'];
	}
	else{
		$anh_sp = $_FILES['anh_sp']['name'];
		$tmp_name = $_FILES['anh_sp']['tmp_name'];
	}
	//
	$id_dm = $_POST['id_dm'];
	//
	if(isset($_POST['is_new'])){
		$is_new=1;//new
	}
	else{
		$is_new=0;//new
	}
	if(	isset($ten_sp) 
		&& isset($gia_sp) 
		&& isset($khuyen_mai) 
		&& isset($trang_thai) 
		&& isset($chi_tiet_sp)
      && isset($link)
		&& isset($color)){
		if(isset($anh_sp)){
			$upload_file = move_uploaded_file($tmp_name, 'anh/'.$anh_sp);	
		}
		
		
		$sql = "UPDATE sanpham SET id_dm = $id_dm, 
			ten_sp = '$ten_sp', 
			anh_sp = '$anh_sp', 
			gia_sp = $gia_sp, 
			gia_sp_2 = $gia_sp_2,
			gia_sp_3 = $gia_sp_3,
			gia_sp_4 = $gia_sp_4,
			gia_sp_5 = $gia_sp_5,
			khuyen_mai = '$khuyen_mai', 
			is_new     = '$is_new',
			trang_thai = '$trang_thai',  
			chi_tiet_sp = '$chi_tiet_sp',
			color = '$color',
         link = '$link' WHERE id_sp = $id_sp";	
			//echo "<br/>Enough parameter, Updating...";
		$query = mysql_query($sql);
		date_default_timezone_set("ASIA/HO_CHI_MINH");
		file_put_contents("lastedit.txt", date("d/m/Y",time()));
		header('location:quantri.php?page_layout=danhsachsp');
	}else{
		//echo "<br/>Not Enough parameter, Do nothing...";
		//var_dump("name",$ten_sp,
			//"anh",$anh_sp,
			//"gia",$gia_sp,$gia_sp_2,$gia_sp_3,$gia_sp_4,$gia_sp_5,
			//"khuyenmai",$khuyen_mai,
			//"trangthai",$trang_thai,
			//"chitite",$chi_tiet_sp,$anh_sp);
	}
}

?>
<h2>Sửa thông tin sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" required value="<?php if(isset($_POST['ten_sp'])){echo $_POST['ten_sp'];}else{echo $row['ten_sp'];}?>" /> <?php if(isset($error_ten_sp)){echo $error_ten_sp;}?></td>
        </tr>
        <tr>
            <td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /> <input type="hidden" name="anh_sp" value="<?php echo $row['anh_sp'];?>" /></td>
        </tr>
        <tr>
            <td><label>Nhà cung cấp</label><br />
                <select name="id_dm">
                    <?php
                    while($rowDm = mysql_fetch_array($queryDm)){
					?>
                    <option <?php if($row['id_dm'] == $rowDm['id_dm']){echo 'selected="selected"';}?> value=<?php echo $rowDm['id_dm'];?>><?php echo $rowDm['ten_dm'];?></option>
                    <?php
					}
					?>
                </select>	
            </td>
        </tr>

        <tr>
            <td><label>Giá Net Net</label><br /><input type="text" name="gia_sp_5" required value="<?php if(isset($_POST['gia_sp_5'])){echo $_POST['gia_sp_5'];}else{echo $row['gia_sp_5'];}?>" /> VNĐ <?php if(isset($error_gia_sp_5)){echo $error_gia_sp;}?></td>
        </tr>

        <tr>
            <td><label>Giá Net</label><br /><input type="text" name="gia_sp_4" required value="<?php if(isset($_POST['gia_sp_4'])){echo $_POST['gia_sp_4'];}else{echo $row['gia_sp_4'];}?>" /> VNĐ <?php if(isset($error_gia_sp_4)){echo $error_gia_sp;}?></td>
        </tr>

        <tr>
            <td><label>Giá T1</label><br /><input type="text" name="gia_sp_3" required value="<?php if(isset($_POST['gia_sp_3'])){echo $_POST['gia_sp_3'];}else{echo $row['gia_sp_3'];}?>" /> VNĐ <?php if(isset($error_gia_sp_3)){echo $error_gia_sp_3;}?></td>
        </tr>

        <tr>
            <td><label>Giá T2</label><br /><input type="text" name="gia_sp_2" required value="<?php if(isset($_POST['gia_sp_2'])){echo $_POST['gia_sp_2'];}else{echo $row['gia_sp_2'];}?>" /> VNĐ <?php if(isset($error_gia_sp_2)){echo $error_gia_sp_2;}?></td>
        </tr>

        <tr>
            <td><label>Giá bán lẻ</label><br /><input type="text" name="gia_sp" required value="<?php if(isset($_POST['gia_sp'])){echo $_POST['gia_sp'];}else{echo $row['gia_sp'];}?>" /> VNĐ <?php if(isset($error_gia_sp)){echo $error_gia_sp;}?></td>
        </tr>
        
  
        <tr>
            <td><label>Tình trạng</label><br />
            	<label><input type="radio" name="trang_thai" required checked <?php if($row['tinh_trang']==1) echo 'checked';?> value="1" /> Còn hàng</label>
            	<label><input type="radio" name="trang_thai" required value="2" /> Tạm hết </label>
            	<label><input type="radio" name="trang_thai" required value="0" /> Hết hàng</label>

            </td>
        </tr>
        <tr>
            <td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="<?php if(isset($_POST['khuyen_mai'])){echo $_POST['khuyen_mai'];}else{echo $row['khuyen_mai'];}?>" /> <?php if(isset($error_khuyen_mai)){echo $error_khuyen_mai;}?></td>
        </tr>

        <tr>
            <td><label>Color</label><br /><input type="text" name="color" value="<?php if(isset($_POST['color'])){echo $_POST['color'];}else{echo $row['color'];}?>" /> </td>
        </tr>
        <tr>
            <td><label>Info Link</label><br /><input type="text" name="link" value="<?php if(isset($_POST['link'])){echo $_POST['link'];}else{echo $row['link'];}?>" /> </td>
        </tr>
        <tr>
            <td><label>New</label><br />
				<label><input type="checkbox" name="is_new" value="1" <?php if($row['is_new']==1) echo 'checked';?> /> New</label>
            </td>
        </tr>
      
        <tr>
            <td><label>Thông tin chi tiết sản phẩm</label> <br />
            <html></html>
            <?php
            // Tích hợp FCKEditor
			include("fckeditor/fckeditor.php") ;
			$sBasePath = $_SERVER['PHP_SELF'] ;
			$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "quantri.php" ) ) ;
			$sBasePath = $sBasePath."fckeditor/";
			$oFCKeditor = new FCKeditor('chi_tiet_sp') ;
			$oFCKeditor->BasePath = $sBasePath ;
			if(isset($_POST["chi_tiet_sp"])){
				$oFCKeditor->Value = $_POST["chi_tiet_sp"];
			}
			else{
				$oFCKeditor->Value = $row["chi_tiet_sp"];
			}
			$oFCKeditor->Create() ;
			//
			?>
            
             <?php if(isset($error_chi_tiet_sp)){echo $error_chi_tiet_sp;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập nhật" /> </td>
        </tr>
    </table>
    </form>
</div>