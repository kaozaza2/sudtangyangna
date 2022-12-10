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
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css_style_index.css" />
<link rel="stylesheet" type="text/css" href="css_style_menu.css" />
<link rel="stylesheet" type="text/css" href="css_style_board.css" />
<link rel="stylesheet" type="text/css" href="css_style_page.css" />

<style type="text/css">
</style>
</head>
<body id="Page1">
<div id="container">
  <div id="bander_front">
    <?php include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?php include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?php  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_front">
  	  <div class="title"> 
		    <h2><img src="images/Stats.png" width="48" height="48" />สินค้าแนะนำ</h2>
      </div>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>

    </div>
	  
<div class="menu_right"><!-- เมนูด้านซ้าย -->
	    <p>&nbsp;</p>
		dsadsadasd
	    <p style="clear:both;"></p>
    </div><!-- ปิด เมนูด้านซ้าย -->
	  
  </div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?php include "footer.php"; ?>
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
