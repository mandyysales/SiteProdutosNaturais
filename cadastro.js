document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o envio do formulário padrão
        
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
            // Coletar os dados do formulário
            const formData = new FormData(form);

            // Enviar os dados via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'gerenciaCadastro.php', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Resposta do PHP
                    alert(xhr.responseText); // Exibe a resposta (sucesso ou erro)
                    if (xhr.responseText.includes("Cadastro realizado com sucesso")) {
                        window.location.href = "login.html"; // Redireciona para a página de login
                    }
                } else {
                    alert("Ocorreu um erro ao processar o cadastro.");
                }
            };

            // Enviar os dados para o PHP
            xhr.send(formData);
        }
    });
});
