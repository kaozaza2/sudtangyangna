<?php 
include "session_admin.php";
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
<link rel="stylesheet" type="text/css" href="css_style_page.css" /></head>
<body id="Page7">
<div id="container">
  <div id="bander_back">
    <?php include "bander_back.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?php include "menu_top2.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?php  include "menu_left_back.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
                <h2><img src="images/diagram-04.png" width="48" height="48" /> เว็บบอร์ด กระทู้ถาม-ตอบ </h2>
            </div>
          <div style="padding:10px; font-size:15px; font-weight:bold; color:#FF0000; border-bottom: 1px solid #ddd;">
				  <form id="form1" name="form1" method="post" action="admin_board.php?m_page=<?=$_GET['m_page']?>">
				    <img src="images/Search.png" />หัวข้อกระทู้ : 
				    <input name="txtSearch" type="text" id="txtSearch" style="width: 300px;" />
				    <input type="submit" name="Submit" value="ค้าหา" />
				  </form>
		    </div>
            <table width="99%" border="0" cellpadding="0" cellspacing="0" style="border-left: 1px solid #f4f4f4; padding-left: 5px;">
              <?php 
			  //ติดต่อฐานข้อมูล
			 include "connect_db.php";
			  $sql_select = mysqli_query($con,"SELECT * FROM ".$board_question." WHERE (topic_title LIKE '%".$_POST['txtSearch']."%') ORDER BY topic_id DESC ");
			  $num = mysqli_num_rows($sql_select);
			  ?>
              <tr>
                <td height="30" colspan="5" align="left" valign="middle" style="padding:5px;">
				<img src="images/icon-03.png" width="16" height="16" /> จำนวนกระทู้ถาม [<samp style="color:red;"><?=$num?></samp>] หัวข้อ 
				</td>
              </tr>
              <tr>
                <td width="7%" height="35" align="center" valign="middle" bgcolor="#E99815" class="sell"><strong>ลำดับ</strong></td>
                <td width="70%" height="35" align="center" valign="middle" bgcolor="#E99815" class="sell"><strong>หัวข้อคำถาม</strong></td>
                <td width="9%" height="35" align="center" valign="middle" bgcolor="#E99815" class="sell"><strong>อ่าน</strong></td>
                <td width="8%" height="35" align="center" valign="middle" bgcolor="#E99815" class="sell"><strong>ตอบ</strong></td>
                <td width="6%" height="35" align="center" valign="middle" bgcolor="#E99815" class="sellright"><strong>ลบ</strong></td>
              </tr>
              <?php
			  $i = 1;
			  while($result = mysqli_fetch_array($sql_select)){
			  	$sql_select1 = mysqli_query($con,"SELECT * FROM ".$board_answer."  WHERE ans_IDtopic='".$result['topic_id']."'");
			   $num1 = mysqli_num_rows($sql_select1);
			   ?>
              <tr>
                <td height="25" align="center" valign="middle" class="sell1"><?=$i?></td>
                <td height="25" align="left" valign="middle" class="sell1" style="padding:3px;">

				<a  style="text-decoration:none;"href="update_board.php?m_page=<?=$_GET['m_page']?>&question_id=<?=$result['topic_id']?>">
				<img src="images/icon_board/<?=$result['topic_photo']?>" border="0" />
				<?=$result['topic_title']?> | <?=datetime($result['topic_date'])?>
                  </a>			    </td>
                <td height="25" align="center" valign="middle" class="sell1"><?=$result['topic_num']?></td>
                <td height="25" align="center" valign="middle" class="sell1"><?=$num1?></td>
                <td height="25" align="center" valign="middle" class="sellright1"><a href="del_board.php?m_page=<?=$_GET['m_page']?>&question_id=<?=$result['topic_id']?>">ลบ</a> </td>
              </tr>
              <?php $i++; } ?>
            </table>
            <p>&nbsp;</p>
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
