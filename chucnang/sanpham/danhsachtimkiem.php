<?php 
    if(isset($_GET['stext'])) 
        $tu_khoa=$_GET['stext'];
    else $tu_khoa=" ";

 
    //sản phẩm
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }else $page=1;
    
    $rowPerpage=3;//3 sản phẩm trên 1 trang
    $perRow=$rowPerpage*($page-1);//vị trí bắt đầu
    //Tính tổng số trang 
    $totalRow=mysql_num_rows(mysql_query("SELECT * FROM sanpham  WHERE ten_sp LIKE '%$tu_khoa%' "));
    $totalPage=ceil($totalRow/$rowPerpage);
    //tạo link để click trang đầu
    $pagination="";

    if($totalPage>1){
        //trang đầu
        $pagination.='<a href="index.php?page_layout=danhsachtimkiem&stext='.$tu_khoa.'">Trang đầu</a>';
        //danh sách trang
        for($i=1;$i<=$totalPage;$i++)
        {
            if($i>$page-3 && $i<$page+3){
                if($page==$i)
                {
                    $pagination.='<span> '.$i.' </span>';
                }else $pagination.='<a href="index.php?page_layout=danhsachtimkiem&stext='.$tu_khoa.'&page='.$i.'"> '.$i.' </a>';        
           }
        }
        //trang cuối  
        $pagination.='<a href="index.php?page_layout=danhsachtimkiem&stext='.$tu_khoa.'&page='.$totalPage.'">Trang cuối</a>';
     }  



    $sql_timkiem="SELECT * FROM sanpham WHERE ten_sp LIKE '%$tu_khoa%' LIMIT $perRow,$rowPerpage  ";
    $query_timkiem=mysql_query($sql_timkiem);
?>
<div class="prd-block">
	<h2>kết quả tìm được với từ khóa <span class="skeyword">"<?php echo $tu_khoa; ?>"</span></h2>
    <div class="pr-list">
        <?php $i=0; while($row=mysql_fetch_array($query_timkiem)){ $i++; ?>
    	<div class="prd-item">
        	<a href="#"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>" /></a>
            <h3><a href="#"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng:<?php echo $row['tinh_trang']; ?></p>
            <p class="price"><span>Giá: <?php echo $row['gia_sp']; ?> VNĐ</span></p>
        </div>
        <?php
        if($i%3==0) echo ' <div class="clear"></div>';
         } 
         ?>
        
       
    </div>
</div>

<div id="pagination"><?php echo $pagination; ?></div>