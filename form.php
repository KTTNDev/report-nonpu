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

    </div>
    
    <div class="col-md-9">
    	 <form action="form_db.php" method="POST"  name="add" class="form-horizontal" id="add">
       <div class="form-group">
       <div class="col-sm-2" align="right"></div>
        <div class="col-sm-5" align="left"><h4> <br>
         แบบฟอร์มการแจ้งซ่อม </h4>
        </div>
      </div>
       <div class="form-group">
        <div class="col-sm-2" align="right">เลขที่รับแจ้ง</div>
          <div class="col-sm-1" align="left">
             <input type="text" disabled value="<?php echo $row_lastid['pd_number']+1; ?>" class="form-control">
          </div>
      </div>
        <div class="form-group">
        <div class="col-sm-2" align="right">คำนำหน้าชื่อ</div>
          <div class="col-sm-2" align="left">
            <select name="pd_intail" id="pd_intail" class="form-control">
              <option value="นาย">นาย</option>
              <option value="นางสาว">นางสาว</option>
              <option value="นาง">นาง</option>
              <option value="อาจารย์">อาจารย์</option>
            </select>
          </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2" align="right">ชื่อ</div>
          <div class="col-sm-4" align="left">
            <input  name="pd_name" id="pd_name" type="text" required class="form-control"  placeholder="ชื่อ"   
            minlength="2" />
          </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2" align="right">นามสกุล</div>
          <div class="col-sm-4" align="left">
            <input  name="pd_lname" id="pd_lname" type="text" required class="form-control"  placeholder="นามสกุล"   
            minlength="2" />
          </div>
      </div>
       <div class="form-group">
        <div class="col-sm-2" align="right">ตำแหน่ง</div>
          <div class="col-sm-4" align="left">
            <select name="pd_position" id="pd_position" class="form-control">
              <option value="นักศึกษา">นักศึกษา</option>
              <option value="อาจารย์">อาจารย์</option>
            </select>
          </div>
      </div>
       <div class="form-group">
        <div class="col-sm-2" align="right">เบอร์โทรศัพท์</div>
          <div class="col-sm-4" align="left">
            <input  name="pd_tell" id="pd_tell" type="text" required class="form-control"   
            placeholder="เบอร์โทรศัพท์"  pattern="^[0-9]+$" minlength="2" maxlength="10"/>
          </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-2" align="right">อีเมล์</div>
          <div class="col-sm-4" align="left">
            <input  name="pd_email" id="pd_tell" type="email" required class="form-control"   
            placeholder="email"/>
          </div>
      </div>
      
             <div class="form-group">
        <div class="col-sm-2" align="right">อุปกรณ์ที่มี</div>
          <div class="col-sm-4" align="left">
            <select name="device"  class="form-control" required>
              <option value="">-เลือก-</option>
              <?php
do {  
?>
              <option value="<?php echo $row_derid['der_id']?>-<?php echo $row_derid['der_name']?>">
			  <?php echo $row_derid['der_name']?></option>
              <?php
} while ($row_derid = mysql_fetch_assoc($derid));
  $rows = mysql_num_rows($derid);
  if($rows > 0) {
      mysql_data_seek($derid, 0);
	  $row_derid = mysql_fetch_assoc($derid);
  }
?>
            </select>
          </div>
      </div>
      
       <div class="form-group">
        <div class="col-sm-2" align="right">อาการเสีย</div>
          <div class="col-sm-5" align="left">
            <textarea name="pd_detail" id="pd_detail" class="form-control" required></textarea>
          </div>
      </div>
  <!--      
         <div class="form-group">
        <div class="col-sm-2" align="right">CODE</div>
          <div class="col-sm-2" align="left">
             ปป
          </div>
          <div class="col-sm-2" align="left">
             ปป
          </div>
          <div class="col-sm-2" align="left">
             พิมพ์ระหัส CODE
          </div>
          <div class="col-sm-2" align="left">
             ปป
          </div>
      </div>
        
-->        
       <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary"  id="btn">
          <span class="glyphicon glyphicon-plus"></span> ยืนยันการแจ้งซ่อม
           </button>
           &nbsp;
           <a href="index.php" class="btn btn-danger"> ยกเลิก </a>
          </div>
           
          </div>
      </form>
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
