<?php
session_start();
include ('inc/functions.php');
//check_session_id();
$pdo = connect_to_db('kuratomi_kakeibo');

?>

<form class="login" action="kakeibo_login.php" method="POST">
  <fieldset>
    <legend>倉冨さんち家計簿・ログイン画面</legend>
    <div>
      username: <input type="text" name="login_name">
    </div>
    <div>
      password: <input type="password" name="password">
    </div>
    <div>
      <button>Login</button>
    </div>
    <div>
      <a href="family_reg.php">or register</a>
    </div>
  </fieldset>
</form>