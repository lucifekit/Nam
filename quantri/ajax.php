<?php
	require_once('../cauhinh/ketnoi.php');
	$action = $_GET['action'];
	switch ($action) {
		case 'search':
			$keyword = $_GET['keyword'];
            $nhacungcap = $_GET['nhacungcap'];

$sql = "SELECT * FROM sanpham
				 INNER JOIN dmsanpham
				 ON sanpham.id_dm = dmsanpham.id_dm 
				 WHERE sanpham.ten_sp LIKE '%".addslashes($keyword)."%'";
if($nhacungcap>0){
    $sql .=" AND sanpham.id_dm=".$_GET['nhacungcap'];
}
$sql.="
				 ORDER BY id_sp DESC
				 ";
$query = mysql_query($sql);

        while($row = mysql_fetch_array($query)){
		?>
        <tr>
            <td><span><?php echo $row['id_sp'];?></span></td>
            <td style="text-align:center" width="5%"><input name="checkbox[]" value="<?php echo $row['id_sp'] ?>" type="checkbox"></td>
            <td class="l5"><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><?php echo $row['ten_sp'];?></a></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp']);?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_2']);?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_3']);?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_4']);?></span></td>
            <td class="l5"><span class="price"><?php echo number_format($row['gia_sp_5']);?></span></td>
            <td class="l5"><?php echo $row['ten_dm'];?></td>
            <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_sp'];?>" /></span></td>
            <?php
            if($isAdmin){
        ?>
            <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row['id_sp'];?>"><span>Xóa</span></a></td>
        <?php

    }?>

            
        </tr>
        <?php
		}

			break;
		
		default:
			# code...
			break;
	}($action)
?>