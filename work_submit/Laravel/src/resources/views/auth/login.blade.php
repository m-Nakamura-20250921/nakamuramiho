<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div id="content">
    <h1 class="login_title">ログイン</h1>
    <form method="post" action="{{route('login')}}">
      @if ($errors->has('password'))
        <p class="error">{{ $errors->first('password') }}</p>
      @endif

      @if ($errors->has('email'))
        <p class='error'>{{$errors->first('email')}}</p>
      @endif

      @csrf

      <div class="input_row">
        <label class="input_label" for="email">メールアドレス</label>
        <input class="text_input" id="email" name="email" type="email" value="{{old('email')}}">
      </div>

      <div class="input_row">
        <label class="input_label" for="password">パスワード</label>
        <div class="input-group">
          <!-- 入力欄 -->
          <input class="text_input form-control" id="password" type="password" name="password">

          <!-- 表示・非表示アイコン -->
          <button class="btn btn-outline-secondary" type="button" id="toggle-password">
            <i class="bi bi-eye" id="eye_icon"></i>
          </button>

        </div>
      </div>

      <input class="submit_btn" type="submit" value="ログイン">

    </form>
    <p class="link">
      <a href="{{ route('register.form')}}">会員登録はこちら</a>
    </p>
    <p class="link">
      <a href=#>パスワード再設定はこちら</a>
    </p>
  </div>
  
  <script src="{{ asset('/js/login_btn.js') }}"></script>
</body>
</html>