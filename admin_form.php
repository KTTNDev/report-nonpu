<form action="admin_add.php" method="POST"  name="add" class="form-horizontal" id="add">
        <div class="form-group">
          <div class="col-sm-2" align="right"></div>
          <div class="col-sm-5" align="left"><b>เพิ่มผู้ดูแลระบบ</b></div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">คำนำหน้าชื่อ</div>
          <div class="col-sm-2" align="left">
            <select name="admin_initail" id="admin_initail" required class="form-control"> 
              <option value="นาย">นาย</option>
              <option value="นางสาว">นางสาว</option>
              <option value="นาง">นาง</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">ชื่อ</div>
          <div class="col-sm-4" align="left">
            <input  name="admin_name" id="admin_name" type="text" required class="form-control"  placeholder="ชื่อ"   
            minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">นามสกุล</div>
          <div class="col-sm-4" align="left">
            <input  name="admin_lname" id="admin_lname" type="text" required class="form-control"  placeholder="นามสกุล"   
            minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">Username</div>
          <div class="col-sm-4" align="left">
            <input  name="admin_user" id="admin_user" type="text" required class="form-control"  placeholder="Username"   
            pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">Password</div>
          <div class="col-sm-4" align="left">
            <input  name="admin_pass" id="admin_pass" type="password" required class="form-control"  placeholder="Password"   
            pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">เบอร์โทรศัพท์</div>
          <div class="col-sm-4" align="left">
            <input  name="admin_tell" id="admin_tell" type="text" required class="form-control"  placeholder="เบอรโทรศัพท์"   
            pattern="^[0-9]+$" minlength="2" maxlength="10" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2" align="right">Email</div>
          <div class="col-sm-5" align="left">
            <input  name="admin_email" id="admin_email" type="email"  class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2"> </div>
          <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"  id="btn"> <span class="glyphicon glyphicon-plus"></span>เพิ่มข้อมูล </button>
          </div>
        </div>
      </form>