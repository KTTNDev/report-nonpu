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

$colname_editst = "-1";
if (isset($_GET['st_id'])) {
  $colname_editst = $_GET['st_id'];
}
mysql_select_db($database_Repair, $Repair);
$query_editst = sprintf("SELECT * FROM tbl_status WHERE st_id = %s", GetSQLValueString($colname_editst, "int"));
$editst = mysql_query($query_editst, $Repair) or die(mysql_error());
$row_editst = mysql_fetch_assoc($editst);
$totalRows_editst = mysql_num_rows($editst);
?>
 <form action="status_edit.php" method="POST"  name="add" class="form-horizontal" id="add">
       <div class="form-group">
       <div class="col-sm-2" align="right"></div>
        <div class="col-sm-5" align="left"><b>ปรับปรุงสถานะการซ่อม</b></div>
      </div>
       <div class="form-group">
        <div class="col-sm-2" align="right">ชื่อสถานะ</div>
          <div class="col-sm-6" align="left">
            <input  name="st_name" type="text" required class="form-control" id="st_name"  placeholder="ชื่อสถานะ" value="<?php echo $row_editst['st_name']; ?>"   
            minlength="2" />
          </div>
      </div>
       <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary"  id="btn">
          <span class="glyphicon glyphicon-plus"></span> บันทึก 
           </button>
          <input name="st_id" type="hidden" id="st_id" value="<?php echo $row_editst['st_id']; ?>" />
          </div>
           
          </div>
          </form>
 <?php
mysql_free_result($editst);
?>
