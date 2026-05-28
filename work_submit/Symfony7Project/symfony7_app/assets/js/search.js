/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // nameにsote探す
    const sortSelect = document.querySelector('select[name*="[sort]"]');
    
    // 検索フォーム取得
    const searchForm = document.getElementById('search_form');

    // セレクトボックスが変更されたらフォームを自動で送信
    if (sortSelect && searchForm) {
        sortSelect.addEventListener('change', function() {
            searchForm.submit();
        });
    }
});