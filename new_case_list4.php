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

$maxRows_newsca = 100;
$pageNum_newsca = 0;
if (isset($_GET['pageNum_newsca'])) {
  $pageNum_newsca = $_GET['pageNum_newsca'];
}
$startRow_newsca = $pageNum_newsca * $maxRows_newsca;

mysql_select_db($database_Repair, $Repair);
$query_newsca = "
SELECT * FROM tbl_device_case as d, tbl_status  as t
WHERE d.st_id = 4 AND d.st_id=t.st_id ORDER BY d.pd_number DESC";
$query_limit_newsca = sprintf("%s LIMIT %d, %d", $query_newsca, $startRow_newsca, $maxRows_newsca);
$newsca = mysql_query($query_limit_newsca, $Repair) or die(mysql_error());
$row_newsca = mysql_fetch_assoc($newsca);

if (isset($_GET['totalRows_newsca'])) {
  $totalRows_newsca = $_GET['totalRows_newsca'];
} else {
  $all_newsca = mysql_query($query_newsca);
  $totalRows_newsca = mysql_num_rows($all_newsca);
}
$totalPages_newsca = ceil($totalRows_newsca/$maxRows_newsca)-1;

//include('datatable.php');
?>


<body>
<h4 style="color:red"> ยกเลิก  </h4>


 <table width="100%" border="1" cellspacing="0" class="display" id="example">
		<thead>
        <tr class="info">
    <th width="7%">จัดการ</th>
    <th width="7%">เลขแจ้ง</th>
    <th width="20%">อุปกรณ์/อาการ</th>
    <th width="10%">วันที่แจ้ง</th>
    <th width="15%">ผู้แจ้ง</td>
    <th width="10%">สถานะ</th>
  </tr>
  </thead>
  <?php if($totalRows_newsca > 0){ ?>
  <?php do { ?>
    <tr>
      <td align="center"><a href="form_detail.php?pd_number=<?php echo $row_newsca['pd_number']; ?>" target="_blank" class="btn btn-info btn-xs">รายละเอียด</a></td>
      <td align="center"><?php echo $row_newsca['pd_number']; ?></td>
      <td>
	  <font color="blue"> 
	  <?php // echo $row_newsca['der_id']; ?>
      </font>
       
          <?php echo $row_newsca['der_name']; ?>
       <br>
       <font color="red">
	  อาการ : <?php echo $row_newsca['pd_detail']; ?>
      </font>
      </td>
      <td><?php echo date('d/m/Y',strtotime($row_newsca['datesave'])); ?></td>
      <td><?php echo $row_newsca['pd_intail']; ?><?php echo $row_newsca['pd_name']; ?>&nbsp; <?php echo $row_newsca['pd_lname']; ?></td>
      <td><?php echo $row_newsca['st_name']; ?></td>
    </tr>
    <?php } while ($row_newsca = mysql_fetch_assoc($newsca)); ?>
    <?php } ?>
</table>

</body>
</html>
<?php
mysql_free_result($newsca);
?>
