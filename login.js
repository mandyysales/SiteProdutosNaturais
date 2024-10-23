document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); 

        let valid = true;

        const usernameInput = document.getElementById('username');
        if (usernameInput.value.trim() === "") {
            alert("O campo Usuário é obrigatório.");
            valid = false;
        }

        const passwordInput = document.getElementById('password');
        if (passwordInput.value.trim().length < 6) {
            alert("A senha deve ter no mínimo 6 caracteres.");
            valid = false;
        }

        if (valid) {
            alert("Login realizado com sucesso!");
            form.submit(); 
        }
    });
});
