<?php
include ('functions.php');
$pdo = connect_to_db('kuratomi_kakeibo');

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家庭内サーバにDB実装するかもの倉冨さんち家計簿</title>
    <!-- jQueryの読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Google Fontsの読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <!-- スタイルシートの読み込み -->
    <link rel="stylesheet" href="css/style_a.css">
    <script src="js/main.js"></script>
</head>
<body>
    <div>テーブルが存在しません。作成しますか？</div>
</body>
</html>