document.addEventListener('DOMContentLoaded', () => {
    const icon = document.getElementById('visibility');
    const pass = document.getElementById('password');

    icon.addEventListener('click', () => {
        if (icon.classList.contains('fa-eye')) {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            pass.type='text';
        } else {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            pass.type='password';
        }
    });
});