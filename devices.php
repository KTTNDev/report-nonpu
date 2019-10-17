<form action="devices_add.php" method="POST"  name="add" class="form-horizontal" id="add">
  <div class="form-group">
    <div class="col-sm-2" align="right"></div>
    <div class="col-sm-5" align="left"><b>เพิ่มอุปกรณ์</b></div>
  </div>
  <div class="form-group">
    <div class="col-sm-2" align="right">ชื่ออุปกรณ์</div>
    <div class="col-sm-9" align="left">
      <input  name="der_name" id="der_name" type="text" required class="form-control"  placeholder="ชื่ออุปกรณ์"   
        />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2"> </div>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-primary"  id="btn"> <span class="glyphicon glyphicon-plus"></span>เพิ่มข้อมูล </button>
      <input name="m_level" type="hidden"  value="m" />
    </div>
  </div>
</form>
