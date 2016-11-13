<?php
if(isset($_POST['submit'])){
	
	if($_POST['ten_dm'] == ''){
		
		$error_ten_dm = '<span style="color:red;">(*)</span>';
	}
	else{
		$ten_dm = $_POST['ten_dm'];	
	}
	
	if($ten_dm){
		$sql = "INSERT INTO dmsanpham(ten_dm) VALUES('$ten_dm')";
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=danhsachdm');
	}
}
?>
<h2>thêm mới danh mục</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-cat" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên danh mục</label><br /><input type="text" name="ten_dm" /> <?php if(isset($error_ten_dm)){echo $error_ten_dm;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>