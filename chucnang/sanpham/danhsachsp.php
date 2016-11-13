<?php 
    if(isset($_GET['id_dm'])) $id_dm=$_GET['id_dm'];else $id_dm=0;
     //danh mục
    $sql_danhmuc="SELECT * FROM dmsanpham WHERE id_dm=$id_dm";
    $query_danhmuc=mysql_query($sql_danhmuc);
    $row_danhmuc=mysql_fetch_array($query_danhmuc);
    //sản phẩm
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }else $page=1;
    
    $rowPerpage=3;//3 sản phẩm trên 1 trang
    $perRow=$rowPerpage*($page-1);//vị trí bắt đầu
    //Tính tổng số trang 
    $totalRow=mysql_num_rows(mysql_query("SELECT * FROM sanpham WHERE id_dm=$id_dm"));
    $totalPage=ceil($totalRow/$rowPerpage);
    //tạo link để click trang đầu
    $pagination="";

    if($totalPage>1){
        //trang đầu
        $pagination.='<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'">Trang đầu</a>';
        //danh sách trang
        for($i=1;$i<=$totalPage;$i++)
        {
            if($i>$page-3 && $i<$page+3){
                if($page==$i)
                {
                    $pagination.='<span> '.$i.' </span>';
                }else $pagination.='<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'"> '.$i.' </a>';        
           }
        }
        //trang cuối  
        $pagination.='<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$totalPage.'">Trang cuối</a>';
     }   
        

    $sql_sanpham="SELECT * FROM sanpham WHERE id_dm=$id_dm LIMIT $perRow,$rowPerpage" ;
    $query_sanpham=mysql_query($sql_sanpham);
?>

<div class="prd-block">
	<h2><?php echo $row_danhmuc['ten_dm']; ?></h2>
    <div class="pr-list">
        <?php while($row=mysql_fetch_array($query_sanpham)){ ?>
    	<div class="prd-item">
        	<a href="chitietsp/<?php echo $row['id_sp']; ?>/<?php echo makeURL($row['ten_sp']); ?>.html"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp'] ?>" /></a>
            <h3><a href="#"><?php echo $row['ten_sp'] ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh'] ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
            <p class="price"><span>Giá: <?php echo $row['gia_sp'] ?> VNĐ</span></p>
        </div>
       <?php } ?>
        <div class="clear"></div>
    </div>
</div>

<div id="pagination"><?php echo $pagination; ?></div>