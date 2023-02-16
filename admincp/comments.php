<?php require_once 'inc/topHeader.php'; ?>
<title>التعليقات - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete'])){
                $id = (int)$_GET['delete'];
                if($post->deletePostReply($id) == FALSE){
                    header("Location: comments.php");
                }else{
                    echo Messages::setMsg('تم', 'حذف التعليق بنجاح', 'success') . Messages::getMsg();
                }
            }
          ?>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-comment"></i> التعليقات</h1>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12">
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
                        
                        $rows = $post->displayreply("ORDER BY `id` DESC LIMIT $per_page , ".ADMINPREPAGE.""); 
                        $i=1;
                            if($rows != null):
                                foreach ($rows as $row):
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $post->getUserNameById($row['user_id']); ?></td>
                                <td><?php echo (mb_strlen($row['comment'] , 'utf8') > 50 ? mb_substr($row['comment'],0,50) .' ...' : $row['comment']) ?></td>
                                <td><a href="../post.php?v=<?php echo $post->getLinkPostById($row['post_id']); ?>" class="btn btn-sm btn-info" target="_blank">مشاهده</a></td>
                                <td><a href="comments.php?delete=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a></td>
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
                  <?php $totle = $pagination->totalPage('reply', null , ADMINPREPAGE);?>
                  <nav class="text-center">
                    <ul class="pagination">
                        <?php
                            for($i = 1; $i <= $totle; $i++):
                        ?>
                        <li <?php echo ($i == $page ? 'class="active"' : NULL) ?>><a href="comments.php?page=<?php echo $i ?>"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>
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