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
// try＆catchを書かないと、失敗したときにfatalエラーが出る。fatalエラーは、一番深刻なプログラムの処理を止めるエラーのことで、サーバーが落ちているときと同じエラー。そんなときに例外処理として、エラーでプログラムを落とすのではなくプログラマーが出す処理を作れる。
try {
    // PDO = PHP Data Object の意味で、渡すパラメーターは3つある
    // ①使うDB名（mysqlの場合はつなげて、dbname,host,charaset が必要）
    // ②ユーザー名（mampのときはroot）
    // ③パスワード（mampのときはroot）
    $db = new PDO(
        'mysql:dbname=mydb;host=localhost;charset=utf8',
        'root',
        'root'
    );
    // tryで失敗したときは、PDOException で例外を投げてもらい、$eとして受け取る。＄eの中のメッセージを表示させている。
} catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
}

$count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰、ピンク、甘い"');
echo $count . '件のデータを挿入しました';

?>
</pre>
</main>
</body>    
</html>