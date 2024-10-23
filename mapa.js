document.getElementById("form").addEventListener("submit", function(event) {
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    
    const nomeError = document.getElementById("nome-error");
    const emailError = document.getElementById("email-error");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let isValid = true;

    if (nome.length < 3 || !emailRegex.test(email)) {
        if (nome.length < 3) {
            nomeError.style.display = "block"; 
        } else {
            nomeError.style.display = "none";
        }

        if (!emailRegex.test(email)) {
            emailError.style.display = "block";
        } else {
            emailError.style.display = "none";
        }

        isValid = false; 
    } else {
        nomeError.style.display = "none";
        emailError.style.display = "none";
    }

    if (isValid) {
        const dados = `Nome: ${nome}\nEmail: ${email}`;
        const blob = new Blob([dados], { type: 'text/plain' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'dados_usuario.txt';
        link.click();

        alert("Inscrição realizada com sucesso!");
    } else {
        event.preventDefault();
    }
});