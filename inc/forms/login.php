<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal" style="    padding: 15px;
                background: #8D8B95;
                margin-bottom: 15px;
                border-radius: 5px;
                border: solid 1px #37225F;">

            <div class="form-group">
            <label for="email" class="col-sm-4 control-label">البريد الالكتروني</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" name="email" id="email" placeholder="ادخل البريد الالكتروني">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-4 control-label">كلمة المرور</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="password" placeholder="ادخل كلمة المرور">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" name="login" class="btn btn-info btn-block">تسجيل الدخول</button>
            </div>
          </div>
        </form>