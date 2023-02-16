<?php require_once 'inc/topHeader.php'; ?>
<title>لوحة التحكم - <?php echo SITENAME ?></title>
<?php
 if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])){
               $id = (int)$_GET['id'];
                $post = $post->displayPost2("WHERE `id` = '{$id}'");
                 $user = $users->checkUserProfile($post[0]['id-user']);
                 $rows = editEmail($email,$id);
            }
           
?>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>




<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addPayment'])){
                $payments->setPostValue($_POST['idProdu'] , $_POST['price'] , $_POST['idUser'],$_POST['link']);
                $payments->displayAddError();
            }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-play"></i> تعديل حالة الدفعة</h1>
      <div class="col-md-12">
          <div class="row">
            <div class="col-md-10">
                <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id; ?>" method="POST" class="form-horizontal"
                      enctype="multipart/form-data">
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">اسم المنتج</label>
                <div class="col-sm-7">
                    <p class="form-control-static"><?php echo $post[0]['title'];?></p>
                    <input type="hidden" name="idProdu" id="idProdu" value="<?php echo $post[0]['id']; ?>"/>
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">سعر المنتوج</label>
                <div class="col-sm-3">
                     <p class="form-control-static"><?php echo $post[0]['price']." دولار";?></p>
                     <input type="hidden" name="price" id="price" value="<?php echo $post[0]['price']; ?>"/>
                </div>
              </div>

              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">قسم المنتج</label>
                <div class="col-sm-3">
                     <p class="form-control-static"><?php echo $category->getCateNameById($post[0]['category']);?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">اسم المشتري: </label>
                <div class="col-sm-3">
                     <p class="form-control-static"><?php echo $user['farstname']." ".$user['lastname'] ?></p>
                     <input type="hidden" name="idUser" id="idUser" value="<?php echo $user['id']; ?>"/>
                </div>
              </div>
              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">ايميل المشتري:  </label>
                <div class="col-sm-3">
                     <p class="form-control-static"><?php echo $user['email'];?></p>
                </div>
              </div>
              <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">رابط الشراء</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="link" name="link" placeholder="ضع رابط الدفع هنا"> 
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" name="addPayment" id="addPayment" class="btn btn-block btn-success">طلب الدفع</button>
                </div>
              </div>
            </form>
            </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>