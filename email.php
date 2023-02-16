<?php require_once 'inc/topHeader.php'; ?>


     


<title> <?php echo SITENAME ; ?> </title>
<link rel="icon" type="image/x-icon" href="favicon.ico">

<?php require_once 'inc/header.php'; ?>
<!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
<!-- NAVBAR END ---->
<!-- HEADER START -->

<!-- HEADER END --->
<!-- INDEX MAIN -->
<?php
 if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['email'])){
               $id = (int)$_GET['email'];
                $post = $post->displayPost2("WHERE `id` = '{$id}'");
                 
            }
           
?>
<main class="container" style="background: #8D8B95;margin-bottom: 290px;">
  <div class="row">
  
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addEmail'])){
                 $payments->editEmail($_POST['email'],$_POST['idP']);
            }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-play"></i> طلب دفع منتج</h1>
      <div class="col-md-12">
          <div class="row">
            <div class="col-md-10">
                <form action="<?php echo $_SERVER['PHP_SELF'].'?email='.$id; ?>" method="POST" class="form-horizontal"
                      enctype="multipart/form-data">
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">اسم المنتج</label>
                <div class="col-sm-7">
                    <p class="form-control-static"><?php echo $post[0]['title'];?></p>
                    
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">سعر المنتوج</label>
                <div class="col-sm-3">
                     <p class="form-control-static"><?php echo $post[0]['price']." دولار";?></p>
                    
                </div>
              </div>

              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">قسم المنتج</label>
                <div class="col-sm-3">
                     <p class="form-control-static"><?php echo $category->getCateNameById($post[0]['category']);?></p>
                </div>
              </div>
              
           
              <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">ايميل الدفع</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php 
                    $p=$payments->displayPayments1($post[0]['id']); if(empty($p['0']['email'])){
                        echo "";
                    } else {
                        echo $p['0']['email'];
                    }
                        
                        ?>"> 
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="hidden" name="idP" id="idP" value="<?php echo $p['0']['id']; ?>"/>
                    <button type="submit" name="addEmail" id="addEmail" class="btn btn-block btn-success">اضافة او تعديل الايميل</button>
                </div>
              </div>
            </form>
            </div>
      </div>
    </div>
  </div>
</div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>


