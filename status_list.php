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
$query_rsstats = "SELECT * FROM tbl_status";
$rsstats = mysql_query($query_rsstats, $Repair) or die(mysql_error());
$row_rsstats = mysql_fetch_assoc($rsstats);
$totalRows_rsstats = mysql_num_rows($rsstats);
?>
<table border="1" class="table table-bordered">
  <tr class="info">
    <td width="5%">id</td>
    <td width="50%">ชื่อสถานะ</td>
    <td width="5%">แก้ไข</td>
    <td width="5%">ลบ</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rsstats['st_id']; ?></td>
      <td><?php echo $row_rsstats['st_name']; ?></td>
     <td align="center">
      <a href="status.php?st_id=<?php echo $row_rsstats['st_id'];?>&act=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td align="center">
      <a href="status_del.php?st_id=<?php echo $row_rsstats['st_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยัน')">ลบ</a></td>
    </tr>
    <?php } while ($row_rsstats = mysql_fetch_assoc($rsstats)); ?>
</table>

<?php
mysql_free_result($rsstats);
?>
