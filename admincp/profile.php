<?php require_once 'inc/topHeader.php'; ?>
<title>الملف الشخصي- <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12 main">
      <?php
        if(isset($_GET['delete'])){
            $id = (int)$_GET['delete'];
            $post->deletePost($id);
        }
      ?>
  </div>
      <h1 class="page-header"><i class="glyphicon glyphicon-folder-open"></i> الملف الشخصي</h1>
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body" style="padding: 0">
                <ul class="list-group" style="margin-bottom: 0">
                    <li class="list-group-item">الإسم : <?php echo $_SESSION['user']['fname'] .' ' . $_SESSION['user']['lname'];?></li>
                    <li class="list-group-item">البريد : <?php echo $_SESSION['user']['email']?></li>
                    <li class="list-group-item">الرتبة : <span class="btn btn-info btn-sm">مدير الموقع</span></li>
              </ul>
          </div>
            <div class="panel-footer">
                <a href="edit-user.php?id=<?php echo $_SESSION['user']['id']?>" class="pull-left btn btn-warning btn-sm">تعديل البيانات</a>
                <a href="../index.php?logout=true" class="pull-right btn btn-danger btn-sm">تسجيل الخروج</a>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr/>
        <div class="panel panel-primary">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="glyphicon glyphicon-film"></i> جديد فيديوهاتك بالموقع</h3>
          </div>
          <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الصورة</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center">مشاهدة</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $user_id = $_SESSION['user']['id'];
                        $rows = $post->displayPost("WHERE `user_id` = '$user_id' ORDER BY `id` DESC LIMIT 10"); 
                        $i=1;
                            if($rows != null):
                                foreach ($rows as $row):
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++;?></td>
                                <td><img src="../libs/uplaod/<?php echo $row['image'] ?>" width="52px" height="42px"/></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $category->getCateNameById($row['category']) ?></td>
                                <td><a href="../post.php?v=<?php echo $row['link'] ?>" class="btn btn-sm btn-info">مشاهده</a></td>
                                <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="profile.php?delete=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        <?php endforeach;
                            else:
                        ?>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>لا يوجد اية مواضيع بعد</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                  </div>
          </div>
        </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>


