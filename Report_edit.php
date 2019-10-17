<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$rr_id = $_POST['rr_id'];
$pd_number = $_POST['pd_number'];
$der_name = $_POST['der_name'];
$pd_detail = $_POST['pd_detail'];
$rr_date = $_POST['rr_date'];
$status = $_POST['status'];
$rr_datel = $_POST['rr_datel'];
$admin_id = $_POST['admin_id'];

$sql ="UPDATE tbl_report SET
	 
		der_name='$der_name',
		pd_number='$pd_number',
		pd_detail='$pd_detail',
		rr_date='$rr_date',
		status='$status',
		rr_datel='$rr_datel',
		admin_id='$admin_id'
		
		WHERE rr_id=$rr_id
	 		
	 ";
	
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='Report.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='Report.php'; ";
			echo "</script>";
		}
		
?>
 