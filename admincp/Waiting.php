<?php require_once 'inc/topHeader.php'; ?>
<title> المنتجات - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete'])){
                $id = (int)$_GET['delete'];
                $payments->deletePayments($id);
            }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon glyphicon-credit-card"></i> الدفعات</h1>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">رقم الدفعة</th>
                                <th class="text-center">اسم المنتج</th>
                                <th class="text-center">تاريخ الدفعة</th>
                                <th class="text-center">السعر</th>
                                <th class="text-center">اسم المشتري</th>
                                <th class="text-center">ايميل الدفع</th>
                                <th class="text-center">حالة الدفعة</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $rows = $payments->displayPayments("ORDER BY `id` DESC LIMIT $per_page , ".ADMINPREPAGE.""); 
                        $i=1;
                            if($rows != null):
                                foreach ($rows as $row):
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++;?></td>
                                <td>**</td>
                                <td><?php  $dataProduct=$post->getDataPostById($row['id-produ']); echo $dataProduct['title'] ?></td>
                                <td><?php echo $row['date-p'] ?></td>
                                 <td><?php echo $row['price'] ?></td>
                                 <td><?php $dataUser =$users->checkUserProfile($row['id-user']); echo $dataUser['farstname']." ".$dataUser['lastname']?></td>
                                 <td><?php echo $row['email'] ?></td>
                                 <td>
                                     <?php if($row['status'] == 0): ?>
                                     <a  class="btn btn-sm btn-primary">جارية <i class="glyphicon glyphicon-refresh"></i></a>
                                     <?php else: ?>
                                     <a  class="btn btn-sm btn-success">تمت <i class="glyphicon glyphicon-ok"></i></a>
                                     <?php endif; ?>
                                 </td>
                                <td><a href="edit-Payments.php?id=<?php echo $row['id-produ'] ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="Waiting.php?delete=<?php echo $row['id-produ'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
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
                  <?php $totle = $pagination->totalPage('post', null ,ADMINPREPAGE);?>
                  <nav class="text-center">
                    <ul class="pagination">
                        <?php
                            for($i = 1; $i <= $totle; $i++):
                        ?>
                        <li <?php echo ($i == $page ? 'class="active"' : NULL) ?>><a href="Waiting.php?page=<?php echo $i ?>"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>
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