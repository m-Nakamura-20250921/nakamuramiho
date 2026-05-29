/*
* Welcome to your app's main JavaScript file!
*
* This file will be included onto the page via the importmap() Twig function,
* which should already be in your base.html.twig.
*/
// import './styles/app.css';
// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'bootstrap';


document.addEventListener('DOMContentLoaded', function () {
   // nameにsote探す
   const sortSelect = document.querySelector('select[name*="[sort]"]');
   // 価格スライダー
   const fromSlider = document.getElementById('fromSlider');
   const minNum = document.getElementById('min_num');


   const toSlider = document.getElementById('toSlider');
   const max_num = document.getElementById('max_num');
  
   // 検索フォーム取得
   const searchForm = document.getElementById('search_form');


   // セレクトボックスが変更されたらフォームを自動で送信
   if (sortSelect && searchForm) {
       sortSelect.addEventListener('change', function() {
           searchForm.submit();
       });
    }


   // 初期値
   if (fromSlider && minNum) {
       minNum.textContent = fromSlider.value;
   }
   if (toSlider && max_num) {
       max_num.textContent = toSlider.value;
   }
   // スライダーmin
   if (fromSlider && minNum) {
       fromSlider.addEventListener('input', function(e) {
           minNum.textContent = e.target.value;
       });
   }
   // スライダーmax
   if (toSlider && max_num) {
       toSlider.addEventListener('input', function(e) {
           max_num.textContent = e.target.value;
       });
   }
});



