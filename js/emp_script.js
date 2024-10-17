document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('form');


    form.addEventListener('submit', function (e) {

        const username = document.querySelector('input[name="username"]').value.trim();
        const password = document.querySelector('input[name="password"]').value.trim();
        const role = document.querySelector('input[name="role"]').value.trim();


        let isValid = true;
        let errorMessage = '';


        if (username.length < 3) {
            isValid = false;
            errorMessage += 'Username must be at least 3 characters long.\n';
        }

        if (password.length > 0 && password.length < 6) {
            isValid = false;
            errorMessage += 'Password must be at least 6 characters long.\n';
        }

        if (role === '') {
            isValid = false;
            errorMessage += 'Role is required.\n';
        }

        if (!isValid) {
            alert(errorMessage);
            e.preventDefault();
        }
    });
});