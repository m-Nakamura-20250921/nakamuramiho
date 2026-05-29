<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録情報確認</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
  <div id ="container">
    <p class="title">以下の内容で登録します。</p>

    <!-- 名前 -->
    <div class="input_row">
      <div class ="div_w_95">
        <label class ="input_label" for="name">名前</label>
        <input class="text_input" type="text" name="name" id="name"
        value ="{{session('register_data.name')}}" readonly>
      </div>
      <div class="div_w_5"></div>
    </div>

      <!-- 名前（カナ） -->
    <div class="input_row">
      <div class ="div_w_95">
        <label class ="input_label" for="name">名前（カナ）
        </label>
        <input class="text_input" type="text" name="name" id="name"
        value ="{{session('register_data.name_kana')}}" readonly>
      </div>
      <div class="div_w_5"></div>
    </div>

      <!-- メール -->
    <div class="input_row">
      <div class ="div_w_95">
        <label class ="input_label" for="email">メールアドレス</label>
        <input class="text_input_w100" type="email" name="email" id="email"
        value ="{{session('register_data.email')}}" readonly>
      </div>
      <div class="div_w_5"></div>
    </div>

    <!-- 登録 -->
    <form method="post" action="{{route('register.complete')}}">
      @csrf
      <input class="submit_btn" type="submit" value="登録">
    </form>

    <!-- 戻る -->
    <form method="post" action="{{route('register.back')}}">
      @csrf
      <input type="hidden" name="name" value="{{session('register_data.name')}}">
      <input type="hidden" name="name_kana" value="{{session('register_data.name_kana')}}">
      <input type="hidden" name="email" value="{{session ('register_data.email')}}">
        
      <button type="submit" class="submit_btn">戻る</button>
    </form>
  </div>
</body>
</html>
