<?php
// データ受け取り
//var_dump($_POST);
//exit();
session_start();
include ('inc/functions.php');

$login_name = $_POST['login_name'];
$pwd = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM family WHERE login_name=:login_name AND password=:password AND suspended_until IS NULL';
//$sql = 'SELECT * FROM family WHERE login_name=:login_name AND suspended_until IS NULL';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':login_name', $login_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $pwd, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// ユーザ有無で条件分岐
$user = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($status, $user);
//exit();

if (!$user) {
    echo '<div class="alert"><p>ログイン情報に誤りがあります</p>';
    echo '<p><a href="index.php">ログイン</a></p></div>';
    exit();
} else {
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['is_admin'] = $user['is_admin'];
    $_SESSION['login_name'] = $user['login_name'];
    header("Location:kakeibo_read.php");
    exit();
}
