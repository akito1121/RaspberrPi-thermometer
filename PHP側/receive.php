//receive.php
<?php
//エラー内容表示させる
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();


//変数a1,b1,c1に送られてきたデータa,b,cを入れる
$press = $_POST['a'];
$temp  = $_POST['b'];
$hum   = $_POST['c'];


//2. DB接続します  
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成（テンプレート）
$sql = "INSERT INTO php_raspidata(indate,temp,hum,press)VALUES(sysdate(), :temp, :hum, :press)";  //可変
$stmt = $pdo->prepare($sql);
//bindValueはセキュリティ
$stmt->bindValue(':temp',  $temp,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':hum',   $hum,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':press', $press, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//SQL実行


//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    echo "Error: ";
    echo $error = $stmt->errorInfo().$sql;

  }else{
    echo "OK";

  }


?>