<?php
$quanly = isset($_COOKIE['id'])?$_COOKIE['id']:0;
if(!$quanly>0){
	die("Invalid user");
}
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

$rowsPerPage = 10;
$perRow = $page*$rowsPerPage - $rowsPerPage;
$idKhachHang = isset($_GET['id_kh'])?$_GET['id_kh']:0;
$sql = "SELECT * FROM khachhang 
JOIN khachhang_gia 
ON khachhang.kh_id=khachhang_gia.kg_khachhang
JOIN sanpham ON khachhang_gia.kg_sanpham=sanpham.id_sp
JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm
WHERE khachhang_gia.kg_khachhang=".$idKhachHang."
";
$query = mysql_query($sql);
require_once("../PHPExcel.php");
$objPHPExcel = new PHPExcel();
$style = array(
	        'alignment' => array(
	            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	            'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,

	        ),
	        'font'  => array(
		        'bold'  => true,
		        'color' => array('rgb' => '000000'),
		        'size'  => 13,
		        'name'  => 'Times New Roman'
		    )
	    );
$style_value = array(
	        'alignment' => array(
	            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	            'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,

	        ),
	        'font'  => array(
		        'name'  => 'Times New Roman'
	        ));
$style_right =  array(
	        'alignment' => array(
	            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
	        ),
	        'font'  => array(
		        'name'  => 'Times New Roman'
	    ));
$style_dm = array(
	        'alignment' => array(
	            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        ),
	        'font'  => array(
		        'bold'  => true,
		        'color' => array('rgb' => '000000'),
		        'size'  => 15,
		        'name'  => 'Times New Roman'
		    )
	    );
$style_title = array(
	        'alignment' => array(
	            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        ),
	        'font'  => array(
		        'name'  => 'Times New Roman'
	    ));
$style_hethang = array(
		'font'  => array(
		        'color' => array('rgb' => 'aaaaaa')
		        //'name'  => 'Verdana'
		    )
	);
$date_apdung = file_get_contents("lastedit.txt");//"01/08/2016";
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A1","BÁO GIÁ BÁN BUÔN")
			->setCellValue("A2","Toàn bộ sản phẩm đều Chính Hãng mới 100% (giá đã bao gồm 10% VAT)")
			->setCellValue("A3","Áp dụng từ ngày ".$date_apdung);
$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');
//'Áp dụng từ ngày 01/08/2016';
$objPHPExcel->getActiveSheet()->mergeCells('A3:D3');

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($style);
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->applyFromArray($style);
$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($style_right);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);//size o model
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);//size o gia'
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);//size tinh nang
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(23);//size khuyen mai
            


$objPHPExcel->getActiveSheet()->setTitle('Báo giá');    

$rc = 4;
$ten_dm="";
$kh_name = "";
$da_them_header=false;
while($row = mysql_fetch_array($query)){
	$kh_name = $row['kh_name'];
	if($row['ten_dm']!=$ten_dm){
		$rc++;
		$ten_dm = $row['ten_dm'];
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$rc,$ten_dm);
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$rc.':D'.$rc);
    	$objPHPExcel->getActiveSheet()->getStyle('A'.$rc.':D'.$rc)->applyFromArray($style_dm)
    	->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'B6DDE8'
        )

    ));//182-221-232
    	if(!$da_them_header){
        	$da_them_header=true;//neu bo dau // di thi se chi them vao hang dau tien
        	$rc++;
        	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rc,"Model");
        	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rc,"Giá");
        	$objPHPExcel->getActiveSheet()->setCellValue('C'.$rc,"Mô tả");
        	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rc,"Khuyến mãi");
        	$objPHPExcel->getActiveSheet()->getStyle('A'.$rc.':D'.$rc)->applyFromArray($style_title);
        }
	}
	$rc++;
	$conhang=($row['trang_thai']==1);
	$chitiet = str_replace("<p>","",$row['chi_tiet_sp']);
	$chitiet = str_replace("&quot","",$chitiet);
	$chitiet = str_replace("<em><strong>","",$chitiet);
	$chitiet = str_replace("</strong></em>","",$chitiet);
	$chitiet = str_replace("</span>","",$chitiet);
	$chitiet = str_replace("<span>","",$chitiet);
	$chitiet = str_replace("</p>","",$chitiet);
	$chitiet = str_replace("</p>","",$chitiet);
	$chitiet = str_replace("</p>","",$chitiet);
	$chitiet = str_replace("</p>","",$chitiet);


	$objPHPExcel->getActiveSheet()
		->setCellValue('A'.$rc,$row['ten_sp'].($row['is_new']==1?' (New)':''))
		->setCellValue('C'.$rc,$chitiet)
		->setCellValue('D'.$rc,$row['khuyen_mai']);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$rc.":D".$rc)
		->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$rc.":D".$rc)->applyFromArray($style_value);
	if($row['is_new']==1){//day la new
		
		$styleArray = array(
		    'font'  => array(
		        'bold'  => true,
		        'color' => array('rgb' => 'FF0000'),
		        //'size'  => 15,
		        //'name'  => 'Verdana'
		    ));
		$objPHPExcel->getActiveSheet()->getStyle('A'.$rc.":D".$rc)->applyFromArray($styleArray);
	}
	if(!$conhang){
		//day la con hang
		$objPHPExcel->getActiveSheet()->getStyle('A'.$rc.":D".$rc)->applyFromArray($style_hethang);
		
	}
	if($row['kg_gia']==1){
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$rc,$row['gia_sp']);
	}else{
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$rc,$row['gia_sp_'.$row['kg_gia']]);
	}
}
function removeAccent($mystring){
	$marTViet=array(
		// Chữ thường
		"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
		"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ","Đ","'",
		// Chữ hoa
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ","Đ","'"
		);
	$marKoDau=array(
		/// Chữ thường
		"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d","D","",
		//Chữ hoa
		"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D","D","",
		);
	return str_replace($marTViet, $marKoDau, $mystring);
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//date_default_timezone_set("ASIA/HO_CHI_MINH"); date("H_i").
$file_name = "baogia_khachhang_".str_replace(' ','_',removeAccent(trim($kh_name)))."_". date("m-d")."_".".xlsx";
echo $file_name;

if(file_exists($file_name)){
	//echo "Rewriting...<br/>";
	unlink($file_name);
}
$objWriter->save($file_name);  

 if(!$file_name)
 {
     // File doesn't exist, output error
     die('file not found');
 }
 else
 {
     // Set headers
 	 ob_clean();
     header("Cache-Control: public");
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$file_name");
     header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
     header("Content-Transfer-Encoding: binary");

     // Read the file from disk
     readfile($file_name);
     die();
 }
//echo "DONE : ". $file_name;     
?>