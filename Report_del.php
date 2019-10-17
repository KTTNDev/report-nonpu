<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$rr_id = $_GET['rr_id'];

$sql ="DELETE FROM tbl_report WHERE rr_id=$rr_id ";
	
   $result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "window.location ='Report.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "window.location ='Report.php'; ";
			echo "</script>";
		}
		
?>
 