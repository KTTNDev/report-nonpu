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
    <div class="col-md-2"> <br>
      <?php include('list2.php');?>
    </div>
    <div class="col-md-9"> <br>
      <div class="row">
      <div class="col-sm-6"> <h4> จัดการอุปกรณ์ ||
      <a href="device.php?act=add" class="btn btn-primary btn-xs"> +อุปกรณ์ </a></h4> </div>
      	<div class="col-sm-6" align="right">         
        </div>
        <div class="col-sm-9">
        <?php 
		$act = $_GET['act'];
		if($act =='add'){
			include('devices.php');
		}elseif($act=='edit'){
			include('devices_edit_form.php');
		}else{
			include('device_list.php');
		}
		?>
        </div>
        
      </div>
</div>
</body>
</html>