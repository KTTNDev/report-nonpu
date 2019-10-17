<?php 
include('chklogin.php');
include('Bootstrap_sc.php');
?>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12 hidden-print">
      <?php include('banner.php');?>
    </div>
    <div class="col-md-2 hidden-print"> <br>
      <?php include('list2.php');?>
    </div>
    <div class="col-md-9"> <br>
       <h4> รายงานสรุปผลการซ่อม (ซ่อมเสร็จเท่านั้น) </h4> 
        
<br>
<b> ดูข้อมูลตามช่วงเวลา </b><br>
<form action="" method="get" name="se" id="se">
เริ่ม : <input type="date" name="ds" required> 

สิ้นสุด : <input type="date" name="de" required>
<button type="submit" name="se" value="se" class="btn btn-primary btn-sm"> 
เรียกดู
</button>
</form>
<br>
       <?php 
	   $se = $_GET['se'];
	   if($se=='se'){
		include('showlist_all3.php');
	   }else{
	   include('showlist_all_com.php');
	   }
	   
	   
	   ?>
  </div>
</div>
</div>
</body>
</html>