<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$der_id = $_POST['der_id'];
$der_name = $_POST['der_name'];

$sql ="UPDATE tbl_devices SET
	 
		der_name='$der_name'

		WHERE der_id=$der_id
	 		
	 ";
	
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='device.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='device.php'; ";
			echo "</script>";
		}
		


?>
 