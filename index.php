<?php
    include("cauhinh/ketnoi.php");
    function makeURL($string){
        $string = str_replace(' ', '-', $string);
        //$string = preg_replace('', replacement, subject);
        return $string;
    }
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Điểm Sáng Việt</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/mobile.css" />
    <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
</head>
<body>
<div id="wrapper">
	<!-- Header -->
    <div id="header">
    	
        <!--<div id="navbar">
        	<ul>
            	<li id="menu-home"><a href="index.php">trang chủ</a></li>
                <li><a  href="gioithieu.html">giới thiệu</a></li>
                <li><a  href="dichvu.html">dịch vụ</a></li>
                <li><a  href="lienhe.html">liên hệ</a></li>
                <li><a  href="diendan.html">diễn đàn</a></li>
            </ul>
        </div> -->
    </div>
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
    	<!-- Left Column -->
    	
        
        <!-- Right Column -->
        <div id="r-col">
        	
            <div id="main">
               
            	<?php 
                    include("baogia.php");
                ?>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <!-- <div id="brand"></div> -->
    </div>
    <!-- End Body -->
    <!-- Footer -->
    <div id="footer">
    	<div id="footer-info">
        	<h4>Công ty Điểm Sáng Việt</h4>
            <p><span>Địa chỉ:</span> Tầng 16 nhà B, Tòa nhà Vinaconex I, Số 289A Khuất Duy Tiến - Cầu Giấy - Hà Nội | <span>Phone</span> 098.804.3883 - 0949.82.7997</p>
            
            <p>Copyright 2016 © Diem Sang Viet</p>
        </div>
    </div>
    <!-- End Footer -->
</div>
<!-- End Wrapper -->
<style>
table{border-spacing: 0;border-collapse: collapse;}
    table tr{width:100% !important;height:30px;border-bottom: 1px solid #333;box-sizing:border-box;border-spacing: 0;border-right: 1px solid #333;}
    .a1,.a2{border-right-color: rgba(0,0,0,0);}
    .a1,.a1 td{color: black;font-weight: bold;text-align: center;font-size: 20px;line-height: 40px;height: 40px;border-top: none;border-bottom: none}
    .a2,.a2 td{color: black;font-weight: bold;text-align: center;font-size:15px;line-height: 40px;height: 40px;border-top: none;}
    
    .sanphamtitle td{background: #ffff80;text-align: center;}
    .ten_dm{height:40px;background: #B6DDE8;text-align: center;line-height: 40px;font-weight: bold;}
    .sanpham{height:auto;line-height:30px;}
    
    .sanpham td{line-height: 30px;border-right: 1px solid #333;//padding-left:5px;text-transform: capitalize;color: black;font-size: 16px;height: 100%;
        box-sizing: border-box;
        text-align: center;
    }
    .ten_sanpham{width:150px;text-align: left;font-weight: bold;}
    .gia_sanpham{width:120px;text-align: center;font-weight: bold;}
    .ten_dm,.ten_sanpham{border-left: 1px solid #333}
    .ten_dm{border-right: 1px solid #333;color: black;font-size: 16px;}
    .chitiet_sanpham{width:430px;
text-align: center;}
    .khuyen_mai{text-overflow:ellipsis;text-align: center;width: 170px;}
    .color{text-align: center;width:320px;}
    .new td{color:#f22;}
    .tamhet td{color: rgba(123, 115, 115, 0.32)}
</style>
</body>
</html>
