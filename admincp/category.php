<?php require_once 'inc/topHeader.php';?>
<title>لوحة التحكم - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="col-sm-12" style="padding: 0">
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addCatgory'])){
                $category->addSetInput($_POST['name'], $_POST['link']);
                $category->displayAddError();
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['editCatgory'])){
                $category->editSetInput($_POST['name'], $_POST['link'] , $_POST['id']);
            }
            
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete'])){
                $category->deleteCategory($_GET['delete']);
            }
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['edit'])){
                $value = $category->getCategoryRow($_GET['edit']);
            }
          ?>
      </div>
      <h1 class="page-header"><i class="glyphicon glyphicon-list"></i> اقسام الموقع</h1>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-8">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم القسم</th>
                                <th class="text-center">الاسم الفريد</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(!empty($cate)):
                        $i = 1; foreach ($cate as $row):?>
                            <tr class="text-center">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['category'];?></td>
                                <td><?php echo $row['link'];?></td>
                                <td><a href="category.php?edit=<?php echo $row['id'];?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="category.php?delete=<?php echo $row['id'];?>" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        <?php endforeach;
                        else:?>
                            <td></td>
                            <td></td>
                            <td class="text-center">لا يوجد اي اقسام بعد</td>
                            <td></td>
                            <td></td>
                       <?php endif;
                        ?>
                        </tbody>
                    </table>
                  </div>
              </div>
              <div class="col-md-4">
                  <?php if(isset($_GET['edit'])): ?>
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form-horizontal"
                        style="background: #313131; color: #8D8B95; padding: 8px;border-radius: 4px"    
                    >
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">الاسم</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $value['category'] ?>" id="name" placeholder="ادخل اسم القسم">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="link" class="col-sm-4 control-label">الاسم الفريد</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo str_replace('-', ' ', $value['link']); ?>" name="link" id="link" placeholder="ادخل الاسم الفريد للرابط">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"/>
                        <button type="submit" name="editCatgory" class="btn btn-warning btn-block">تعديل القسم</button>
                    </div>
                  </div>
                </form>
                  <?php else: ?>
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form-horizontal">
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">الاسم</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" placeholder="ادخل اسم القسم">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="link" class="col-sm-4 control-label">الاسم الفريد</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="link" id="link" placeholder="ادخل الاسم الفريد للرابط">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" name="addCatgory" class="btn btn-success btn-block">اضافة القسم</button>
                    </div>
                  </div>
                </form>
                <?php endif; ?>
                  
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>