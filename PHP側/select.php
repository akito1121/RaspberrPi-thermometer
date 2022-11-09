<?php
//0. SESSION開始！！
session_start();

include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>測定データ表示</title>
</head>
<body>
<!-- Head[Start] -->

<!-- Head[End] -->

<!-- Main[Start] -->
<section id = "main">

<h2 style="text-align: center">測定データ　<?= $kisyu2 ?></h2>
<div style="text-align: center">
<a href="chart_t.php">【気温グラフ】</a> 
<a href="chart_h.php">【湿度グラフ】</a> 
<a href="chart_p.php">【気圧グラフ】</a> 
<a href="logout.php">【ログアウト】</a> 
</div>
<table border="1" cellpadding="5" cellspacing="0" width="1300" style="margin: auto">
    <tr>
      <th>ID</th>     
      <th>測定時間</th> 
      <th>気温（℃）</th>
      <th>湿度（％）</th>
      <th>気圧（hPa）</th>
    </tr>
    <?php

    //２．データ登録SQL作成
    $stmt   = $pdo->prepare("SELECT * FROM php_raspidata"); //SQLをセット
    $status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

    //３．データ表示
    if($status==false) {
      //SQLエラーの場合
      sql_error($stmt);
    }else{
      //SQL成功の場合
      while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ //データ取得数分繰り返す
        //以下でリンクの文字列を作成, $r["id"]でidをdetail.phpに渡しています
        echo '<td>'.$r["id"].'</td>';
        echo '<td><time>'.date('Y年m月d日 H:i', strtotime($r["indate"])).'</time></td>';
        echo '<td>'.$r["temp"].'</td>';
        echo '<td>'.$r["hum"].'</td>';
        echo '<td>'.$r["press"].'</td></tr>';
      }
    }
    ?>
</table>
</section>
<!-- Main[End] -->
</body>
</html>
