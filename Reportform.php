<?php include('Bootstrap_sc.php');?>
 <body>
 <div class="container">
      <div class="row">
      <?php include('nevbar.php');?>
        <br><br><br>
        <div class="col-md-3">
        <?php include('list.php');?></div>
        <div class="col-md-9">
      
        <form action="Report_add.php" method="POST"  name="add" class="form-horizontal" id="add">
       <div class="form-group">
       <div class="col-sm-2" align="right"></div>
        <div class="col-sm-5" align="left"><b>เพิ่มรายละเอียดการซ่อม</b></div>
      </div>
      <div class="form-group">
        <div class="col-sm-2" align="right">ชื่ออุปกรณ์</div>
          <div class="col-sm-4" align="left">
            <input  name="der_name" id="der_name" type="text" required class="form-control"   placeholder="ชื่ออุปกรณ์" 
              minlength="2"/>
          </div>
      </div>
       <div class="form-group">
        <div class="col-sm-2" align="right">รายละเอียดการแจ้ง</div>
          <div class="col-sm-4" align="left">
           <textarea name="pd_detail" id="pd_detail" cols="50" rows="3" required></textarea>   
            </div>
      </div>
      <div class="form-group">
          <div class="col-sm-2" align="right"> ว/ด/ป </div>
          <div class="col-sm-3" align="left">
            <input  name="rr_date" type="date" required class="form-control" id="rr_date" />
          </div>
          </div>
        <div class="form-group">
        <div class="col-sm-2" align="right">สถานะ</div>
          <div class="col-sm-2" align="left">
            <input  name="status" id="status" type="text" required class="form-control"   placeholder="สถานะ" 
              minlength="2"/>
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-2" align="right"> วันที่ซ่อม </div>
          <div class="col-sm-3" align="left">
            <input  name="rr_datel" type="date" required class="form-control" id="rr_datel" />
          </div>
          </div>
       <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary"  id="btn">
          <span class="glyphicon glyphicon-plus"></span>เพิ่มข้อมูล
           </button>
          <input name="m_level" type="hidden"  value="m" />
          </div>
           
          </div>
          </form>
        </div>
 
      </div>
    </div>
 


    
  </body>
</html>