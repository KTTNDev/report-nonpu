<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$der_id = $_GET['der_id'];

$sql ="DELETE FROM tbl_devices WHERE der_id=$der_id ";
	
   $result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "window.location ='device.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "window.location ='device.php'; ";
			echo "</script>";
		}
?>
 