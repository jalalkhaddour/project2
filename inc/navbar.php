<nav style="margin-bottom: 0px">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="."><span><img src="libs/image/logo.png" width="30" /> <?php echo SITENAME;?></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="."><i class="glyphicon glyphicon-home"></i> الرئيسية <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> أقسام الموقع <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <?php $cat = $category->DisplayCategory();
                foreach ($cat as $row):
              ?>
              <li><a href="category.php?cat=<?php echo $row['link'] ?>"><i class="glyphicon glyphicon-menu-left"></i> <?php echo $row['category']; ?></a></li>
              <?php endforeach;?>
          </ul>
        </li>
      </ul>
        <form action="search.php" method="GET" class="navbar-form navbar-right">
        <div class="form-group">
            <input type="text" name="search" class="form-control" style="background-color:#313131 ; color: wheat;" placeholder="ادخل اسم المنتج">
        </div>
        <button type="submit" style="background-color:#594A74 ; color: wheat;" class="btn btn-default">بحث</button>
      </form>
      <ul class="nav navbar-nav navbar-left">
          <?php if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == true): ?>
          <li style="margin-top: 14px; padding: 0px 15px; color: wheat; "><span>أهلا وسهلا بكـ يا <?php echo $_SESSION['user']['fname'].' '. $_SESSION['user']['lname']; ?> </span></li>
         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> الاعدادات <span class="caret"></span></a>
          <ul class="dropdown-menu" style="right: -75px;">
              <li><a href="profile.php?id=<?php echo $_SESSION['user']['id']; ?>"><i class="glyphicon glyphicon-edit"></i> تعديل الملف الشخصي</a></li>
            <li role="separator" class="divider"></li>
            <?php if($_SESSION['user']['isAdmin'] == TRUE): ?>
            <li><a href="admincp/index.php"><i class="glyphicon glyphicon-dashboard"></i> لوحة التحكم</a></li>
            <?php endif; ?>
            <li><a href="index.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> تسجيل الخروج</a></li>
          </ul>
        </li>
          <?php else: ?>
          <li><a href="register.php"><i class="glyphicon glyphicon-user"></i> التسجيل</a></li>
          <li><a href="login.php"><i class="glyphicon glyphicon-log-in"></i> تسجيل الدخول</a></li>
          <?php endif; ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php  if($payments->getRowcountPaymentsById($_SESSION['user']['id']) >0):  ?>
<div class="alert alert-danger" role="alert">
  <a href="Payments.php" class="alert-link">لديك دفعات في الانتظار انقر هنا</a>
</div>
<?php endif; ?>