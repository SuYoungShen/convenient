<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>便當系統</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->

    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>


<?php
  session_start();

  include 'bcs/mysql/connect.php';//資料庫連線
  include 'todaymenu/todaymenu.php';//本日菜單的程式
  include 'center/SqlCenterApi.php';//查詢的資料在這已json
  $ShowBalance = json_decode($Balance_Json, true);//餘額的明細json,true轉為陣列,用在center/Balance.php
  $BalanceCount = count($ShowBalance);//算出餘額總共有幾筆資料,用在header.php

 ?>
 <script type="text/javascript">
   $(document).ready(function() {
     $("form").focus(function(event) {
       $("form").validate({
         rules:{
           name: "required",
           number:{
             required:true,
             digits:true
           }
         },
         messages:{
           name:"必填",
           number:"必填"
         }
       });
     });
   });
 </script>
 <style media="screen">
   .error{
     color:red;
     border-color: red;
   }
 </style>
</head>

<body>
  <?php
    include 'header.php';//上面的黑色那排
   ?>

    <!-- Page Content -->
    <div class="container">
      <!-- <form class="form-horizontal" action="todaymenu/insertconvenient.php" method="post"> -->
      <form class="form-horizontal" action="todaymenu/insertconvenient.php" method="post">
        <!-- 店家名 -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header"><?php echo $TodayStoreName; ?>
              <input type="hidden" name="TodayID" value="<?php echo $TodayID;?>">
              <small><?php echo $TodayStorePhone; ?></small>
            </h1>
          </div>
        </div>
        <!-- 店家名 -->

        <!-- 便當資訊-->
        <div class="row">
          <div class="col-md-8">
            <!-- 便當菜單 -->
            <img class="img-responsive" src="<?php echo $pic;?>" alt="">
            <!-- 便當菜單 -->
          </div>

          <div class="col-md-4 col-xs-12">
            <h3>說明</h3>
            <p class="h5"><?php echo $description; ?></p>
          <!-- </div> -->
          <br/>

          <!-- <div class="col-md-4"> -->

            <div class="form-group">
              <h3>選擇便當</h3>
              <div class="col-sm-8 col-xs-12">
                <!-- Single button -->
                <select class="selectpicker" data-style="btn-danger" name="CP" title="請選擇"><!-- CP = convenient price-->
                  <optgroup label="便當+價位">
                    <?php
                      foreach ($ShowStoreIn as $key => $value) {
                     ?>
                    <option value="<?php echo $value['StoreConvenient']."+".$value["SCPrice"]; ?>">
                      <?php echo $value['StoreConvenient']."+".$value["SCPrice"]; ?>
                    </option>
                    <?php } ?>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-xs-12">
                <h3>數量...?</h3>
                <input type="number" class="form-control" name="number" id="number" placeholder="請輸入數量" required="required">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-xs-12">
                <h3>我是誰...?</h3>
                <?php
                  //$input 在todaymenu/todaymenu.php
                  if (isset($login_member_name) && !empty($login_member_name)) {//當使用者登入時會顯示唯讀,姓名部分就不能更改
                    $input($login_member_name, $readonly);
                  }else {//反之如果是訪客就得自己輸入姓名
                    $login_member_name = "";
                    $input($login_member_name, $required);
                  }
                 ?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-2 col-xs-5">
                <button type="submit" class="btn btn-success" name="submit_IConvenient">送出</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
          <div class="row">
            <div class="col-lg-12">
              <p>By: &copy; Your Website 2014</p>
            </div>
          </div>
          <!-- /.row -->
        </footer>
      </form>
    </div>
    <!-- /.container -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
</body>
</html>
<?php
  $db = null;
 ?>
