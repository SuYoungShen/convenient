<?php
$Deposit = function($db){
  $SelectDeposit = "SELECT
                          d.Deposit, d.DDatetime
                    FROM
                          balance as b,
                          deposit as d
                    WHERE
                          b.BDatetime = d.DDatetime
                    AND
                          d.MemberID ='1'
                    ";//以會員帳號當條件
  $QuDeposit = $db->query($SelectDeposit);
  $Show = $QuDeposit->fetchAll();
  // while($Show = $QuDeposit->fetch(PDO::FETCH_ASSOC)){
  //   $S = $Show["MemberName"];
  // }
  return $Show;
};//存款金額

$Before_Convenient = function($db){
  // $SelectBC = "
  //               SELECT
  //                     s.SConvenient, s.SPrice, s.SQuantity, s.STotal,
  //                     s.SDatetimes, b.Balance, b.BDatetime, t.TodayStoreName
  //               FROM
  //                     selectmembers AS s,
  //                     balance AS b,
  //                     todaymenu AS t
  //             WHERE
  //                     s.SDatetimes = b.BDatetime
  //             AND
  //                     s.SM = '1'
  //             AND
  //                     b.MemberID='1'
  //             AND
  //                     s.STodayStore = t.TodayID
  //             ";
  $SelectBC = "
                SELECT
                  t.TodayStoreName, s.SConvenient, s.SPrice,
                  s.SQuantity, s.STotal, s.SDatetimes
                FROM
                  `todaymenu` AS t,
                  `selectmembers` AS s
                WHERE
                  s.SM = '1'
                AND
                  s.STodayStore = t.TodayID
              ";
  $QuBC = $db->query($SelectBC);
  $Show = $QuBC->fetchAll();
  return $Show;
};//查詢曾經訂購過的便當，有會員登入時，以ID下去查詢

$Balance = function($db){

  $SelectBalance = "SELECT Balance, BDatetime FROM `balance` WHERE MemberID = '1'";
  $QuBalance = $db->query($SelectBalance);
  $Show = $QuBalance->fetchAll();
  return $Show;

};//以會員ID為條件，搜尋會員所剩餘額

$url = "/convenient/center/SqlCenterApi.php";

if ($_SERVER['PHP_SELF'] == $url) {//判斷網址，此API是被引入還是直接連入
  // echo '$_SERVER[PHP_SELF]='.$_SERVER["PHP_SELF"]."<br/>";
  // echo '$_SERVER[REUQEST_URI]='.$_SERVER['REQUEST_URI']."<br/>";
  include '../bcs/mysql/connect.php';

  $SelectDeposit = $Deposit($db);//存款金額
  $SelectBC = $Before_Convenient($db);//查詢曾經訂購過的便當
  $SelectBalance = $Balance($db);//查尋餘額
  $REQUEST_URI = $_SERVER["REQUEST_URI"];//取得網址的uri

  if ($REQUEST_URI == $url."?value=deposit") {

    echo $Deposit_Json = json_encode($SelectDeposit);//存款Json，並顯示

  }elseif ($REQUEST_URI == $url."?value=bc") {

    echo $BC_Json = json_encode($SelectBC);//曾經訂購的便當Json，並顯示

  }elseif ($REQUEST_URI == $url."?value=balance") {

    echo($Balance_Json = json_encode($SelectBalance));//餘額的Json，並顯示

  }

}else{
  // echo '$_SERVER[PHP_SELF]='.$_SERVER["PHP_SELF"]."<br/>";
  // echo '$_SERVER[REUQEST_URI]='.$_SERVER['REQUEST_URI']."<br/>";

  include 'bcs/mysql/connect.php';
  $SelectDeposit = $Deposit($db);//存款金額
  $SelectBC = $Before_Convenient($db);//查詢曾經訂購過的便當
  $SelectBalance = $Balance($db);//查尋餘額

  $Deposit_Json = json_encode($SelectDeposit);//存款Json
  $BC_Json = json_encode($SelectBC);//曾經訂購的便當Json
  $Balance_Json = json_encode($SelectBalance);//餘額的Json

}


 ?>
