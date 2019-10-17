<?php
include('chklogin.php');
include('datatable.php');
include('Bootstrap_sc.php');
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
        <div class="row">
          <div class="col-sm-6"> 
             
            <a href="new_case.php" class="btn btn-primary btn-xs"> งานซ่อมแจ้งเข้ามาใหม่ </a>
            ||
            <a href="new_case.php?act=2" class="btn btn-info btn-xs"> กำลังดำเนินการ </a>
            ||
            <a href="new_case.php?act=3" class="btn btn-success btn-xs"> ดำเนินการเสร็จแล้ว </a>
            ||
            <a href="new_case.php?act=4" class="btn btn-danger btn-xs"> ยกเลิก </a>
          </div>
          <div class="col-sm-6" align="right">
          </div>
          <div class="col-sm-12">
            <?php
                $act = $_GET['act'];
                if($act =='add'){
                  include('status_form_add.php');
                }elseif($act=='edit'){
                  include('status_form_edit.php');
                }elseif($act=='2'){
                      include('new_case_list2.php');
                }elseif($act=='3'){
                  include('new_case_list3.php');
                }elseif($act=='4'){
                  include('new_case_list4.php');
                }else{
                  include('new_case_list.php');
                }
            ?>
          </div>
          
        </div>
      </div>
    </body>
  </html>