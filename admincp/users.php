<?php require_once 'inc/topHeader.php'; ?>
<title>لوحة التحكم - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
          if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
             $users->deleteUser($_GET['delete']);
          }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-user"></i> الاعضاء المسجلين</h1>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم العضو</th>
                                <th class="text-center">البريد الالكتروني</th>
                                <th class="text-center">الرتبة</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $Allusers = $users->getAllUsers("ORDER BY `id` DESC LIMIT $per_page , ".ADMINPREPAGE."");
                                $i = 1;
                                foreach ($Allusers as $user):
                            ?>
                            <tr class="text-center">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $user['farstname'] .' '.$user['lastname'];?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><span class="btn btn-sm btn-<?php echo ($user['isAdmin'] == TRUE ? 'info' : 'primary') ?>"><?php echo ($user['isAdmin'] == TRUE ? 'مدير' : 'عضو') ?></span></td>
                                <td><a href="edit-user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-warning btn-sm">تعديل</a></td>
                                <td><a href="users.php?delete=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger btn-sm">حذف</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  </div>
                  
                  <?php $totle = $pagination->totalPage('users',null , ADMINPREPAGE);?>
                  <nav class="text-center">
                    <ul class="pagination">
                        <?php
                            for($i = 1; $i <= $totle; $i++):
                        ?>
                        <li <?php echo ($i == $page ? 'class="active"' : NULL) ?>><a href="users.php?page=<?php echo $i ?>"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>
                        <?php endfor; ?>
                        
                    </ul>
                  </nav>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>