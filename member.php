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
      <div class="col-sm-6"> <h4> จัดการช่าง  
      <a href="member.php?act=add" class="btn btn-primary btn-xs"> + ช่าง</a></h4> </div>
      	<div class="col-sm-6" align="right">         
        </div>
        <div class="col-sm-12">
        <?php 
		$act = $_GET['act'];
		if($act =='add'){
			include('admin_form.php');
		}elseif($act=='edit'){
			include('admin_form_edit.php');
		}else{
			include('member_list.php');
		}
		?>
        </div>
        
      </div>
</div>
</body>
</html>