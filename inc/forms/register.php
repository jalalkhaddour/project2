<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal" style="padding: 15px;
    background: #8D8B95;
    margin-bottom: 15px;
    border-radius: 5px;
    border: solid 1px #37225F;">
<div class="form-group">
<label for="farstname" class="col-sm-4 control-label">الاسم الأول</label>
<div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo isset($_POST['farstname']) ? $_POST['farstname']: null; ?>" name="farstname" id="farstname" placeholder="ادخل الاسم الاول">
</div>
</div>
<div class="form-group">
<label for="lastname" class="col-sm-4 control-label">الاسم الاخير</label>
<div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname']: null; ?>" name="lastname" id="lastname" placeholder="ادخل الاسم الاخير">
</div>
</div>
<div class="form-group">
<label for="email" class="col-sm-4 control-label">البريد الالكتروني</label>
<div class="col-sm-6">
    <input type="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email']: null; ?>" name="email" id="email" placeholder="ادخل البريد الالكتروني">
</div>
</div>
<div class="form-group">
<label for="password" class="col-sm-4 control-label">كلمة المرور</label>
<div class="col-sm-5">
    <input type="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password']: null; ?>" name="password" id="password" placeholder="ادخل كلمة المرور">
</div>
</div>

<div class="form-group">
<label for="confirm" class="col-sm-4 control-label">تأكيد كلمة المرور</label>
<div class="col-sm-5">
    <input type="password" class="form-control" value="<?php echo isset($_POST['confirm']) ? $_POST['confirm']: null; ?>" name="confirm" id="confirm" placeholder="ادخل تأكيد كلمة المرور">
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-4 col-sm-8">
    <button type="submit" name="register" class="btn btn-success btn-block">تسجيل عضوية جديدة</button>
</div>
</div>
</form>