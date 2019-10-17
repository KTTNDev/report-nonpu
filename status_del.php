<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');
 
$st_id = $_GET['st_id'];

$sql ="DELETE FROM tbl_status WHERE st_id=$st_id ";
	
   $result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "window.location ='status.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "window.location ='status.php'; ";
			echo "</script>";
		}
		
?>
 