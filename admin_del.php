<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');
$admin_id = $_GET['admin_id'];

$sql ="DELETE FROM tbl_admin WHERE admin_id=$admin_id ";	
		
   $result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "window.location ='member.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "window.location ='member.php'; ";
			echo "</script>";
		}
		


?>
 