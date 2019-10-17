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
$query_derid = "SELECT * FROM tbl_devices";
$derid = mysql_query($query_derid, $Repair) or die(mysql_error());
$row_derid = mysql_fetch_assoc($derid);
$totalRows_derid = mysql_num_rows($derid);

mysql_select_db($database_Repair, $Repair);
$query_lastid = "SELECT * FROM tbl_device_case ORDER BY pd_number DESC";
$lastid = mysql_query($query_lastid, $Repair) or die(mysql_error());
$row_lastid = mysql_fetch_assoc($lastid);
$totalRows_lastid = mysql_num_rows($lastid);
?>
<?php 
include('datatable.php');
include('Bootstrap_sc.php');
?>
<body>
<div class="container">
  <div class="row">
  	<div class="col-md-12">
    	<?php include('banner.php');?>
    </div>
    <div class="col-md-2">
    <br>
        <?php include('menu_left.php');?>

    </div>
    
    <div class="col-md-10">
    	<?php include('showlist_all.php');?>
    </div>
  </div> 
</div>
</body>
</html>
<?php
mysql_free_result($derid);

mysql_free_result($lastid);
?>
<?php include('footer.php');?>
