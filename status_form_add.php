 <form action="status_add.php" method="POST"  name="add" class="form-horizontal" id="add">
       <div class="form-group">
       <div class="col-sm-2" align="right"></div>
        <div class="col-sm-5" align="left"><b>เพิ่มสถานะการซ่อม</b></div>
      </div>
       <div class="form-group">
        <div class="col-sm-2" align="right">ชื่อสถานะ</div>
          <div class="col-sm-6" align="left">
            <input  name="st_name" id="st_name" type="text" required class="form-control"  placeholder="ชื่อสถานะ"   
            minlength="2" />
          </div>
      </div>
       <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary"  id="btn">
          <span class="glyphicon glyphicon-plus"></span>เพิ่มข้อมูล
           </button>
          </div>
           
          </div>
          </form>