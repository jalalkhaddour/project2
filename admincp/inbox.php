<?php require_once 'inc/topHeader.php'; ?>
<title>لوحة التحكم - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete'])){
                $id = (int)$_GET['delete'];
                $contact->deleteMessageContant($id);
            }
        ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-inbox"></i> البريد الوارد</h1>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">البريد الالكتروني</th>
                                <th class="text-center">الرسالة</th>
                                <th class="text-center">مشاهده</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $messges = $contact->getMessageContant("ORDER BY `id` DESC LIMIT $per_page , ".ADMINPREPAGE."");
                            if($messges !== null):
                                $i = 1;
                                foreach ($messges as $msg):
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $msg['username'] ?></td>
                                <td><?php echo $msg['email'] ?></td>
                                <td><?php echo (mb_strlen($msg['message']) > 40 ? mb_substr($msg['message'],0,40) .' ...' : $msg['message']); ?></td>
                                <td><a href="read.php?msg=<?php echo $msg['id'] ?>" class="btn btn-sm btn-info">مشاهده</a></td>
                                <td><a href="inbox.php?delete=<?php echo $msg['id'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        <?php
                    endforeach;
                    else:
                        ?>
                           <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td>لا يوجد اي بريد وارد جديد</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                  </div>
                  
                  <?php $totle = $pagination->totalPage('messages',null , ADMINPREPAGE);?>
                  <nav class="text-center">
                    <ul class="pagination">
                        <?php
                            for($i = 1; $i <= $totle; $i++):
                        ?>
                        <li <?php echo ($i == $page ? 'class="active"' : NULL) ?>><a href="inbox.php?page=<?php echo $i ?>"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>
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