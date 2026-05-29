document.addEventListener("DOMContentLoaded", () => {
    const togglePassword = document.querySelector('#toggle-password');
    const passwordInput = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eye_icon');

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // パスワードが見えるとき
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                // パスワードが隠れるとき
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            }
        });
    };
});