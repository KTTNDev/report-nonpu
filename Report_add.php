<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$der_name = $_POST['der_name'];
$pd_detail = $_POST['pd_detail'];
$rr_date = $_POST['rr_date'];
$status = $_POST['status'];
$rr_datel = $_POST['rr_datel'];

$sql ="INSERT INTO tbl_report
		(
		der_name,
		pd_detail,
		rr_date,
		status,
		rr_datel
		)		
		VALUES	
		(
		'$der_name',
		'$pd_detail',
		'$rr_date',
		'$status',
		'$rr_datel'
		)";
	
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='Report.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='Report.php'; ";
			echo "</script>";
		}

?>
 