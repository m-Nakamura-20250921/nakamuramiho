<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規会員登録</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
  <div id ="container">
    <p class="title">会員登録</p>

    <form method="post" action="{{route('register.confirm')}}">
      @csrf

      <!-- 名前 -->
      <div class="input_row">
        <div class="div_w_95">
          <label class ="input_label" for="name">名前</label>
          <input class="text_input" type="text" name="name" id="name"
          value="{{old('name')}}" required min:2 max:30>
          @error('name')
            <div class ="error_message">{{$message}}</div>
          @enderror
        </div>
      </div>

      <!-- 名前（カナ） -->
      <div class="input_row">
        <div class="div_w_95">
          <label class ="input_label" for="name">名前（カナ）</label>
          <input class="text_input" type="text" name="name_kana" id="name_kana"
          value="{{old('name_kana')}}" required>
          @error('name_kana')
            <div class ="error_message">{{$message}}</div>
          @enderror
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="input_row">
        <label class="input_label" for="email">メールアドレス</label>
        <input class="text_input_w100" id="email" type="email" name="email"
        value="{{old ('email')}}" required>
        @error('email')
          <div class ="error_message">{{$message}}</div>
        @enderror
      </div>

      <!-- パスワード -->
      <div class="input_row">
        <label class="input_label" for="password">パスワード</label>
        <input class="text_input_w100" id="password" type="password" name="password" required>
        <!-- @error('password')
          <div class ="error_message">{{$message}}</div>
        @enderror -->
      </div>

      <!-- パスワード（確認） -->
      <div class="input_row">
        <label class="input_label" for="password_confirm">パスワード（確認）</label>
        <input class="text_input_w100" id="password_confirm" type="password" name="password">
        <div id="js-error-confirm" class="error_message"></div>
        @error('password')
          <div class ="error_message">{{$message}}</div>
        @enderror
      </div>

      <!-- 送信ボタン -->
      <input class="submit_btn btn_red" type="submit" value="送信">

    </form>
  </div>

  <script src="{{ asset('/js/validation.js') }}"></script>
</body>
</html>
