<header class="container-fluid">

    <div class="row">
        <div style="border-radius: 0px;border-bottom: solid 1px #313131;">
        <center>

    
            <img src="libs/image/tubeAty.png" width="100" />
          <h1 style="color :wheat">أهلا وسهلاً بكم</h1>
          <p style="color :wheat">موقع <?php echo SITENAME;?> يرحب بالجميع ويتمنى لكم قضاء اسعد الاوقات معنا</p>
          <p style="color: #313131;">
              <?php
            if(isset($_GET['cat'])){
                echo "قسم " . $category->getCateNameByLink($_GET['cat']);
            }
        ?>    </center>
          </p>
        </div>
    </div>
</header>
