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
  try {
      $db = new PDO('mysql:dbname=mydb;host=localhost;charaset=utf8', 'root', 'root');
      // $dbインスタンスは様々なメソッドやプロパティを持っている次にその中のexecメソッドを使っている
      $db->exec('INSERT INTO memos SET memo="' . $_POST['memo'] .'", created_at=NOW()');
      // 「exex」一度の関数コールで SQL 文を実行し、文によって作用した行数を返す。“insert”、”delete”など、SQL 文の実行で完結する場合に使える。
      // 「query」“select”などで、返ってきたデータを活用する場合には、“exec”は使えないので、こっちを使う。
      // $_POST['memo'] はinputのmethodがPOSTだから_POSTでname属性がmemoのため、['memo']としている。
      // created_at=NOW()のNOW()はsqlで使える書き方。今の時間を入れられる。
  } catch (PDOException $e) {
      echo 'DB接続エラーです！:' . $e->getMessage();
  }
  ?>
    

</pre>
</main>
</body>    
</html>