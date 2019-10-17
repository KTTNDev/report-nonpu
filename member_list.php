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

$maxRows_rsm = 10;
$pageNum_rsm = 0;
if (isset($_GET['pageNum_rsm'])) {
  $pageNum_rsm = $_GET['pageNum_rsm'];
}
$startRow_rsm = $pageNum_rsm * $maxRows_rsm;

mysql_select_db($database_Repair, $Repair);
$query_rsm = "SELECT * FROM tbl_admin";
$query_limit_rsm = sprintf("%s LIMIT %d, %d", $query_rsm, $startRow_rsm, $maxRows_rsm);
$rsm = mysql_query($query_limit_rsm, $Repair) or die(mysql_error());
$row_rsm = mysql_fetch_assoc($rsm);

if (isset($_GET['totalRows_rsm'])) {
  $totalRows_rsm = $_GET['totalRows_rsm'];
} else {
  $all_rsm = mysql_query($query_rsm);
  $totalRows_rsm = mysql_num_rows($all_rsm);
}
$totalPages_rsm = ceil($totalRows_rsm/$maxRows_rsm)-1;

$queryString_rsm = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsm") == false && 
        stristr($param, "totalRows_rsm") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsm = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsm = sprintf("&totalRows_rsm=%d%s", $totalRows_rsm, $queryString_rsm);
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
    <td width="20%">ชื่อ-สกุล</td>
    <td width="10%">user</td>
    <td width="10%">password</td>
    <td width="10%">เบอร์โทร</td>
    <td width="10%">อีเมล์</td>
    <td width="5%">แก้ไข</td>
    <td width="5%">ลบ</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rsm['admin_id']; ?></td>
      <td><?php echo $row_rsm['admin_initail']; ?><?php echo $row_rsm['admin_name']; ?>&nbsp; <?php echo $row_rsm['admin_lname']; ?></td>
      <td><?php echo $row_rsm['admin_user']; ?></td>
      <td><?php echo $row_rsm['admin_pass']; ?></td>
      <td><?php echo $row_rsm['admin_tell']; ?></td>
      <td><?php echo $row_rsm['admin_email']; ?></td>
      <td align="center">
      <a href="member.php?admin_id=<?php echo $row_rsm['admin_id'];?>&act=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td align="center">
      <a href="admin_del.php?admin_id=<?php echo $row_rsm['admin_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยัน')">ลบ</a></td>
    </tr>
    <?php } while ($row_rsm = mysql_fetch_assoc($rsm)); ?>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_rsm > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsm=%d%s", $currentPage, 0, $queryString_rsm); ?>">First</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsm > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsm=%d%s", $currentPage, max(0, $pageNum_rsm - 1), $queryString_rsm); ?>">Previous</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsm < $totalPages_rsm) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsm=%d%s", $currentPage, min($totalPages_rsm, $pageNum_rsm + 1), $queryString_rsm); ?>">Next</a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_rsm < $totalPages_rsm) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsm=%d%s", $currentPage, $totalPages_rsm, $queryString_rsm); ?>">Last</a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($rsm);
?>
