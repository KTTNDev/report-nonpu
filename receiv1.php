<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');
 
 
$pd_detail = $_POST['pd_detail'];
$der_id = $_POST['der_id'];
$der_name = $_POST['der_name'];
$admin_id = $_POST['admin_id'];
$st_id = $_POST['st_id'];
$rr_date = $_POST['rr_dete'];
$pd_number = $_POST['pd_number'];






$sql1 ="INSERT INTO tbl_report 
(
pd_detail,
der_id,
der_name,
admin_id,
rr_date,
pd_number
)
VALUES
(
'$pd_detail',
'$der_id',
'$der_name',
'$admin_id',
'$rr_date',
'$pd_number'
)
	 
 
	 		
	 ";
	
		$result1 = mysql_db_query($database_Repair, $sql1) or die("Error in query : $sql1" .mysql_error());


$sql ="UPDATE tbl_device_case SET
	 
		st_id=$st_id

		WHERE pd_number=$pd_number
	 		
	 ";
	
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();

 
		if($result){
			echo "<script>";
			echo "alert('ลงรับงานเรียบร้อยแล้ว');";
			echo "window.location ='new_case.php?act=2'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='new_case.php?act=2'; ";
			echo "</script>";
		}
		


?>
 