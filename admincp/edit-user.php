<?php require_once 'inc/topHeader.php';
$id = (int)$_GET['id'];
$user = $users->checkUserProfile($id);

?>
<title>تعديل بيانات العضو- <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-sm-12 main" style="padding: 0">
          <?php
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
                $users->setInput($_POST['farstname'] , $_POST['lastname'] , $_POST['email'] , $_POST['password'] , $_POST['confirm'] , $id , $_POST['role']);
                $users->DisplayError();
          }
          ?>
    </div>
      <h1 class="page-header"><i class="glyphicon glyphicon-user"></i> تعديل البيانات</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal" style="padding: 15px;
                background: #8D8B95;
                margin-bottom: 15px;
                border-radius: 5px;
                border: solid 1px #37225F;">
            <div class="form-group">
            <label for="farstname" class="col-sm-4 control-label">الاسم الأول</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="<?php echo isset($_POST['farstname']) ? $_POST['farstname']: $user['farstname']; ?>" name="farstname" id="farstname" placeholder="ادخل الاسم الاول">
            </div>
            </div>
            <div class="form-group">
            <label for="lastname" class="col-sm-4 control-label">الاسم الاخير</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname']: $user['lastname']; ?>" name="lastname" id="lastname" placeholder="ادخل الاسم الاخير">
            </div>
            </div>
            <div class="form-group">
            <label for="email" class="col-sm-4 control-label">البريد الالكتروني</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email']: $user['email']; ?>" name="email" id="email" placeholder="ادخل البريد الالكتروني">
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
            <label for="role" class="col-sm-4 control-label">تغيير الرتبة</label>
            <div class="col-sm-5">
                <select class="form-control" name="role" id="role">
                    <option value="1" <?php echo ($user['isAdmin'] == TRUE ? 'selected' : NULL) ?>>مدير</option>
                    <option value="0" <?php echo ($user['isAdmin'] == FALSE ? 'selected' : NULL) ?>>عضو</option>
                </select>
            </div>
            </div>
                
                
            <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" name="register" class="btn btn-warning btn-block">تعديل البيانات</button>
            </div>
            </div>
            </form>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>


