        

    document.addEventListener("DOMContentLoaded", renderizarProdutos);    
        // Lista de produtos como objetos
        const produtosDestaque = [
            { nome: 'Alecrim', imagem: 'images/alecrim12.jpg', preco: 7.00 },
            { nome: 'Hortelam', imagem: 'images/hotelan.jpg', preco: 4.00 },
            { nome: 'Manjericao', imagem: 'images/manjericao.jpg', preco: 14.00 },
            { nome: 'Louro', imagem: 'images/images.jpg', preco: 5.00 }
        ];

        const carrinho = [
            
        ]
        
        // Função para adicionar um produto ao HTML
        function renderizarProdutos() {
            const container = document.getElementById('produtos-container');
            
            produtosDestaque.forEach((produto, index) => {
                // Criando o HTML do produto dinamicamente
                const produtoHTML = `
                    <div class="Produto-Home">
                        <div class="Nome-Produto-Pag-Home-Produtos">
                            <h5>${produto.nome}</h5>
                        </div>
                        <div class="Foto-Produto-Pag-Home-Produtos">
                            <img src="${produto.imagem}" alt="${produto.nome}">
                        </div>
                        <div class="Descrição-Produto-Pag-Home-Produtos">
                            <p>R$ ${produto.preco.toFixed(2)}</p>
                            <button class="AddToCart-Produto-Pag-Home" data-index="${index}">Add to cart</button>
                        </div>
                    </div>
                `;
                
                // Adiciona o HTML ao container
                container.innerHTML += produtoHTML;
            });
        }
        
        // Função para adicionar o produto ao carrinho
        function addToCart(nomeProduto, imagemProduto, precoProduto) {
            const produtoExistente = carrinho.find(produto => produto.nome === nomeProduto);
            if (produtoExistente) {
                produtoExistente.quantidade++;
            } else {
                carrinho.push({ nome: nomeProduto, imagem: imagemProduto, preco: precoProduto, quantidade: 1 });
            }
     // Armazena o carrinho no localStorage
     localStorage.setItem('carrinho', JSON.stringify(carrinho));
    
    showProductAddedMessage(nomeProduto);
    updateCarrinhoPage();
        }
        
        // Função para exibir a mensagem de produto adicionado
        function showProductAddedMessage(nomeProduto) {
            const mensagem = document.createElement('div');
            mensagem.innerText = `${nomeProduto} foi adicionado ao carrinho!`;
            mensagem.style.position = 'fixed';
            mensagem.style.bottom = '20px';
            mensagem.style.right = '20px';
            mensagem.style.padding = '10px';
            mensagem.style.backgroundColor = 'green';
            mensagem.style.color = 'white';
            document.body.appendChild(mensagem);
        
            setTimeout(() => mensagem.remove(), 2000);
        }
        
        // Função para atualizar o carrinho (idêntica à anterior)
        function updateCarrinhoPage() {
            // Mantém o código de atualização do carrinho
        }
        
        // Inicializa a página com produtos
        renderizarProdutos();
        
        // Adiciona o evento "Add to cart"
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('AddToCart-Produto-Pag-Home')) {
                const index = e.target.dataset.index;
                const produto = produtosDestaque[index];
                addToCart(produto.nome, produto.imagem, produto.preco);
            }
        });

        // Função para abrir a página do carrinho
        function abrirCarrinho() {
            window.location.href = "carrinho.html";
        }

        