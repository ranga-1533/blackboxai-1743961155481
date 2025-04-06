// JavaScript for interactivity

// Example: Form validation for login and registration
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                alert('Please fill in all fields.');
                e.preventDefault();
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!fullName || !email || !phone || !password || !confirmPassword) {
                alert('Please fill in all fields.');
                e.preventDefault();
            } else if (password !== confirmPassword) {
                alert('Passwords do not match.');
                e.preventDefault();
            }
        });
    }
});