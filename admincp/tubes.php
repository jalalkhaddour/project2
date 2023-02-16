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
                $post->deletePost($id ,$_SERVER['PHP_SELF']);
            }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-shopping-cart"></i> المنتجات</h1>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الصورة</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center"><i class="glyphicon glyphicon-comment"></i></th>
                                <th class="text-center">مشاهدة</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $rows = $post->displayPost("ORDER BY `id` DESC LIMIT $per_page , ".ADMINPREPAGE.""); 
                        $i=1;
                            if($rows != null):
                                foreach ($rows as $row):
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++;?></td>
                                <td><img src="../libs/uplaod/<?php echo $row['image'] ?>" width="52px" height="42px"/></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $category->getCateNameById($row['category']) ?></td>
                                <td><?php echo $post->getPostTotalReply($row['id']) ?></td>
                                <td><a href="../post.php?v=<?php echo $row['link'] ?>" class="btn btn-sm btn-info" target="_blank">مشاهده</a></td>
                                <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="tubes.php?delete=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
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
                        <li <?php echo ($i == $page ? 'class="active"' : NULL) ?>><a href="tubes.php?page=<?php echo $i ?>"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>
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