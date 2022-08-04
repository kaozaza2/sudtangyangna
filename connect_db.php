<?php
 error_reporting(0);
 error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Bangkok");
 
$host="us-cdbr-east-06.cleardb.net";
$user="ba729f671bd339";
$pass="85174cab";
$dbname="heroku_ff0e12c27e2bfe5";
$con=mysqli_connect("$host","$user","$pass","$dbname");
@mysqli_query($con,"SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno()){
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
 

			//ชื่อตารางทั้งหมดมีดังนี้ 
			$bank ="bank"; //ตารางธนาคาร
			$member ="member"; //ตารางสมาชิกหรือลูกค้า
			$order ="tb_order"; //ตารางใบสั่งซื้อสินค้าของลูกค้า
			$order_detail ="tb_order_detail"; //ตารางรายละเอียดใบสั่งซื้อของลูกค้า
			$product ="product"; //ตารางสินค้าของร้าน
			$product_type ="product_type"; //ตารางประเภทสินค้า
			$ems = "ems"; // ตารางจัดส่งสินค้า
			$board_question = "board_question"; // ตารางคำถามเว็บบอร์ด
			$board_answer = "board_answer"; // ตารางคำตอบเว็บบอร์ด

?>