<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');


$admin_id = $_POST['admin_id'];
$admin_name = $_POST['admin_name'];
$admin_lname = $_POST['admin_lname'];
$admin_user = $_POST['admin_user'];
$admin_pass = $_POST['admin_pass'];
$admin_tell = $_POST['admin_tell'];
$admin_email = $_POST['admin_email'];


$sql ="UPDATE tbl_admin SET
	 
		admin_name='$admin_name',
		admin_lname='$admin_lname',
		admin_user='$admin_user',
		admin_pass='$admin_pass',
		admin_tell='$admin_tell',
		admin_email='$admin_email'
		
		WHERE admin_id=$admin_id
	 		
	 ";
	
		
		$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='member.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='member.php'; ";
			echo "</script>";
		}
		


?>
 