<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');

$admin_id = $_POST['admin_id'];
$st_id = $_POST['st_id'];
$rr_datel = date('Y-m-d');
$pd_number = $_POST['pd_number'];
$rr_repain_detial = $_POST['rr_repain_detial'];

$sql1 ="UPDATE tbl_report  SET
rr_datel='$rr_datel',
rr_repain_detial='$rr_repain_detial',
admin_id='$admin_id'
WHERE pd_number=$pd_number";
	
		$result1 = mysql_db_query($database_Repair, $sql1) or die("Error in query : $sql1" .mysql_error());
$sql ="UPDATE tbl_device_case SET
	
		st_id=$st_id
		WHERE pd_number=$pd_number
			
	";
	
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());
		mysql_close();
/*
echo $sql1;
echo "<hr>";
echo $sql;
exit;
*/
		
		if($result){
echo "<script>";
echo "alert('ส่งงานเรียบร้อยแล้ว');";
echo "window.location ='new_case.php?act=3'; ";
echo "</script>";
} else {

echo "<script>";
echo "alert('ERROR!');";
echo "window.location ='new_case.php?act=3'; ";
echo "</script>";
}

?>