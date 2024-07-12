<?php
session_start();
include ('inc/functions.php');

if (
  !isset($_POST['login_name']) || $_POST['login_name'] === '' ||
  !isset($_POST['password']) || $_POST['password'] === '' ||
  !isset($_POST['real_name']) || $_POST['real_name'] === ''
) {
  exit('paramError');
}

$login_name = $_POST["login_name"];
$password = $_POST["password"];
$pwd = password_hash($password, PASSWORD_DEFAULT);
$real_name = $_POST["real_name"];


$pdo = connect_to_db();
$sql = 'SELECT COUNT(*) FROM family WHERE login_name=:login_name';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':login_name', $login_name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


if ($stmt->fetchColumn() > 0) {
  echo '<div class="alert"><p>すでに登録されているユーザです．</p><p><a href="index.php">login</a></p></div';
  exit();
}

$sql = 'INSERT INTO family(id, login_name, password, real_name, is_admin, created_at, updated_at, suspended_until) VALUES(NULL, :login_name, :pwd, :real_name, 0, now(), now(), 1970-01-01)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':login_name', $login_name, PDO::PARAM_STR);
$stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
$stmt->bindValue(':real_name', $real_name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:index.php");
exit();
