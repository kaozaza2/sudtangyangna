<?php 
session_start(); 
include "function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ร้านค้าออนไลน์</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css_style_index.css" />
<link rel="stylesheet" type="text/css" href="css_style_menu.css" />
<link rel="stylesheet" type="text/css" href="css_style_board.css" />
<link rel="stylesheet" type="text/css" href="css_style_page.css" />

<style type="text/css">
</style>
</head>
<body id="Page8">
<div id="container">
  <div id="bander_front">
    <?PHP include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?PHP  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="500" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2> การสั่งซื้อสินค้ากับเรา</h2>
          </div>
		  
		  
             <div style="padding: 10px; margin:5px; border-bottom: 1px solid #ddd; font-size: 15px;">
			<ul class="list_data" style="list-style:none;">
			<li class="title_detail" id="brt" style="font-size:16px; padding-bottom: 5px;">
			- <b>วิธีการสั่งซื้อสินค้า</b>			</li>
			<li class="data_detail" id="brt">1. สมัครสมาชิกขอรับ Username และ Password จากนั้นลงชื่อเข้าใช้ระบบเพื่อสั่งซื้อสินค้า</li>
			<li class="data_detail" id="brt">2. คลิกเลือกเมนู รายการสินค้า หยิบสินค้าใส่ตะกร้าสินค้า การสั่งซื้อสินค้าสามารถสั่งซื้อได้มากว่า 1 รายการ </li>		
			<li class="data_detail" id="brt">3. คำนวณราคาสินค้าในตะกร้า จากนั้นยืนยันการสั่งซื้อสินค้า </li>		
			<li class="data_detail" id="brt">4. ชำระเงินค่าสินค้าตามรายการที่สั่งซื้อ โดยโอนเงินผ่านธนาคารที่ทางร้านแจ้งไว้ที่หน้าเว็บไซต์</li>		
			<li class="data_detail" id="brt">5. ลงชื่อเข้าใช้ระบบ เพื่อแจ้งชำระเงินตามรายการสั่งซื้อสินค้าไว้ก่อนหน้านี้</li>		
			<li class="data_detail" id="brt">6. รอบรับสินค้าภายใน 30-60 นาที</li>		
			<li class="data_detail" id="brt">ขอขอบคุณลูกค้าทุกท่านที่มาใช้บริการ</li>				
	    </ul>
			</div>
		   
		   
            <p>&nbsp;</p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
    </div>
	  
<!-- เมนูด้านซ้าย -->
  <p style="clear:both;"></p>
<!-- ปิด เมนูด้านซ้าย -->
	  
  </div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?PHP include "footer.php"; ?>
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
