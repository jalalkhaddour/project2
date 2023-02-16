<?php require_once 'inc/topHeader.php';
$id = (int)$_GET['msg'];
$message = $contact->getcontantMessage($id);
?>
<title>قراءة رسالة <?php echo $message['username'] ?> - <?php echo SITENAME ?></title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once 'inc/sidebar.php'; ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header"><i class="glyphicon glyphicon-envelope"></i> رسالة من : <?php echo $message['username'] ?></h1>
      <div class="col-md-8 col-md-offset-2">
          <form id="messages">
          <div class="form-group">
            <label for="email">بريدك الإلكتروني</label>
            <input type="email" disabled class="form-control" id="email" value="<?php echo $message['email'] ?>">
          </div>
          <div class="form-group">
            <label for="username">الاسم</label>
            <input type="text" disabled class="form-control" id="username" value="<?php echo $message['username'] ?>">
          </div>
          <div class="form-group">
            <label for="message">الرسالة</label>
            <textarea class="form-control" disabled rows="4" id="message"><?php echo $message['message'] ?></textarea>
          </div>
        </form>
          <div class="text-center">
              <a href="inbox.php" class="btn btn-lg btn-primary">العودة الى الرسائل</a>
          </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>


