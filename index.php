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
<?php
require('dbconnect.php');

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 5 * ($page - 1);

$memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
// LIMIT句は 0, 5 とすると、 id順の上から0を基準として5つまで表示させ、
// 5,5 とすると、 id順の上から5を基準として5つまで表示される。
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>

<article>
    <?php while ($memo = $memos->fetch()): ?>
        <!-- while とendwhileは ; ではなく : コロン で結ぶため注意！！！ -->
        <p><a href="memo.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
        <!-- mb_substrは文字列に対して、文字数を制限できる関数
        mb_substr(3つの引数を取る、、、①文字、②開始文字、③終了文字) -->
        <time><?php print($memo['created_at']); ?></time>
        <hr>
    <?php endwhile ?>
    <?php if ($page >= 2): ?>
        <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1) ?> ページ目へ</a>
    <?php endif; ?>
    ||
    <?php
        $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
        $count = $counts->fetch();
        $max_page = ceil($count['cnt'] / 5);
        if ($page < $max_page) :
            ?>
        <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1) ?> ページ目へ</a>
    <?php
        endif; ?>
</article>
</main>
</body>    
</html>
