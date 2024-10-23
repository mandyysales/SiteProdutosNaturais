document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function (event) {
        event.preventDefault(); 
        
        let valid = true;

        const nameInput = document.getElementById('name');
        if (nameInput.value.trim() === "") {
            alert("O campo Nome é obrigatório.");
            valid = false;
        }

        const usernameInput = document.getElementById('username');
        if (usernameInput.value.trim() === "") {
            alert("O campo Usuário é obrigatório.");
            valid = false;
        }

        const emailInput = document.getElementById('email');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            alert("Por favor, insira um e-mail válido.");
            valid = false;
        }

        const phoneInput = document.getElementById('phone');
        const phonePattern = /^\d{10,11}$/;
        if (!phonePattern.test(phoneInput.value)) {
            alert("Por favor, insira um telefone válido com 10 ou 11 dígitos.");
            valid = false;
        }

        const passwordInput = document.getElementById('password');
        if (passwordInput.value.trim().length < 6) {
            alert("A senha deve ter no mínimo 6 caracteres.");
            valid = false;
        }

        if (valid) {
            alert("Cadastro realizado com sucesso!");
            form.submit(); 
        }
    });
});
