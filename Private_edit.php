<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$pd_number = $_POST['pd_number'];
$der_id = $_POST['der_id'];
$der_name = $_POST['der_name'];
$pd_detail = $_POST['pd_detail'];
$pd_date = $_POST['pd_date'];
$pd_intail = $_POST['pd_intail'];
$pd_name = $_POST['pd_name'];
$pd_lname = $_POST['pd_lname'];
$pd_position = $_POST['pd_position'];
$pd_tell = $_POST['pd_tell'];
$pd_email = $_POST['pd_email'];

$sql ="UPDATE tbl_private_devices SET
	 
		der_name='$der_name',
		der_id='$der_id',
		pd_detail='$pd_detail',
		pd_date='$pd_date',
		pd_intail='$pd_intail',
		pd_name='$pd_name',
		pd_lname='$pd_lname',
		pd_position='$pd_position',
		pd_tell='$pd_tell',
		pd_email='$pd_email'
		
		WHERE pd_number=$pd_number
	 		
	 ";
		
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='Private.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='Private.php'; ";
			echo "</script>";
		}
?>
 