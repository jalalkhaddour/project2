<footer class="container-fluid" style="background: #313131 ; border-top: solid 2px #594A74; padding: 20px;">
    <div class="container">
        <div class="row">
            <div class="pull-right" style="color:white ;">جميع الحقوق محفوظة  &copy; <?php echo date('Y');?></div>
            <div class="pull-left">
                <div class="text-left"><i class="glyphicon glyphicon-send"></i> <a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">اتصال بنا</a></div>
            </div>
        </div>
    </div>
</footer>

<!-- FOOTER END --->
      
<!-- MODEL START -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">اتصل بنا</h4>
      </div>
      <div class="modal-body">
          <form id="messages">
          <div class="form-group">
            <label for="email">بريدك الإلكتروني</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="البريد الاكتروني">
          </div>
          <div class="form-group">
            <label for="username">الاسم</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="اسمك">
          </div>
          <div class="form-group">
            <label for="message">الرسالة</label>
            <textarea class="form-control" name="message" rows="4" id="message"></textarea>
          </div>
        </form>
          <div id="result"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
        <button type="button" onclick="sendmessage();" class="btn btn-success">ارسال الرسالة</button>
      </div>
    </div>
  </div>
</div>

<!-- MODEL END ---->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="libs/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="libs/js/bootstrap.min.js"></script>
    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    
    function sendmessage(){
        var data = $('#messages').serialize();
        $.ajax({
            url: 'inc/ajax/contact.php',
            type: 'post',
            data: data,
            beforeSend:function(){
                $('#result').html('<div class="text-center"><img src="libs/image/ajax-loader.gif"/></div>');
            },success: function(e){
                 $('#result').html(e);
            }
        });
    }
    </script>
  </body>
</html>