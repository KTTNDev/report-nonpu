<?php 
include('chklogin.php');
include('Bootstrap_sc.php');
?>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php include('banner.php');?>
    </div>
    <div class="col-md-3"> <br>
      <?php include('list2.php');?>
    </div>
    <div class="col-md-9"> <br>
      <div class="row">
      	<div class="col-sm-12" align="right">
        	<a href="logout.php" class="btn btn-danger btn-lg"> ออกจากระบบ </a>
            <br><br>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4"> <a href="member.php" class="btn btn-primary btn-lg" style="height:80px; width:230px"> จัดการข้อมูลผู้ใช้ <br>
          </a> </div>
        <div class="col-sm-4"> <a href="new_case.php" class="btn btn-primary btn-lg"  style="height:80px; width:230px"> ประวัติการแจ้ง <br>
          ปัญหาการใช้งาน </a> </div>
        <div class="col-sm-4"> <a href="#" class="btn btn-primary btn-lg"  style="height:80px; width:230px"> สถิติการแจ้งปัญหาการใช้งาน <br>
          คอมพิวเตอร์ </a> </div>
      </div>
      <div class="row"> <br>
        <br>
        <div class="col-sm-4"> <a href="#" class="btn btn-primary btn-lg" style="height:80px; width:230px"> รายงานการแจ้งปัญหา <br>
          การใช้คอมพิวเตอร์ </a> </div>
        <div class="col-sm-4"> <a href="#" class="btn btn-primary btn-lg" style="height:80px; width:230px"> รายงานสรุป <br>
          ผลการซ่อม </a> </div>
        <div class="col-sm-4"> <a href="status.php" class="btn btn-primary btn-lg" style="height:80px; width:230px"> สถานะการแจ้ง <br>
          ปัญหาคอมพิวเตอร์ </a> </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>