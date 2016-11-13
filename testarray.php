<?php 
	$mangDemo1= array(10,100,10.5,200,"Hop","Tuan");
	$mangDemo2["key1"]="value1";
	$mangDemo2["key2"]="value2";
	$mangDemo2[0]="value3";
	

	//echo $mangDemo1[3];//lấy giá trị  

	//echo count($mangDemo1);//đếm số phần tử

	/*foreach ($mangDemo1 as $key => $value) {
		echo "KEY : $key , VALUE : $value <br>";
	}*/
	$mangHaichieu=array($mangDemo1,$mangDemo2,10,100,"tuan");
	echo '<pre>';
	print_r($mangHaichieu);
	echo '</pre>';
	echo $mangHaichieu[1]['key2'];
?>