<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
  <div id ="container">
    <p class="title">ユーザー登録が完了しました。</p>

    <div class="top_btn">
      <a href="{{url('/')}}">トップへ戻る</a>
    </div>
    <div class="login_btn">
      <a href="{{ route('login') }}">ログイン</a>
    </div>  
  </div>
</body>
</html>