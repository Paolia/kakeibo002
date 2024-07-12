<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>倉冨さんちの家計簿・ユーザ登録画面</title>
</head>

<body>
  <form class="login" action="family_reg_act.php" method="POST">
    <fieldset>
      <legend>倉冨さんちの家計簿・ユーザ登録画面</legend>
      <div>
        ログイン名: <input type="text" name="login_name">
      </div>
      <div>
        パスワード: <input type="password" name="password">
      </div>
      <div>
        本名: <input type="text" name="real_name">
      </div>
      <div>
        <button>登録</button>
      </div>
      <a href="index.php">またはログイン</a>
    </fieldset>
  </form>

</body>

</html>