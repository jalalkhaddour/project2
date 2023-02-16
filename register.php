<?php require_once 'inc/topHeader.php'; ?>
<title>تسجيل عضوية جديدة - <?php echo SITENAME;?></title>
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
                  $register = new Register();
        
                  $register->setInput($_POST['farstname'] , $_POST['lastname'] , $_POST['email'] , $_POST['password'] , $_POST['confirm']);
        
                  $register->DisplayError();
              }
              ?>
          </div>
          <div class="col-md-6 col-md-offset-3" style="background: #313131;border: solid 1px #37225F;margin-bottom: 20px;">
            <div class="page-header">
                <h1 style="font-size: 32px;"><i class="glyphicon glyphicon-user"></i> تسجيل عضوية جديدة<small>الرجاء تعبئة كافة الحقول</small></h1>
            </div>
            <?php
                if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE){
                    Messages::setMsg('تنبية', 'سجلاتنا تفيد بأنك يا ' . $_SESSION['user']['fname'] .' ' . $_SESSION['user']['lname'] .' مسجل بالفعل لدينا', 'info');
                    echo Messages::getMsg();
                }else{
                    require_once 'inc/forms/register.php';
                }
            ?>
          </div>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>