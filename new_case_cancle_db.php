<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$st_id=4;
$pd_number = $_GET['pd_number'];

$sql ="UPDATE tbl_device_case SET st_id=$st_id WHERE pd_number=$pd_number ";
	
   $result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "window.location ='new_case.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "window.location ='new_case.php'; ";
			echo "</script>";
		}
?>
 