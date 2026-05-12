<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>
  <div id="content">
    <h1 class="login_title">ログイン</h1>

    <div class="input_row">
      <label class="input_label" for="email">メールアドレス</label>
      <input class="text_input" id="email" type="email" value="{{old('email')}}" required>
  </div>

  <div class="input_row">
    <label class="input_label" for="password">パスワード</label>
    <input class="text_input" id="password" type="password" name="password" required>
  </div>

  <input class="submit_btn" type="submit" value="ログイン">

  <p class="link">会員登録はこちら</p>
  <p class="link">パスワード再設定はこちら</p>
</body>