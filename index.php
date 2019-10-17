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
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
$_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['admin_user'])) {
$loginUsername=$_POST['admin_user'];
$password=$_POST['admin_pass'];
$MM_fldUserAuthorization = "";
$MM_redirectLoginSuccess = "admin.php";
$MM_redirectLoginFailed = "index.php";
$MM_redirecttoReferrer = false;
mysql_select_db($database_Repair, $Repair);

$LoginRS__query=sprintf("SELECT admin_user, admin_pass FROM tbl_admin WHERE admin_user=%s AND admin_pass=%s",
GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

$LoginRS = mysql_query($LoginRS__query, $Repair) or die(mysql_error());
$loginFoundUser = mysql_num_rows($LoginRS);
if ($loginFoundUser) {
$loginStrGroup = "";

  if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
//declare two session variables and assign them
$_SESSION['MM_Username'] = $loginUsername;
  $_SESSION['MM_UserGroup'] = $loginStrGroup;
if (isset($_SESSION['PrevUrl']) && false) {
  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
}
header("Location: " . $MM_redirectLoginSuccess );
}
else {
header("Location: ". $MM_redirectLoginFailed );
}
}
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
        <br>
        <?php $accesscheck=$_GET['accesscheck'];
            if($accesscheck!=''){
              echo "<font color='red'>";
              echo "กรุณา Login";
              echo "</font>";
        }?>
        <br>
        <h4 align="center">ADMIN LOGIN</h4>
        <form  name="formlogin" action="<?php echo $loginFormAction; ?>" method="POST" id="login" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <input  name="admin_user" type="text" required class="form-control" id="admin_user" placeholder="Username" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input name="admin_pass" type="password" required class="form-control" id="admin_pass" placeholder="Password" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success" id="btn" style="width: 100%"> <span class="glyphicon glyphicon-log-in"> </span> เข้าสู่ระบบ </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-10">
        <h3> ระบบแจ้งซ่อมออนไลน์ </h3>
        <?php  include('showlist_all.php');?>
      </div>
    </div>
  </div>
</body>
</html>
<tr><td ><label for="email">อีเมลหรือโทรศัพท์</label></td><td ><label for="pass">รหัสผ่าน</label></td></tr>
<?php include('footer.php');?>