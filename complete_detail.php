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

$colname_rsadm = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsadm = $_SESSION['MM_Username'];
}
mysql_select_db($database_Repair, $Repair);
$query_rsadm = sprintf("SELECT * FROM tbl_admin WHERE admin_user = %s", GetSQLValueString($colname_rsadm, "text"));
$rsadm = mysql_query($query_rsadm, $Repair) or die(mysql_error());
$row_rsadm = mysql_fetch_assoc($rsadm);
$totalRows_rsadm = mysql_num_rows($rsadm);

$pd_number = $_GET['pd_number'];

mysql_select_db($database_Repair, $Repair);
$query_formdetail = "
SELECT * FROM 
tbl_device_case as p , 
tbl_status as t, 
tbl_report as r, 
tbl_admin as a
WHERE p.pd_number=$pd_number 
AND p.st_id=t.st_id
AND p.pd_number=r.pd_number
AND r.admin_id=a.admin_id
";
$formdetail = mysql_query($query_formdetail, $Repair) or die(mysql_error());
$row_formdetail = mysql_fetch_assoc($formdetail);
$totalRows_formdetail = mysql_num_rows($formdetail);
?>
<?php 
include('Bootstrap_sc.php');
?>
<body>
<div class="container">
  <div class="row">
  	<div class="col-md-12 hidden-print">
    	<?php include('banner.php');?>
    </div>
    <div class="col-md-2 hidden-print">
    <br>
 
      <?php include('menu_left.php');?>
  </div>
    <div class="col-md-5 col-xs-12 col-sm-12">
    	 <form action="complete_db.php" method="POST"  name="add" class="form-horizontal" id="add">
       <div class="form-group">
       <div class="col-sm-2" align="right"></div>
        <div class="col-sm-10" align="left"><h4> <br>
         รายละเอียดการแจ้งซ่อม </h4>
        </div>
      </div>
       <div class="form-group">
        <div class="col-sm-3 col-xs-2" align="right">เลขที่รับแจ้ง</div>
          <div class="col-sm-3 col-xs-1" align="left">
             <input name="pd_number" type="text" class="form-control" value="<?php echo $row_formdetail['pd_number']; ?>" readonly>
          </div>
           <div class="col-sm-5 col-xs-2" align="left">
           <b> <font color="red"> สถานะ : <?php echo $row_formdetail['st_name']; ?> </font></b>
           </div>
      </div>
        <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">คำนำหน้าชื่อ</div>
          <div class="col-sm-5  col-xs-2" align="left">
            <select name="pd_intail" id="pd_intail" class="form-control" disabled>
              <?php
do {  
?>
              <option value="<?php echo $row_formdetail['pd_intail']?>"><?php echo $row_formdetail['pd_intail']?></option>
              <?php
} while ($row_formdetail = mysql_fetch_assoc($formdetail));
  $rows = mysql_num_rows($formdetail);
  if($rows > 0) {
      mysql_data_seek($formdetail, 0);
	  $row_formdetail = mysql_fetch_assoc($formdetail);
  }
?>
            </select>
          </div>
                  </div>
      <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">ชื่อ</div>
          <div class="col-sm-9  col-xs-4" align="left">
            <input  name="pd_name" type="text" disabled required class="form-control" id="pd_name"  placeholder="ชื่อ" value="<?php echo $row_formdetail['pd_name']; ?>"   
            minlength="2" />
          </div>
      </div>
      <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">นามสกุล</div>
          <div class="col-sm-9  col-xs-4" align="left">
            <input  name="pd_lname" type="text" disabled required class="form-control" id="pd_lname"  placeholder="นามสกุล" value="<?php echo $row_formdetail['pd_lname']; ?>"   
            minlength="2" />
          </div>
      </div>
       <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">ตำแหน่ง</div>
          <div class="col-sm-9 col-xs-5" align="left">
            <select name="pd_position" id="pd_position" class="form-control" disabled>
              <?php
do {  
?>
              <option value="<?php echo $row_formdetail['pd_position']?>"><?php echo $row_formdetail['pd_position']?></option>
              <?php
} while ($row_formdetail = mysql_fetch_assoc($formdetail));
  $rows = mysql_num_rows($formdetail);
  if($rows > 0) {
      mysql_data_seek($formdetail, 0);
	  $row_formdetail = mysql_fetch_assoc($formdetail);
  }
?>
            </select>
          </div>
       </div>
       <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">เบอร์โทรศัพท์</div>
          <div class="col-sm-9 col-xs-5" align="left">
            <input  name="pd_tell" type="text" disabled  class="form-control" value="<?php echo $row_formdetail['pd_tell']; ?>" />
          </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">อีเมล์</div>
          <div class="col-sm-9  col-xs-5" align="left">
            <input  name="pd_email" disabled required class="form-control" id="pd_tell"   
            placeholder="email" value="<?php echo $row_formdetail['pd_email']; ?>"/>
          </div>
      </div>
      
             <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">ชื่ออุปกรณ์</div>
          <div class="col-sm-9  col-xs-7" align="left">
            <select name="device"  class="form-control" disabled>
              <?php
do {  
?>
              <option value="<?php echo $row_formdetail['der_id']?>"><?php echo $row_formdetail['der_name']?></option>
              <?php
} while ($row_formdetail = mysql_fetch_assoc($formdetail));
  $rows = mysql_num_rows($formdetail);
  if($rows > 0) {
      mysql_data_seek($formdetail, 0);
	  $row_formdetail = mysql_fetch_assoc($formdetail);
  }
?>
            </select>
          </div>
      </div>
      
       <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">อาการเสีย</div>
          <div class="col-sm-9  col-xs-7" align="left">
            <textarea name="pd_detail" rows="4" readonly required class="form-control" id="pd_detail"><?php echo $row_formdetail['pd_detail']; ?></textarea>
         </div>
      </div>
      
             <div class="form-group">
        <div class="col-sm-3  col-xs-2" align="right">วันที่แจ้ง</div>
          <div class="col-sm-7  col-xs-3" align="left">
             <input type="text" class="form-control" disabled value="<?php echo date('d/m/Y',strtotime($row_formdetail['pd_date'])); ?>">
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
       <div class="form-group hidden-print">
      <div class="col-sm-3"> </div>
          <div class="col-sm-6">
          
           
          </div>
           
          </div>
      
    </div>
      <div class="col-md-4">
      <br><br><br>
      <h4> บันทึกการส่งงาน </h4> 
      
      <div class="form-group">
      <div class="col-sm-12">
        <label for="rr_repain_detial">รายละเอียดการซ่อม</label>
        <textarea name="rr_repain_detial" rows="2" disabled="disabled"  required class="form-control" id="rr_repain_detial"><?php echo $row_formdetail['rr_repain_detial'];?></textarea>
        
       <br>
       
       ซ่อมเสร็จเมื่อ : <?php echo date('d/m/Y',strtotime($row_formdetail['rr_datel']));?>
       <br>
       ผู้บันทึก/ผู้ซ่อม : <?php echo $row_formdetail['admin_name'].' '.$row_formdetail['admin_lname'];?>
       <br>
       <br>
       <a class="btn btn-primary" onClick="window.print()">พิมพ์</a>
      </div>
      </div>
      
      <div class="form-group">
      <div class="col-sm-12">
      <br>
      	 
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

mysql_free_result($rsadm);

mysql_free_result($formdetail);
?>
<?php include('footer.php');?>
