<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>ログイン</title>
</head>
<body>
<section id=main>
<header>
  <nav class="navbar navbar-default">管理者　LOGIN</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:　<input type="text" name="lid" />
PW:　<input type="password" class="password" name="lpw" /><br>
<input type="submit" value="LOGIN" />
</form>

</section>
</body>
</html>