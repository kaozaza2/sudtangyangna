<?php 
include "session_admin.php";
include "function.php";

//ติดต่อฐานข้อมูล
include "connect_db.php";
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
.style2 {color:red; }
</style>
</head>
<body id="Page3">
<div id="container">
  <div id="bander_back">
    <?PHP include "bander_back.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top2.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?PHP  include "menu_left_back.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
<?PHP 
$sql_select_prd = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_GET['ID']."'");
$rs_prd = mysqli_fetch_array($sql_select_prd);

$sql_select = mysqli_query($con,"SELECT * FROM ".$product_type." WHERE type_id='".$rs_prd['prd_type']."'");
$rs = mysqli_fetch_array($sql_select);

$type_name = $rs['type_name'];

?>
            <tr>
              <td align="left" valign="top">
                <div class="title">
                    <h2><img src="images/diagram-60.png" width="48" height="48" />ประเภท : 
                    <?=$type_name?> </h2>
                </div>
				<table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                    <tr>
                      <td align="left" valign="middle">
<?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 20;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim((string) $_POST['txtSearch']); //ตัดซ่องวางของสตริง

if(!$_GET['ID']==""){
	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product." WHERE prd_id='".$_GET['ID']."'"); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_GET['ID']."' ORDER BY prd_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง
}else{
	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product.""); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." ORDER BY prd_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง
}



$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
//
$cols = 1; 
$c = $cols;
?>
<table style="width: 100%; ">
  <tr>
    <?php
while($result = mysqli_fetch_array($Query)){
$detail_product = substr((string) $result['prd_detail'], 0, 120) . "";
$c --;2
?>
<?PHP
if(!empty($result['prd_photo'])){
		        $xy = @getimagesize("Product/".$result['prd_photo']."");
                        $tx = $xy[0];
                        $ty = $xy[1];
	

			$x = 210;
			$y = $ty/$tx;
			$y = $y * 210;
}
?>
    <td align="left" valign="top" id="prd_bottom">
	
	<div id="prd_photo" style="width: 235px;">
      <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['prd_photo']==""){ ?>
      <a href="Product/<?=$result['prd_photo']?>" rel="lightbox" title="<?=$result['prd_name']?>" ><img  class="photo" src="Product/<?=$result['prd_photo']?>" width="<?=$x?>" height="<?=$y?>"/></a>
      <?php }else{ ?>
      <a href="images/photo.jpg" rel="lightbox" title="รอรูปสินค้า" > <img class="photo" src="images/photo.jpg" width="220" height="264" border="0" /> </a>
      <?php } ?>
    </div>
        <div id="prd_line_height">
                                  <ul id="prd_ul">
                                    <li><strong>สินค้า</strong> : <?=$result['prd_name']?></li>
									<li id="prd_li2" style="margin-top: -2px;"> <?=$result['prd_detail']?>
                                    </li>
									  
                                    <li><img src="images/14724.png" width="16" height="16" /><b> ราคา</b>: <samp  style="color:red;"><?=number_format($result['prd_price'],2)?></samp> บาท									</li>
									
<li><img src="images/buy_16.png" width="16" height="16" /><b> ขายไป</b> : <samp style="color:red;">
<?=$result['prd_sell']?></samp>
ชิ้น </li>
									
                                    <li> <img src="images/pencil_16.png" width="16" height="16" /> 
									<a href="edit_product.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['prd_id']?>">แก้ไข </a> ]|[ 
									<a href="del_product.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['prd_id']?>" onclick=" return confirm('ยืนยัน การลบข้อมูลสินค้า <?=$result['prd_name']?> ออกจากระบบ')"> ลบ</a> ]									</li>
                                  </ul>
                        </div></td>
    <?php
	if($c == 0) {
	$c = $cols;
?>
  </tr>
  <?php } } ?>
</table></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <div class="title">
                  <h2><img src="images/diagram-60.png" width="48" height="48" />ข้อมูลสินค้า</h2>
                </div>                <p>&nbsp;</p>
                <table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                    <tr>
                      <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 10;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim((string) $_POST['txtSearch']); //ตัดซ่องวางของสตริง

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product." WHERE(prd_name LIKE '%".$Search."%') "); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." WHERE(prd_name LIKE '%".$Search."%') ORDER BY prd_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง

$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
//
$cols = 1; 
$c = $cols;
?>
                        <table style="width: 100%; ">
                          <tr>
                            <?php
while($result = mysqli_fetch_array($Query)){
$detail_product = substr((string) $result['prd_detail'], 0, 70) . "";
$c --;2
?>
<?PHP
if(!empty($result['prd_photo'])){
		        $xy = @getimagesize("Product/".$result['prd_photo']."");
                        $tx = $xy[0];
                        $ty = $xy[1];
	

			$x = 100;
			$y = $ty/$tx;
			$y = $y * 100;
}
?>
 <td align="left" valign="top" id="prd_bottom"><div id="prd_photo">
                                <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['prd_photo']==""){ ?>
                                <a href="Product/<?=$result['prd_photo']?>" rel="lightbox" title="<?=$result['prd_name']?>" ><img  class="photo" src="Product/<?=$result['prd_photo']?>" width="<?=$x?>" height="<?=$y?>"/></a>
                                <?php }else{ ?>
                                <a href="images/photo.jpg" rel="lightbox" title="รอรูปสินค้า" > <img class="photo" src="images/photo.jpg" width="110" height="132" border="0" /> </a>
                                <?php } ?>
                              </div>
                                <div id="prd_line_height">
                                  <ul id="prd_ul">
                                    <li><strong>สินค้า</strong> : <?=$result['prd_name']?></li>
									
                                    <li id="prd_li2" style="margin-top: -2px;"> <?=$detail_product?> | <a href="admin_detail_product.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['prd_id']?>">อ่านต่อ...</a></li>
									  
                                    <li>
									<img src="images/14724.png" width="16" height="16" /><b> ราคา</b>: 
									<samp  style="color:red;"><?=number_format($result['prd_price'],2)?></samp> บาท	
									</li>
									
<li><img src="images/buy_16.png" width="16" height="16" /><b> ขายไป</b> : <samp style="color:red;">
<?=$result['prd_sell']?></samp>
ชิ้น </li>

<li>
	<form action="add_stock_product.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['prd_id']?>" method="post" name="from1<?=$result['prd_id']?>" id="from1" onsubmit="return chk_txt<?=$result['prd_id']?>();">
     <script language="JavaScript" type="text/javascript">
				  	function chk_txt<?=$result['prd_id']?>(){
						if(document.from1<?=$result['prd_id']?>.txt_num<?=$result['prd_id']?>.value==""){
									alert("กรุณากรอก จำนวนสินค้าด้วยนะ");
									document.from1<?=$result['prd_id']?>.txt_num<?=$result['prd_id']?>.focus();
									return false;
							}else {
									return true;
							}
					}
			 </script>
     <img src="images/buy_16.png" width="16" height="16" />     <b> สต๊อกสินค้า</b>:<samp style="color:red;">
                                <?=$result['prd_stock']?>
                                </samp>ชิ้น | <a href="add_orderin.php?ID=<?=$result['prd_id']?>"></a> เพิ่มสินค้า :
                                          <input name="txt_num" type="text" id="txt_num<?=$result['prd_id']?>" style="width: 30px; text-align:center;" />
                                        <input type="submit" name="Submit2" value="เพิ่ม" />
                                        <input type="hidden" name="ID" value="<?=$result['prd_id']?>" />
                              </form>
                                    </li>
									
                                    <li> <img src="images/pencil_16.png" width="16" height="16" /> 
									<a href="edit_product.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['prd_id']?>">แก้ไข </a> ]|[ 
									<a href="del_product.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['prd_id']?>" onclick=" return confirm('ยืนยัน การลบข้อมูลสินค้า <?=$result['prd_name']?> ออกจากระบบ')"> ลบ</a> ]									</li>
                                  </ul>
                              </div></td>
                            <?php
	if($c == 0) {
	$c = $cols;
?>
                          </tr>
                          <?php } } ?>
                        </table></td>
                    </tr>
                </table>
                <p><span style="padding-top:10px;">
                  <?php  
		if($total ==0){
			echo "<p style='color: red; font-size: 20px; padding: 10px;'>ไม่มีข้อมูล</p>";
		}else{
		//echo "<hr>";
		$i=1;
		echo "<center>";
		//echo "หน้าแรก";
		echo "<ul id='ulBangNa' style='text-align: left;'>
				<li>
		";

		echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-1)."&page=$i' style='border:0px;'><B>หน้าแรก</B></a>";
		echo "</li>";
		echo "<li id='liBangNa'>";
		for($i=1;$i<=$page;$i++){
if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-1)."&page=$i' style='border:0px;'><B id='onHoverN''>$i</B></a>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
}else{
echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-1)."&page=$i' style='border:0px;'>$i</a>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
}  
echo "</li>";
echo "<li>";
//echo "หน้าสุดท้าย";
echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-2)."&page=$i' style='border:0px;'><b>หน้าสุดท้าย</b></a>";
	
echo "
		</li>
		</ul>
		";
echo "</center>";
}
?>
                </p>
                <p>&nbsp;</p>
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
