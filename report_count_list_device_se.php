<?php require_once('Connections/Repair.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_Repair, $Repair);
$query_device = "
SELECT * FROM tbl_devices ORDER BY der_id ASC";
$device = mysql_query($query_device, $Repair) or die(mysql_error());
$row_device = mysql_fetch_assoc($device);
$totalRows_device = mysql_num_rows($device);
?>
 
<b>
<font color="red">
ระหว่างวันที่   <?php echo date('d/m/Y',strtotime($_GET['ds']));?>
ถึง
วันที่ <?php echo date('d/m/Y',strtotime($_GET['de']));?>
</font>
</b>
<br>
<table border="1" class="table table-bordered">
  <tr class="info">
    <td width="15%" align="center">รหัสอุปกรณ์</td>
    <td width="50%">ชื่ออุปกรณ์</td>
    <td width="20%">จำนวนครั้งที่แจ้งซ่อม</td>
    
  </tr>
  <?php do { ?>
    <tr>
      <td align="center"><?php echo $row_device['der_id']; ?></td>
      <td><?php echo $row_device['der_name']; ?></td>
       <td align="center">
	   <?php  
	$ds = $_GET['ds'];
	$de = $_GET['de'];
	$der_id = $row_device['der_id'];
	$sqlx = "select COUNT(der_id)as ccder   from tbl_device_case 
	where der_id=$der_id 
	AND pd_date >='$ds' AND pd_date <='$de'";
	$resultx = mysql_db_query($database_Repair, $sqlx);
	$row = mysql_fetch_array($resultx);
	echo $row['ccder'];   
	   ?>
       ครั้ง  
       </td>
    </tr>
    <?php } while ($row_device = mysql_fetch_assoc($device)); ?>
</table>
 
<?php
mysql_free_result($device);
?>
