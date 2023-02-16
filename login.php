<?php require_once 'inc/topHeader.php'; ?>
<title>تسجيل الدخول - <?php echo SITENAME;?></title>
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
                if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login'])){
                    $login = new Login;
                    $login->setInput($_POST['email'], $_POST['password']);
                    $login->DisplayError();
                }
              ?>
          </div>
          <div class="col-md-6 col-md-offset-3" style="background: #313131;border: solid 1px #37225F;margin-bottom: 20px;">
            <div class="page-header">
                <h1 style="font-size: 32px;"><i class="glyphicon glyphicon-log-in"></i> تسجيل الدخول</h1>
            </div>
              <?php
              if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE){
                  Messages::setMsg('تنبية', 'انت مسجيل دخويل بالفعل يا ' . $_SESSION['user']['fname'] .' '.$_SESSION['user']['lname'], 'warning');
                  echo Messages::getMsg();
              }else{
                  require_once 'inc/forms/login.php';
              }
              ?>
  </div>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>