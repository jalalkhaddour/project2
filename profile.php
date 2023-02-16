<?php require_once 'inc/topHeader.php';
    $id = (int)$_GET['id'];
    $user = $users->checkUserProfile($id);
?>
<title>تعديل الملف الشخصي- <?php echo SITENAME;?></title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
<?php require_once 'inc/header.php'; ?>
<!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
<!-- NAVBAR END ---->
<!-- HEADER START -->
<?php require_once 'inc/welcome.php'; ?>
<!-- HEADER END --->


<!-- INDEX MAIN -->

<main class="container">
  <div class="row">
      <article class="col-xs-12 col-md-12">
          <div class="col-md-6 col-md-offset-3" style="padding: 0">
              <?php
              if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
                    $users->setInput($_POST['farstname'] , $_POST['lastname'] , $_POST['email'] , $_POST['password'] , $_POST['confirm'] , null ,$_SESSION['user']['isAdmin']);
                    $users->DisplayError();
              }
              ?>
          </div>
          <div class="col-md-6 col-md-offset-3" style="background: #313131;border: solid 1px #37225F;margin-bottom: 20px;">
            <div class="page-header">
                <h1 style="font-size: 32px;"><i class="glyphicon glyphicon-user"></i> تعديل الملف الشخصي</h1>
            </div>
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
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" name="register" class="btn btn-warning btn-block">تعديل البيانات</button>
            </div>
            </div>
            </form>
          </div>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>