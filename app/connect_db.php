<?php
 error_reporting(0);
 error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Bangkok");

$con = mysqli_connect(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME'],
    $_ENV['DB_PORT']
);

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
