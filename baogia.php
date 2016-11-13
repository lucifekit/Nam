<?php
$price_field = "gia_sp_3";
if($_SERVER['SERVER_NAME']=='khodidong.com.vn'){
   $price_field = "gia_sp_2";
}
$sql = "SELECT * FROM sanpham
JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm
ORDER BY sanpham.id_dm, ".$price_field."
";
$query = mysql_query($sql);
//$date_apdung = file_get_contents("lastedit.txt");//"01/08/2016";
echo '<table><thead>';
echo '<tr class="a1"><td colspan="5">BÁO GIÁ BÁN BUÔN ĐIỆN THOẠI</td></tr>';

echo '<tr class="a2"><td colspan="5">Toàn bộ sản phẩm đều Chính Hãng mới 100% (giá đã bao gồm 10% VAT)</td></tr>';

echo '</thead>
<tbody>';
//->setCellValue("A3","Áp dụng từ ngày ".$date_apdung);

$ten_dm = "";
$show = true;
while($row = mysql_fetch_array($query)){
	if($row['ten_dm']!=$ten_dm){
		
		$ten_dm = $row['ten_dm'];
		echo '<tr class="ten_dm"><td colspan="5">'.$ten_dm.'</td></tr>';
		if($show){
			echo '<tr class="sanphamtitle">';
	echo '<td class="ten_sanpham">Model</td>';
	echo '<td class="gia_sanpham">Giá</td>';
	echo '<td class="color">Màu sắc</td>';
	echo '<td class="khuyen_mai">Khuyến mại</td>';
	echo '<td class="chitiet_sanpham">Thông tin sản phẩm</td>';

	echo '</tr>';
	$show=false;
		}
	}
	//$conhang=($row['trang_thai']==1);
	$conhang=($row['trang_thai']==1);// đây là tạm hết hoặc ko tạm hết
	$isnew = ($row['is_new']==1);// đây là new
	echo '<tr class="sanpham '.($row['is_new']==1?'new':'').' '.($conhang?'':'tamhet').'">';
	echo '<td class="ten_sanpham">';
   if($row['link']!='') echo '<a href="'.$row['link'].'">';
   
   echo $row['ten_sp'].($conhang?'':' (Hết)');
   if($row['anh_sp']!=""){
      echo '<div class="image" style="background-image:url(\'/quantri/anh/'.$row['anh_sp'].'\');"></div>';
   }
   if($row['link']!='') echo '</a>';
   echo '</td>';
	echo '<td class="gia_sanpham">'. number_format($row[$price_field],0,",",".").'</td>';
	echo '<td class="color">'.$row['color'].'</td>';
	echo '<td class="khuyen_mai">'.$row['khuyen_mai'].'</td>';
	echo '<td class="chitiet_sanpham">'.$row['chi_tiet_sp'].'</td>';
	
	
	echo '</tr>';
	//($isnew?'':' (Mới)').
	
}
echo '</tbody></table>';

?>
<style>
.image{display:none;background-size: 400px;background-repeat:no-repeat;position:fixed;left:50%;top:50%;width:400px;height:400px;margin-top:-200px;margin-left:-200px;}
.ten_sanpham{
   position:relative;
}
.ten_sanpham:hover .image{
   display:block;
}
</style>
