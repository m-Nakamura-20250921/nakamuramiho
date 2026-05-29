document.addEventListener('DOMContentLoaded',() => {
    const targets = ["name", "name_kana", "email", "password"];
    let skipValidationOnRefocus = false;

    targets.forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;

        el.addEventListener("input", (event) => {
            if (skipValidationOnRefocus) {
                skipValidationOnRefocus = false;
                return;
            }

            if (!event.target.checkValidity()) {
                skipValidationOnRefocus = true;
            }
        });         
    });
});



document.addEventListener('DOMContentLoaded', () => {
    const passwordEl = document.getElementById("password");
    const confirmEl = document.getElementById("password_confirm");
    const errorDisplay = document.getElementById("js-error-confirm");
    const form = document.querySelector('form');

    function CheckPassword() {
        if (passwordEl.value !== confirmEl.value && confirmEl.value !== "") {
            // 一致しない場合：メッセージを表示
            errorDisplay.textContent = "パスワードが一致しません。";
        } else {
            // 一致した場合：メッセージを隠す
            errorDisplay.textContent = "";
        }
    }

    // 入力するたびにチェック
    passwordEl.addEventListener("input", CheckPassword);
    confirmEl.addEventListener("input", CheckPassword);
});