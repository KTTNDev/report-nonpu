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
    <div class="col-md-7"> <br>
    <h4> สถิติการแจ้งปัญหาการใช้งานคอมพิวเตอร์ </h4> 
 
<b> ดูข้อมูลตามช่วงเวลา </b><br>
<form action="" method="get" name="se" id="se">
เริ่ม : <input type="date" name="ds" required> 

สิ้นสุด : <input type="date" name="de" required>
<button type="submit" name="se" value="se" class="btn btn-primary btn-sm"> 
เรียกดู
</button>
</form>
<br />
    <?php 
	 	$se = $_GET['se'];
	   if($se=='se'){
		include('report_count_list_device_se.php');
	   }else{
		   include('report_count_list_device.php');
	   }
	
	
	?>
    </div>
  </div>
</div>
</body>
</html>