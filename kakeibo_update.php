<?php
// 受信データを確認。
//var_dump($_POST);
//exit();
session_start();
include ('inc/functions.php');
check_session_id();
$pdo = connect_to_db('kuratomi_kakeibo');
// POSTデータ確認
if (
    !isset($_POST['year']) || $_POST['year'] === '' ||
    !isset($_POST['month']) || $_POST['month'] === '' ||
    !isset($_POST['item']) || $_POST['item'] === '' ||
    !isset($_POST['amount']) || $_POST['amount'] === '' ||
    !isset($_POST['category']) || $_POST['category'] === '' ||
    !isset($_POST['beneficiary']) || $_POST['beneficiary'] === '' ||
    !isset($_POST['paid_on']) || $_POST['paid_on'] === '' ||
    !isset($_POST['paid_by']) || $_POST['paid_by'] === '' ||
    !isset($_POST['note']) || $_POST['note'] === ''
) {
    exit('ParamError');
}

// $_POSTより各項目データを取得
$id = $_POST['id'];
$year = $_POST['year'];
$month = $_POST['month'];
$item = $_POST['item'];
$amount = $_POST['amount'];
$category = $_POST['category'];
$beneficiary = $_POST['beneficiary'];
$paid_on = $_POST['paid_on'];
$paid_by = $_POST['paid_by'];
$note = $_POST['note'];

// DB接続のための項目設定
// SQL作成&実行
$table_name = 'expenses_' . $year;

$sql = 'UPDATE ' . $table_name . ' SET month=:month, item=:item, amount=:amount, category=:category, beneficiary=:beneficiary, paid_on=:paid_on, paid_by=:paid_by, note=:note, last_updated_on=now() WHERE id = :id';

// phpMyAdminのSQLウィンドウで確認後コピペ＆バインド関数設定
$stmt = $pdo->prepare($sql);

// バインド変数を設定、毎回同じだそうなので、これもコピペ
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':month', $month, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':beneficiary', $beneficiary, PDO::PARAM_STR);
$stmt->bindValue(':paid_on', $paid_on, PDO::PARAM_STR);
$stmt->bindValue(':paid_by', $paid_by, PDO::PARAM_STR);
$stmt->bindValue(':note', $note, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// 入力トップページに戻る
header('Location: view_land.php', true, 307);
exit();
?>