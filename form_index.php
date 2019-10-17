<?php include('Bootstrap_sc.php');?>
 <body>
 <div class="container">
      <div class="row">
      <?php include('nevbar.php');?>
        <br><br><br>
        <div class="col-md-3">
        <?php include('list.php');?></div>
        <div class="col-md-9">
      
        <form action="Private_add.php" method="POST"  name="add" class="form-horizontal" id="add">
       <div class="form-group">
       <div class="col-sm-2" align="right"></div>
        <div class="col-sm-5" align="left"><b>เพิ่มแจ้งปัญหาการใช้คอมพิวเตอร์</b></div>
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
            <input  name="pd_date" type="date" required class="form-control" id="pd_date" />
          </div>
          </div>
        <div class="form-group">
        <div class="col-sm-2" align="right">คำนำหน้าชื่อ</div>
          <div class="col-sm-2" align="left">
            <input  name="pd_intail" id="pd_intail" type="text" required class="form-control"   placeholder="คำนำหน้าชื่อ" 
              minlength="2"/>
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
            <input  name="pd_position" id="pd_position" type="text" required class="form-control"  placeholder="ตำแหน่ง"   
            minlength="2" />
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
        <div class="col-sm-2" align="right">Email</div>
          <div class="col-sm-5" align="left">
            <input  name="pd_email" id="pd_email" type="email"  class="form-control" />
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