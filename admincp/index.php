<?php require_once 'inc/topHeader.php'; ?>
<title>لوحة التحكم - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      
           <?php
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete-reply'])){
                $id = (int)$_GET['delete-reply'];
                if($post->deletePostReply($id) == FALSE){
                    header("Location: index.php");
                }else{
                    echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
                    echo Messages::setMsg('تم', 'حذف التعليق بنجاح', 'success') . Messages::getMsg();
                    echo '</div>';
                }
            }
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete-post'])){
                $id = (int)$_GET['delete-post'];
                echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
                $post->deletePost($id , $_SERVER['PHP_SELF']);
                echo '</div>';
            }
          ?>
          
      
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> لوحة التحكم</h1>
      <div class="col-md-12">
          <div class="row">
          <div class="col-md-4">
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
         <div class="col-md-8">
          <div class="col-md-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title text-center">الاعضاء المسجلين</h3>
              </div>
              <div class="panel-body">
                  <h1 class="pull-right" style="color: #204d74"><i class="glyphicon glyphicon-user"></i> </h1>
                  <p class="pull-left" style="font-size: 24px; color: #122b40"><?php echo $users->usersCount(); ?></p>
                  <div class="clearfix"></div>
              </div>
                <div class="panel-footer text-center">
                    <i class="glyphicon glyphicon-eye-open"></i> <a href="users.php"> مشاهدة</a>
                </div>
            </div>
          </div>
              <div class="col-md-4">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title text-center">التعليقات</h3>
              </div>
              <div class="panel-body">
                  <h1 class="pull-right" style="color: #204d74"><i class="glyphicon glyphicon-comment"></i> </h1>
                  <p class="pull-left" style="font-size: 24px; color: #122b40"><?php echo $post->replysCount(); ?></p>
                  <div class="clearfix"></div>
              </div>
              <div class="panel-footer text-center">
                  <i class="glyphicon glyphicon-eye-open"></i> <a href="comments.php"> مشاهدة</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title text-center">المنتجات</h3>
              </div>
              <div class="panel-body">
                  <h1 class="pull-right" style="color: #204d74"><i class="glyphicon glyphicon-shopping-cart"></i> </h1>
                  <p class="pull-left" style="font-size: 24px; color: #122b40"><?php echo $post->postsCount(); ?></p>
                  <div class="clearfix"></div>
              </div>
                <div class="panel-footer text-center">
                    <i class="glyphicon glyphicon-eye-open"></i> <a href="tubes.php"> مشاهدة</a>
                </div>
            </div>
          </div>
          </div>
              
         <div class="clearfix"></div>
         <hr/>
         
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <div class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i> جديد المنتجات</div>
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
              $rows = $post->displayPost("ORDER BY `id` DESC LIMIT 10"); 
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
                      <td><a href="index.php?delete-post=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
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
         
<div class="clearfix"></div>
         <hr/>
         
         <div class="panel panel-default">
             <div class="panel-heading">
                 <div class="panel-title"><i class="glyphicon glyphicon-comment"></i> جديد التعليقات</div>
             </div>
             <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">التعليق</th>
                                <th class="text-center">مشاهدة</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $rows = $post->displayreply("ORDER BY `id` DESC LIMIT 5"); 
                        $i=1;
                            if($rows != null):
                                foreach ($rows as $row):
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $post->getUserNameById($row['user_id']); ?></td>
                                <td><?php echo (mb_strlen($row['comment'] , 'utf8') > 50 ? mb_substr($row['comment'],0,50) .' ...' : $row['comment']) ?></td>
                                <td><a href="../post.php?v=<?php echo $post->getLinkPostById($row['post_id']); ?>" class="btn btn-sm btn-info" target="_blank">مشاهده</a></td>
                                <td><a href="index.php?delete-reply=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        <?php endforeach;
                            else:
                        ?>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td>لا يوجد اية تعليقات بعد</td>
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
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>


