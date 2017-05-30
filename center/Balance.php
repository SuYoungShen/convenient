<?php
  // $a = "SELECT	s.SConvenient, s.SPrice,	Balance ,BDatetime
  //       FROM   selectmembers AS s,
  //              balance AS b
  //       WHERE
  //               s.SDatetimes = b.BDatetime
  //       AND
  //               s.SM='1'
  //       AND
  //               s.SDatetimes = b.BDatetime";
  //
  //       $aa = "SELECT
  //                   d.Deposit
  //             FROM
  //                   convenient.selectmembers as s,
  //                   convenient.deposit as d
  //             WHERE
  //                   s.SDatetimes = d.DDatetime
  //             AND
  //                   d.MemberID ='1'
  //                   ";
  //                   $b = $db->query($a);
  //                   $bb = $db->query($aa);
  //                   $c = $b->fetchAll();
  //                   $cc = $bb->fetchAll();
// var_dump($c);
  $ShowDeposit = json_decode($Deposit_Json, true);//存款(SqlCenterApi.php)
  $ShowBC = json_decode($Balance_Json, true);//之前訂購的便當,有包含餘額ㄎ(SqlCenterApi.php)

  foreach ($ShowDeposit as $key => $value) {
    if (isset($value["Deposit"]) && !empty($value["Deposit"])) {
      $Deposits[$key] = "存款:".$value["Deposit"]."元";//存款
    }
  }

  foreach ($ShowBC as $key => $value) {
    $SPrice[$key] = $value["SPrice"];//便當價位
    $Balances[$key] = $value["Balance"];//餘額
    $BDatetime[$key]  = $value["BDatetime"];//餘額日期
  }

  for ($i=0; $i < count($ShowBC); $i++) {
    echo "
      <tr>
        <td>(抓取會員名)</td>
        <td>$Balances[$i]</td>
        <td>$BDatetime[$i]</td>
        <td>$Deposits[$i]</td>
      </tr>
    ";
  }




?>
