document.addEventListener("DOMContentLoaded", loadMenu);

function loadMenu() {
    fetch('menu.html')
        .then(response => response.text())
        .then(data => {
            document.querySelector('header').innerHTML = data;
            initNavigation();  // Chame a função para adicionar os links
        })
        .catch(error => console.error('Erro ao carregar o menu:', error));
}

function initNavigation() {
    const navElementTop = document.querySelector('.header-menu-superior'); // Seleciona a classe correta
    const navElementNavigation = document.querySelector('.header-menu-navegacao'); // Seleciona a classe correta

    if (navElementTop && navElementNavigation) {
        const linksSuperior = [
            { href: 'sobre.html', text: 'Sobre nós' },
            { href: 'sobre.html', text: 'Contato' },
            { href: 'login.html', text: 'Login' },
        ];

        const linksNavegacao = [
            { href: 'paginaPrincipal.php', text: 'Inicio' },
            { href: 'paginaPrincipal.php#destaques', text: 'Destaques' },
            { href: 'produto.html', text: 'Produtos' },
            { href: 'carrinho.html', text: 'Carrinho' },
        ];

        linksSuperior.forEach(link => createLink(link, navElementTop));
        linksNavegacao.forEach(link => createLink(link, navElementNavigation));
    } else {
        console.error("Não foi possível encontrar os menus de navegação.");
    }
}

function createLink(link, parentElement) {
    const a = document.createElement('a');
    a.href = link.href;
    a.textContent = link.text;
    a.addEventListener('click', handleNavClick);

    const div = document.createElement('div'); // Envolva os links em divs para manter a estrutura CSS
    div.appendChild(a);

    parentElement.appendChild(div);
}

function handleNavClick(event) {
    event.preventDefault(); // Evita a navegação padrão
    window.location.href = this.href; // Redireciona para o link clicado
}
