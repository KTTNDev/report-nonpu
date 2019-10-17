<?php
include('chklogin.php');
include('Bootstrap_sc.php');
include('datatable.php');
?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php include('banner.php');?>
      </div>
      <div class="col-md-2"> <br>
        <?php include('list2.php');?>
      </div>
      <div class="col-md-10"> <br>
        <a href="new_case.php" class="btn btn-primary btn-xs"> งานซ่อมแจ้งเข้ามาใหม่ </a>
            ||
            <a href="new_case.php?act=2" class="btn btn-info btn-xs"> กำลังดำเนินการ </a>
            ||
            <a href="new_case.php?act=3" class="btn btn-success btn-xs"> ดำเนินการเสร็จแล้ว </a>
            ||
            <a href="new_case.php?act=4" class="btn btn-danger btn-xs"> ยกเลิก </a>
            <br />
        <?php include('new_case_list.php'); ?>
      </div>
    </div>
  </div>
</body>
</html>