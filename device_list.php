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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsdev = 10;
$pageNum_rsdev = 0;
if (isset($_GET['pageNum_rsdev'])) {
  $pageNum_rsdev = $_GET['pageNum_rsdev'];
}
$startRow_rsdev = $pageNum_rsdev * $maxRows_rsdev;

mysql_select_db($database_Repair, $Repair);
$query_rsdev = "SELECT * FROM tbl_devices";
$query_limit_rsdev = sprintf("%s LIMIT %d, %d", $query_rsdev, $startRow_rsdev, $maxRows_rsdev);
$rsdev = mysql_query($query_limit_rsdev, $Repair) or die(mysql_error());
$row_rsdev = mysql_fetch_assoc($rsdev);

if (isset($_GET['totalRows_rsdev'])) {
  $totalRows_rsdev = $_GET['totalRows_rsdev'];
} else {
  $all_rsdev = mysql_query($query_rsdev);
  $totalRows_rsdev = mysql_num_rows($all_rsdev);
}
$totalPages_rsdev = ceil($totalRows_rsdev/$maxRows_rsdev)-1;

$queryString_rsdev = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsdev") == false && 
        stristr($param, "totalRows_rsdev") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsdev = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsdev = sprintf("&totalRows_rsdev=%d%s", $totalRows_rsdev, $queryString_rsdev);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1" class="table table-bordered">
  <tr class="info">
    <td width="5%">id</td>
    <td width="85%">ชื่อุปกรณ์</td>
    <td width="5%">แก้ไข</td>
    <td width="5%">ลบ</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rsdev['der_id']; ?></td>
      <td><?php echo $row_rsdev['der_name']; ?></td>
      <td><a href="device.php?der_id=<?php echo $row_rsdev['der_id']; ?>&act=edit" class="btn btn-warning btn-xs">แก้ไช</a></td>
      <td><a href="devices_del.php?der_id=<?php echo $row_rsdev['der_id'];?>" onclick="return confirm('ยืนยัน');" class="btn btn-danger btn-xs">ลบ</a></td>
    </tr>
    <?php } while ($row_rsdev = mysql_fetch_assoc($rsdev)); ?>
</table><table border="0">
  <tr>
    <td><?php if ($pageNum_rsdev > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsdev=%d%s", $currentPage, 0, $queryString_rsdev); ?>" class="btn btn-info btn-xs">
        First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsdev > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsdev=%d%s", $currentPage, max(0, $pageNum_rsdev - 1), $queryString_rsdev); ?>" class="btn btn-info btn-xs">
        Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsdev < $totalPages_rsdev) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsdev=%d%s", $currentPage, min($totalPages_rsdev, $pageNum_rsdev + 1), $queryString_rsdev); ?>" class="btn btn-info btn-xs">
        Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_rsdev < $totalPages_rsdev) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsdev=%d%s", $currentPage, $totalPages_rsdev, $queryString_rsdev); ?>" class="btn btn-info btn-xs">
        Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($rsdev);
?>
