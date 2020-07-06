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
// ともにパラメーターにsqlをとるが、返り値が異なる。
// execメソッド 影響を与えた行の数を返す(数を知りたいときはexec)
// queryメソッド セレクトで得られた値を返す（セレクトのときはquery）
$records = $db->query('SELECT * FROM my_items');
// $recordsは'record set'というインスタンスとなるみたいで、いろんなメソッドを持つ
// 今回はfetchメソッドを使う。fetch（割当てるという意味）はレコードの行のうち、1行を取り出す。行を順番に取り出し、なくなるとfalseを返すため、while でtrueの間はレコードを取り出して、falseになったら終了できる。
while ($record = $records->fetch()) {
    // $recordは連想配列で、そのなかの要素を取り出すため['item_name']のレコードを取得
    print($record['item_name'] . "\n");
}
?>
</pre>
</main>
</body>    
</html>