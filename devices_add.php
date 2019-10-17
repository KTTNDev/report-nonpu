<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$der_name = $_POST['der_name'];

$sql ="INSERT INTO tbl_devices
		(
		der_name
		)		
		VALUES	
		(
		'$der_name'
		)";
	
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='device.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='device.php'; ";
			echo "</script>";
		}
		
?>
 