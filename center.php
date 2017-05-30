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
  <?php
    include 'center/SqlCenterApi.php';//查詢的資料在這已json
    // echo "<pre>";
    // print_r($ShowBalance = json_decode($Balance_Json, true));
    // echo "</pre>";
    $c = count($ShowBalance = json_decode($Balance_Json, true));//之前訂購的便當,有包含餘額(SqlCenterApi.php)
    

   ?>
</head>

<body>

<?php
  include 'header.php';
?>

<!-- Page Content -->
<div class="container">
  <!-- 店家名 -->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">會員資訊
      </h1>
    </div>
  </div>
  <div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation"  class="active"><a href="#deposit" aria-controls="home" role="tab" data-toggle="tab">存款明細</a></li>
      <li role="presentation"><a href="#balance" aria-controls="profile" role="tab" data-toggle="tab">餘額明細</a></li>
      <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">日期</a></li> -->
      <li role="presentation"><a href="#before_convenient" aria-controls="settings" role="tab" data-toggle="tab">曾經訂購便當</a></li>
    </ul>

    <div class="tab-content">
<!-- 存款 -->
      <div role="tabpanel" class="tab-pane active" id="deposit"></br>
        <table class="table table-hover ">
          <thead>
            <tr>
              <th>姓名</th>
              <th>存款</th>
              <th>日期</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include 'center/Deposit.php';//存款頁面
             ?>
          </tbody>
        </table>
      </div>
<!-- 存款 -->

<!-- 餘額 -->
      <div role="tabpanel" class="tab-pane" id="balance"></br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>姓名</th>
              <th>餘額</th>
              <th>日期</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include 'center/Balance.php';
             ?>
          </tbody>
        </table>
      </div>
<!-- 餘額 -->

<!-- 曾經訂購過的便當 -->
      <div role="tabpanel" class="tab-pane" id="before_convenient"> </br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>姓名</th>
              <th>店家名</th>
              <th>便當+價位</th>
              <th>數量</th>
              <th>總價</th>
              <th>日期</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include 'center/BeforeConvenient.php';
             ?>
          </tbody>
        </table>
      </div>
<!-- 曾經訂購過的便當 -->
    </div><!-- tab-content -->
  </div>

      <!-- 便當菜單 -->
      <!-- <img class="img-responsive" src="http://placehold.it/750x500" alt=""> -->
      <!-- 便當菜單 -->
    <!-- </div> -->

    <!-- <div class="col-md-4">
      <h3>說明</h3>
      <p>....</p>
    </div>
    <br/>

    <div class="col-md-4">
      <form class="form-horizontal">
        <div class="form-group">
          <h3>選擇便當</h3>
          <div class="col-sm-8"> -->
            <!-- Single button -->
            <!-- <select class="selectpicker" data-style="btn-primary">
              <option>便當名1+價位1</option>
              <option>便當名2+價位2</option>
              <option>便當名3+價位3</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <h3>我是誰...?</h3>
            <input type="text" class="form-control" id="pwd" placeholder="(抓取會員名)">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5">
            <button type="submit" class="btn btn-primary">送出</button>
          </div>
        </div>
      </form>
    </div>
  </div> -->
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
</div>
<!-- /.container -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
</body>
</html>
