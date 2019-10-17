<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$st_id = $_POST['st_id'];
$st_name = $_POST['st_name'];

$sql ="UPDATE tbl_status SET
	 
		st_name='$st_name'
		
		WHERE st_id=$st_id
	 		
	 ";
		
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='status.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='status.php'; ";
			echo "</script>";
		}
		
?>
 