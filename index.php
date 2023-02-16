<?php require_once 'inc/topHeader.php'; ?>
<?php require_once 'Core/config.php'?>
<title><?php echo SITENAME;?></title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
<?php require_once 'inc/header.php'; ?>
<!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
<!-- NAVBAR END ---->
<!-- HEADER START -->
<?php  require_once 'inc/welcome.php'; ?>
<!-- HEADER END --->
<!-- INDEX MAIN -->

<main class="container">
  <div class="row">
      <article class="col-xs-12 col-md-12">
          <?php $posts = $post->displayPost("ORDER BY RAND() , `id` DESC LIMIT 9");
            foreach ($posts as $postid):
          ?>
          <div class="col-md-4" style="position: relative;">
              <div style="position: absolute;left: 75px;top: 10px;color: #3E3660;font-size: 12px;background: rgba(0, 0, 0, 0.45);padding: 3px 8px;border-radius: 3px;" data-toggle="tooltip" data-placement="top" title="المشاهدات">
                  <i class="glyphicon glyphicon-eye-open" style="color: #c7c7c7;" ></i> <?php echo $post->viewCount($postid['id']); ?>
              </div>
              <div style="position: absolute;left: 25px;top: 10px;color: #3E3660;font-size: 12px;background: rgba(0, 0, 0, 0.45);padding: 3px 8px;border-radius: 3px;" data-toggle="tooltip" data-placement="top" title="التعليقات">
                  <i class="glyphicon glyphicon-comment" style="color: #d0c358;"></i> <?php echo $post->replyCount($postid['id']); ?>
              </div>
              <div style="padding: 5px;background: #594A74;border: solid 1px #3E3660;margin-bottom: 20px;">
                  <img src="libs/uplaod/<?php echo $postid['image'] ?>" class="img-responsive" style="width: 100%;height: 250px;" />
                <h5 style="background: #8D8B95;padding: 5px;text-align: center;margin: 5px 0;font-weight: bold;border: solid 1px #e2e0e4;"><?php echo (mb_strlen($postid['title'] , 'utf8') > 40 ? mb_substr($postid['title'],0,40).' ...' : $postid['title']) ?></h5>
                <a href="category.php?cat=<?php echo $category->getCateLinkById($postid['category']); ?>"><h5 style="background: #607D8B;padding: 5px 12px;text-align: center;margin: 5px 0;border: solid 1px #546f7b;position: absolute;top: 30px;color: #8D8B95;"><?php echo $category->getCateNameById($postid['category'])?></h5></a>
                <p style="background: #8D8B95;padding: 5px;text-align: justify;margin: 5px 0;border: solid 1px #e2e0e4;">
                    <?php echo (mb_strlen($postid['desc'] , 'utf8') > 45 ? mb_substr($postid['desc'],0,45).' ...' : $postid['desc']) ?>
                </p>
                <div class="text-center"><a href="post.php?v=<?php echo $postid['link'] ?>" class="btn btn-danger">شاهد الآن</a></div>
              </div>
          </div>
          <?php endforeach; ?>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>