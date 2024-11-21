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
            // Coletar dados do formulário
            const username = usernameInput.value.trim();
            const password = passwordInput.value.trim();

            // Criar a requisição AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'login.php', true); // Envia para login.php

            // Definir o cabeçalho da requisição
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Configurar o callback para a resposta do servidor
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText); // Resposta JSON

                    if (response.success) {
                        alert(response.message); // Mensagem de sucesso
                        window.location.href = "paginaPrincipal.php"; // Redirecionar
                    } else {
                        alert(response.message); // Mensagem de erro
                    }
                } else {
                    alert("Erro ao processar o login.");
                }
            };

            // Enviar os dados no formato chave=valor
            xhr.send(`username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`);
            console.log(`Enviando: username=${username}, password=${password}`);
        }
    });
});