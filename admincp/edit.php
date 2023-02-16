<?php require_once 'inc/topHeader.php'; ?>
<title>تعديل الفيديو - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])){
               $id = (int)$_GET['id'];
                $post = $post->displayPost("WHERE `id` = '{$id}'");
            }
            
            
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editPost'])){
                if(isset($_FILES['image']) and $_FILES['image']['name'] != ''){
                    $image = $_FILES['image'];
                }else{
                    $image = NULL;
                }
                $post->setPostValue($_POST['title'], $_POST['price'],$_POST['desc'], $image, $_POST['category'] , "edit" , $_POST['id']);
                $post->DisplayError();
            }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-play"></i> تعديل المنتج</h1>
      <div class="col-md-12">
          <div class="row">
            <div class="col-md-10">
            <?php if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])): ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal"
                      enctype="multipart/form-data">
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">اسم المنتج</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="title" value="<?php echo $post[0]['title'];?>" id="title" placeholder="ادخل اسم المنتج">
                </div>
              </div>

              <div class="form-group">
                <label for="link" class="col-sm-2 control-label">سعر المنتج </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value="<?php echo $post[0]['price'];?>" name="price" id="price" placeholder="ادخل سعر المنتجً">
                </div>
              </div>

              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">الصورة </label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="image" id="image">
                </div>
              </div>

              <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">وصف المنتج</label>
                <div class="col-sm-10">
                    <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف للمنتج"><?php echo $post[0]['desc'];?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">اختر القسم</label>
                <div class="col-sm-4">
                    <select class="form-control" name="category" id="category">
                        <option value="">اختر القسم</option>
                        <?php foreach ($cate as $value):?>
                        <option value="<?php echo $value['id']; ?>" <?php if($post[0]['category'] == $value['id']){echo "selected";} ?>><?php echo $value['category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    <button type="submit" name="editPost" class="btn btn-block btn-warning">تعديل المنتج</button>
                </div>
              </div>
            </form>
            <?php elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editPost'])): ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal"
                      enctype="multipart/form-data">
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">العنوان</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" id="title" placeholder="ادخل اسم للمنتج">
                </div>
              </div>

              <div class="form-group">
                <label for="link" class="col-sm-2 control-label">سعر المنتج</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" name="price" id="price" placeholder="ادخل سعر المنتجً">
                </div>
              </div>

              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">الصورة </label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="image" id="image">
                </div>
              </div>

              <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">وصف المنتج</label>
                <div class="col-sm-10">
                    <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف للمنتج"><?php echo isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="category" class="col-sm-2 control-label">اختر القسم</label>
                <div class="col-sm-4">
                    <select class="form-control" name="category" id="category">
                        <option value="">اختر القسم</option>
                        <?php foreach ($cate as $value):?>
                        <option value="<?php echo $value['id']; ?>" <?php if(isset($_POST['category']) and $_POST['category'] == $value['id']){echo "selected";} ?>><?php echo $value['category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>"/>
                    <button type="submit" name="editPost" class="btn btn-block btn-warning">تعديل المنتج</button>
                </div>
              </div>
            </form>
            <?php else: header("Location: index.php");endif; ?>
                
                
            </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>