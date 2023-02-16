<?php require_once 'inc/topHeader.php'; ?>


     

<link rel="icon" type="image/x-icon" href="favicon.ico">

<title> <?php echo SITENAME ; ?> </title>

<?php require_once 'inc/header.php'; ?>
<!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
<!-- NAVBAR END ---->
<!-- HEADER START -->

<!-- HEADER END --->
<!-- INDEX MAIN -->

<main class="container" style="background: #8D8B95;margin-bottom: 290px;">
    <div class="row" >
       <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">رقم الدفعة</th>
                                <th class="text-center">اسم المنتج</th>
                                <th class="text-center">تاريخ الدفعة</th>
                                <th class="text-center">السعر</th>
                                <th class="text-center">ايميل الدفع</th>
                                <th class="text-center">حالة الدفعة</th>
                                <th class="text-center">ادفع</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $rows = $payments->getDataPaymentsById($_SESSION['user']['id']); 
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
                                 <?php if(empty($row['email'])): ?>
                                 <td><a href="email.php?email=<?php echo $row['id-produ'] ?>" class="btn btn-sm btn-warning">ارسال ايميل</a></td>
                                 <?php elseif ($row['status'] == 0): ?>
                                 <td><?php echo $row['email']." "; ?><a href="email.php?email=<?php echo $row['id-produ'] ?>" class="btn btn-sm btn-warning"> تعديل ايميل</a></td>
                                  <?php else: ?>
                                  <td><?php echo $row['email'] ?></td>
                                  <?php endif; ?>
                                 <td>
                                     <?php if($row['status'] == 0): ?>
                                     <a  class="btn btn-sm btn-primary">جارية <i class="glyphicon glyphicon-refresh"></i></a>
                                     <?php else: ?>
                                     <a  class="btn btn-sm btn-success">تمت <i class="glyphicon glyphicon-ok"></i></a>
                                     <?php endif; ?>
                                 </td>
                                 <?php if($dataProduct['is-paid'] == 1 and $row['status'] == 0): ?>
                                <td><a href="<?php echo $row['link'] ?>" class="btn btn-sm btn-danger">دفع</a></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach;
                            else:
                        ?>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>لا توجد أي دفعات بعد</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                  </div>     
  
   
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>

