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

$colname_edeve = "-1";
if (isset($_GET['der_id'])) {
  $colname_edeve = $_GET['der_id'];
}
mysql_select_db($database_Repair, $Repair);
$query_edeve = sprintf("SELECT * FROM tbl_devices WHERE der_id = %s", GetSQLValueString($colname_edeve, "int"));
$edeve = mysql_query($query_edeve, $Repair) or die(mysql_error());
$row_edeve = mysql_fetch_assoc($edeve);
$totalRows_edeve = mysql_num_rows($edeve);
?>
<form action="devices_edit.php" method="POST"  name="add" class="form-horizontal" id="add">
  <div class="form-group">
    <div class="col-sm-2" align="right"></div>
    <div class="col-sm-5" align="left"><b>แก้ไขอุปกรณ์</b></div>
  </div>
  <div class="form-group">
    <div class="col-sm-2" align="right">ชื่ออุปกรณ์</div>
    <div class="col-sm-9" align="left">
      <input  name="der_name" type="text" required class="form-control" id="der_name"  placeholder="ชื่ออุปกรณ์" value="<?php echo $row_edeve['der_name']; ?>"   
        />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2"> </div>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-primary"  id="btn"> <span class="glyphicon glyphicon-plus"></span>บันทึก  </button>
      <input name="der_id" type="hidden" id="der_id" value="<?php echo $row_edeve['der_id']; ?>" />
    </div>
  </div>
</form>
<?php
mysql_free_result($edeve);
?>
