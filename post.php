<?php
 require_once 'inc/topHeader.php'; 
  
 $id = $post->checkPostUrl($_GET['v']);
$posts = $post->displayPost("WHERE `id` = '".$id."'");
foreach ($posts as $postid){
    $postid;
}
$post->updatePostView($postid['id']);

?>

<title><?php echo SITENAME .' - '.$postid['title'] ?></title>
<link rel="icon" type="image/x-icon" href="favicon.ico">

<?php require_once 'inc/header.php'; ?>
<!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
<!-- NAVBAR END ---->
<!-- HEADER START -->
<?php require_once 'inc/welcome.php'; ?>
<!-- HEADER END --->
<!-- INDEX MAIN -->

<main class="container">
  <div class="row">
      <article class="col-xs-12 col-md-12">
          <div class="col-md-8" style="background: #8D8B95; border-radius: 4px; border: solid 1px #ccc; padding: 15px;margin-bottom: 20px;">
              <div>
                 <center> <h3 style="margin: 5px 0 15px 0;background: #F44336;padding: 8px;color: #8D8B95;"><?php echo $postid['title']; ?></h3>
                  <img src="libs/uplaod/<?php echo  $postid['image'] ?>" width="500px" height="400px" /></center>
                <div style="background: #f9f7f7;padding: 8px 2px;border-radius: 4px;border: solid 1px #efecec;">
                    <p class="pull-left" style="padding: 0px 10px;margin-bottom: 0px;"><?php echo $postid['view']; ?> <i class=" glyphicon glyphicon-eye-open"></i></p>
                    <p class="pull-right" style="padding: 0px 10px;margin-bottom: 0px;"><i class="glyphicon glyphicon-list"></i> القسم : <a href="category.php?cat=<?php echo $category->getCateLinkById($postid['category']); ?>"><?php echo $category->getCateNameById($postid['category']); ?></a></p>
                    <div class="clearfix"></div>
                </div>
                <p style="padding: 8px 10px;">
                    <?php echo $postid['desc']; ?>
                </p>
                 <div style="background: #f9f7f7;padding: 20px 30px;border-radius: 4px;border: solid 1px #efecec;">
                     <div class="pull-left"> 
                         
                       <div class="col-md-8 col-md-offset-3" style="padding: 0">
                          <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['add-price'])){
                             $postid['price']=$post->checkPrice($id,$_POST['price'],$_SESSION['user']['id']);  
                            }
                          ?>
                      </div>
                         
                         
                     <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'].'?v='.$postid['link']; ?>" method="POST" >
                      <div class="form-group">
                        <label for="exampleInputName2">سعر المزايدة</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="ضع السعر هنا">
                      </div>
                         <input type="hidden" name="link" id="link" value="<?php echo $postid['link']; ?>" />
                         <button type="submit" id="add-price" name="add-price" class="btn btn-danger">ارسل مزايدة</button>
                    </form>
                         
                         
                         
                     </div>
                     <ul class="nav nav-pills" role="tablist">
                      <li role="presentation" class="active"><a href="#">بقي <span class="badge"><?php echo $post->datePost($postid['date-Product'],$postid['id']); ?> </span></a></li>
                      <li role="presentation" class="active"><a href="#">السعر <span class="badge"><?php echo $postid['price']." دولار"; ?></span></a></li>
                     </ul>
                    <div class="clearfix"></div>
                </div>
              </div>
              <hr/>
              <?php if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == true):?>
              <form id="addReply" class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-12">
                    <textarea class="form-control" name="comment" id="comment" placeholder="ادخل تعليق على المنتج"></textarea>
                    <input type="hidden" id="PostID" value="<?php echo $postid['id'] ?>" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" id="addComment" name="addComment" class="btn btn-success pull-left">اضافة التعليق</button>
                    <div id="addResult"></div>
                </div>
              </div>
            </form>
            <div id="commentResult"></div>
            <?php endif; ?>
              
              <?php $comments = $post->getPostreply($postid['id']);
              if($comments !== NULL):
              foreach ($comments as $comment):
              ?>
              
              <div style="margin: 20px 0;">
                  <div style="background: #d2d2d2;padding: 5px;">
                      <div class="pull-right"><p><i class="glyphicon glyphicon-user"></i> <span><?php echo $post->getUserNameById($comment['user_id']); ?></span></p></div>
                      <?php if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE and $_SESSION['user']['id'] == $comment['user_id']): ?>
                      <div class="pull-left"><a id="deleteReply" rel="<?php echo $comment['id'] ?>" data-toggle="tooltip" data-placement="top" title="حذف التعليق"><i class="glyphicon glyphicon-trash" style="color: #f56e6e"></i></a></div>
                      <?php endif; ?>
                      <div class="clearfix"></div>
                      <div style="background: #8D8B95;padding: 4px;border-radius: 4px;border: solid 1px #d0d0d0;"><?php echo $comment['comment']; ?></div>
                  </div>
              </div>
              <?php 
              endforeach;
              else:
              ?>
              <div class="text-center" style="font-weight: bold">لا يوجد اي تعليقات</div>
              <?php
              endif;
              ?>
            
          </div>
          
          <div class="col-md-4">
              <div class="col-md-12" style="background: white;border-radius: 4px;border: solid 1px #ccc;padding-bottom: 8px;">
                  <h4 style="border-bottom: solid 1px #d0d0d0;padding-bottom: 8px;">شاهد ايضاً</h4>
                  
                  <?php $like = $post->LikePost($postid['title'] , $postid['category'] , $postid['id']);
                    foreach ($like as $post):
                  ?>
                  <div style="margin-bottom: 4px;padding: 5px;background: #ecebe9;">
                      <a href="post.php?v=<?php echo $post['link']?>">
                      <img src="libs/uplaod/<?php echo $post['image'] ?>" width="84px" height="64px" />
                      <span><?php echo (mb_strlen($post['title'] , 'utf8') > 30 ? mb_substr($post['title'],0 , 30) . ' ...' : $post['title']) ?></span>
                      </a>
                  </div>
                 <?php endforeach; ?>
              </div>
          </div>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>

<script>
    $("[id = deleteReply]").on("click" , function(){
       var comment = $(this);
       var id = $(this).attr('rel');
       if(confirm("هل انت متأكد من حذفك للتعليق؟")){
           $.ajax({
               url: 'inc/ajax/deleteComment.php',
               type: 'post',
               data: "id="+id,
               success: function(){
                   comment.parent().parent().fadeOut('slow');
               }
           });
       }
    });
    
    $('#addReply').submit(function(){
        var comment = $('#comment').val();
        var Post = $('#PostID').val();
        if(comment == ''){
            alert('الرجاء ادخال التعليق');
            return false;
        }else{
            $.ajax({
               url: 'inc/ajax/addComment.php',
               type: 'post',
               data: "comment="+comment+"&id="+Post,
               beforeSend:function(){
                   $('#addResult').html('<div class="text-center"><img src="libs/image/ajax-loader.gif"/></div>');
               },
               success: function(e){
                   $('#addResult').hide();
                   $('#commentResult').html(e);
               }
           });
           return false;
        }
        return false;
    });
</script>