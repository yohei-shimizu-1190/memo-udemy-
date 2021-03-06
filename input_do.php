<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<pre>
  <?php
  require('dbconnect.php');
  $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
  // prepare（事前準備という意味）にはSQLをもたせて、ユーザーが入力する値を ？ として指定する。
  // $statementオブジェクトはexecuteメソッドが使える。これでSQLを実行できる。

  $statement->bindParam(1, $_POST['memo']);
  // ? が多くなるときなどは、1つめの？はこれ！のように指定する書き方がいい。
  $statement->execute();
  // executeメソッドのパラメーターには ？ に実際に何が入るのかを指定する

  // 28,30を一行で書くと、 $statement->execute(array($_POST['memo'])); でもいいよ
  echo 'メッセージが登録されました'
  // executeメソッドは安全性が高いため、ユーザー入力されるときなどに使える！

  ?>
    

</pre>
</main>
</body>    
</html>

