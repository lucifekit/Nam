<?php
    if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0 ){
        //select * from sanpham where id_sp IN(1,2,5,6,7,8)
        //Khai báo 1 mảng rỗng  A
        //Lặp mảng giỏ hàng , mỗi vòng lặp thì thêm key (id_Sp) vào mảng A
    
        $arrId=array();
        foreach ($_SESSION['giohang'] as $id_sp => $so_luong) {
           $arrId[]=$id_sp;//thêm phần tử
        }
        $strId=implode(',', $arrId);//chuyển mảng id_sp sang chuỗi id_sp
        $sql="select * from sanpham where id_sp IN($strId) ORDER BY id_sp DESC";
        $query=mysql_query($sql);
?>
<div class="prd-block">
	<h2>xác nhận hóa đơn thanh toán</h2>
    <div class="payment">
    	<table border="0px" cellpadding="0px" cellspacing="0px" width="100%">
        	<tr id="invoice-bar">
            	<td width="45%">Tên Sản phẩm</td>
                <td width="20%">Giá</td>
                <td width="15%">Số lượng</td>
                <td width="20%">Thành tiền</td>
            </tr>
            <?php $totalAll=0; while($row=mysql_fetch_assoc($query)){ ?>
            <tr>
            	<td class="prd-name"><?php echo $row['ten_sp']; ?></td>
                <td class="prd-price"> <?php echo number_format($row['gia_sp']); ?> VNĐ</td>
                <td class="prd-number"><?php echo $_SESSION['giohang'][$row['id_sp']]; ?></td>
                <td class="prd-total"><?php $total=$_SESSION['giohang'][$row['id_sp']]*$row['gia_sp'];echo number_format($total); ?> VNĐ</td>
            </tr>
            <?php $totalAll=$totalAll+$total; } ?>

            <tr>
            	<td class="prd-name">Tổng giá trị hóa đơn là:</td>
                <td colspan="2"></td>
                <td class="prd-total"><span><?php echo number_format($totalAll); ?> VNĐ</span></td>
            </tr>
        </table>

    </div>
    
    <div class="form-payment">
        <?php 
            if(isset($_POST['submit']))
            {
                $ten=$_POST['ten'];if($ten=='') $error_ten="(*) Vui lòng nhập họ tên !";
                $mail=$_POST['mail'];if($mail=='') $error_mail="(*) Vui lòng nhập email !";
                $dt=$_POST['dt'];if($dt=='') $error_dt="(*) Vui lòng nhập số điện thoại !";
                $dc=$_POST['dc'];if($dc=='') $error_dc="(*) Vui lòng nhập địa chỉ  nhận hàng !";
                if($ten!='' && $mail !='' && $dt!='' && $dc!='')
                {
                    //Nội dung email 
                    $arrId = array();
                    foreach($_SESSION['giohang'] as $id_sp=>$sl){
                        $arrId[] = $id_sp;
                    }
                    $strId = implode(', ', $arrId);
                    $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp
                    DESC";
                    $query = mysql_query($sql);
                    

                     $strBody = '';
                     // Thông tin Khách hàng
                     $strBody = '<p>
                     <b>Khách hàng:</b> '.$ten.'<br />
                     <b>Email:</b> '.$mail.'<br />
                     <b>Điện thoại:</b> '.$dt.'<br />
                     <b>Địa chỉ:</b> '.$dc.'
                     </p>';
                     // Danh sách Sản phẩm đã mua
                     $strBody .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
                    width="100%">
                     <tr>
                     <td align="center" bgcolor="#3F3F3F" colspan="4"><font
                    color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
                     </tr>
                     <tr id="invoice-bar">
                     <td width="45%"><b>Tên Sản phẩm</b></td>
                     <td width="20%"><b>Giá</b></td>
                     <td width="15%"><b>Số lượng</b></td>
                     <td width="20%"><b>Thành tiền</b></td>
                     </tr>';

                     $totalPriceAll = 0;
                     while($row = mysql_fetch_array($query)){
                     $totalPrice = $row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];

                     $strBody .= '<tr>
                     <td class="prd-name">'.$row['ten_sp'].'</td>
                     <td class="prd-price"><font color="#C40000">'.$row['gia_sp'].'
                    VNĐ</font></td>
                     <td class="prd-number">'.$_SESSION['giohang'][$row['id_sp']].'</td>
                     <td class="prd-total"><font color="#C40000">'.$totalPrice.'
                    VNĐ</font></td>
                     </tr>';

                     $totalPriceAll += $totalPrice;
                     }

                     $strBody .= '<tr>
                     <td class="prd-name">Tổng giá trị hóa đơn là:</td>
                     <td colspan="2"></td>
                     <td class="prd-total"><b><font color="#C40000">'.$totalPriceAll.'
                    VNĐ</font></b></td>
                     </tr>
                     </table>';

                     $strBody .= '<p align="justify">
                     <b>Quý khách đã đặt hàng thành công!</b><br />
                     • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
                    Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
                    />
                     • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
                    khi giao hàng 24 tiếng.<br />
                     <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng
                    Tôi!</b>
                     </p>';


                    //gửi mail xác nhận 
                    // Thiết lập SMTP Server
                    require("class.phpmailer.php"); // nạp thư viện
                    $mailer = new PHPMailer(); // khởi tạo đối tượng
                    $mailer->IsSMTP(); // gọi class smtp để đăng nhập
                    $mailer->CharSet="utf-8"; // bảng mã unicode
                    //Đăng nhập Gmail
                    $mailer->SMTPAuth = true; // Đăng nhập
                    $mailer->SMTPSecure = "ssl"; // Giao thức SSL
                    $mailer->Host = "smtp.gmail.com"; // SMTP của GMAIL
                    $mailer->Port = 465; // cổng SMTP
                    // Phải chỉnh sửa lại
                    $mailer->Username = "system.email.vn@gmail.com"; // GMAIL username
                    $mailer->Password = "hophop01"; // GMAIL password
                    $mailer->AddAddress($mail, $ten); //email người nhận , được người dùng nhập vào 
                    $mailer->AddBCC("luonghop.lc@gmail.com", "Admin Vietpro Shop"); // gửi thêm một email cho Admin
                    // Chuẩn bị gửi thư nào
                    $mailer->FromName = 'Vietpro Shop'; // tên người gửi
                    $mailer->From = 'system.email.vn@gmail.com'; // mail người gửi
                    $mailer->Subject = 'Hóa đơn xác nhận mua hàng từ Vietpro Shop';
                    $mailer->IsHTML(TRUE); //Bật HTML không thích thì false
                    // Nội dung lá thư
                    $mailer->Body = $strBody;
                    // Gửi email
                    if(!$mailer->Send()){
                     // Gửi không được, đưa ra thông báo lỗi
                     echo "Lỗi gửi Email: " . $mailer->ErrorInfo;
                    }
                    else{
                     // Gửi thành công
                     unset($_SESSION['giohang']);
                     header('location:hoanthanh.html');
                    }
                }
            }
        ?>
    	<form method="post">
    	<ul>
        	<li class="info-cus"><label>Tên khách hàng</label><br /><input  value="<?php  if(isset($_POST['ten'])) echo $_POST['ten']; ?> "  type="text" name="ten" /> <span><?php if(isset($error_ten)) echo $error_ten; ?></span></li>
            <li class="info-cus"><label>Địa chỉ Email</label><br /><input  value=" <?php  if(isset($_POST['mail'])) echo $_POST['mail']; ?> " type="text" name="mail" /> <span><?php if(isset($error_mail)) echo $error_mail; ?></span></li>
            <li class="info-cus"><label>Số Điện thoại</label><br /><input value=" <?php  if(isset($_POST['dt'])) echo $_POST['dt']; ?> "  type="text" name="dt" /> <span><?php if(isset($error_dt)) echo $error_dt; ?></span></li>
            <li class="info-cus"><label>Địa chỉ nhận hàng</label><br /><input  value="<?php  if(isset($_POST['dc'])) echo $_POST['dc']; ?> "  type="text" name="dc" /> <span><?php if(isset($error_dc)) echo $error_dc; ?></span></li>
            <li><input type="submit" name="submit" value="Xác nhận mua hàng" /> <input type="reset" name="reset" value="Làm lại" /></li>
        </ul>
        </form>
    </div>
</div>
 <?php }else echo 'Bạn chưa chọn sản phẩm !'; ?>          