<meta charset="utf-8">
<?php
require_once('Connections/Repair.php');


$admin_initail = $_POST['admin_initail'];
$admin_name = $_POST['admin_name'];
$admin_lname = $_POST['admin_lname'];
$admin_user = $_POST['admin_user'];
$admin_pass = $_POST['admin_pass'];
$admin_tell = $_POST['admin_tell'];
$admin_email = $_POST['admin_email'];


$sql ="INSERT INTO tbl_admin
		(
		admin_initail,
		admin_name,
		admin_lname,
		admin_user,
		admin_pass,
		admin_tell,
		admin_email
		)		
		VALUES	
		(
		'$admin_initail',
		'$admin_name',
		'$admin_lname',
		'$admin_user',
		'$admin_pass',
		'$admin_tell',
		'$admin_email'	
		)";
	
			$result = mysql_db_query($database_Repair, $sql) or die("Error in query : $sql" .mysql_error());

		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='member.php'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='member.php'; ";
			echo "</script>";
		}
		


?>
 