<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
    <title>
        Produtos Naturais
    </title>
    <link rel="stylesheet" href="estiloPaginaPrincipal.css">   
</head>
<body>
    <header id="header">
        <nav class="header-menu-superior">          
        </nav>

        <h3>Nome Loja</h3>
        
        <nav class="header-menu-navegacao">
        </nav>
    </header>

    <main>        
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">          
                <img src="images/carrosel/alecrim4.png" style="width:100%;" alt="alecrim">
                <div class="text">
                    <h3>Alecrim</h3>
                    <p>O alecrim (Rosmarinus officinalis) é uma erva aromática nativa da região mediterrânea, amplamente utilizada na culinária e na medicina tradicional. Suas folhas finas e verdes exalam um aroma fresco e marcante, sendo comum em pratos de carnes, pães e sopas. Além do sabor característico, o alecrim possui propriedades medicinais, como ação antioxidante e anti-inflamatória. Na aromaterapia, é conhecido por estimular a memória e a concentração, sendo associado também ao alívio do estresse e da fadiga. Cultivado facilmente, é uma planta resistente que pode crescer em jardins ou vasos domésticos.
                    </p>
                </div>
            </div>        
        
            <div class="mySlides fade">                            
                <img src="images/carrosel/alecrim12.png" style="width:100%;" alt="alecrim">
                <div class="text">
                    <h3>Alecrim</h3>
                    <p>O alecrim (Rosmarinus officinalis) é uma erva aromática nativa da região mediterrânea, amplamente utilizada na culinária e na medicina tradicional. Suas folhas finas e verdes exalam um aroma fresco e marcante, sendo comum em pratos de carnes, pães e sopas. Além do sabor característico, o alecrim possui propriedades medicinais, como ação antioxidante e anti-inflamatória. Na aromaterapia, é conhecido por estimular a memória e a concentração, sendo associado também ao alívio do estresse e da fadiga. Cultivado facilmente, é uma planta resistente que pode crescer em jardins ou vasos domésticos.
                    </p>
                </div>
            </div> 
        
            <div class="mySlides fade">           
                <img src="images/carrosel/alecrim4.png" style="width:100%;" alt="alecrim">
                <div class="text">
                    <h3>Alecrim</h3>
                    <p>O alecrim (Rosmarinus officinalis) é uma erva aromática nativa da região mediterrânea, amplamente utilizada na culinária e na medicina tradicional. Suas folhas finas e verdes exalam um aroma fresco e marcante, sendo comum em pratos de carnes, pães e sopas. Além do sabor característico, o alecrim possui propriedades medicinais, como ação antioxidante e anti-inflamatória. Na aromaterapia, é conhecido por estimular a memória e a concentração, sendo associado também ao alívio do estresse e da fadiga. Cultivado facilmente, é uma planta resistente que pode crescer em jardins ou vasos domésticos.
                    </p>
                </div>
            </div> 
        
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)" onmouseover="changeButton(this)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)"  onmouseover="changeButton(this)">&#10095;</a>
        </div>
        <br>
        
        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <div id="destaques" class="Pagina-Home-Produtos">
            <div class="Texto-Pag-Home-Produtos">
                <h1>Produtos em destaque</h1>
                <p>Conheça os produtos que os clientes estão comprando!</p>
                <p>Nossos produtos vêm dos melhores produtores do país.</p>
                <h2>Quer ver mais produtos?</h2>
                <p>Clique no botão abaixo para ver mais</p>
                <button class="VerProdutos-Botao" onclick="produtos.html">Nossos Produtos</button>
            </div>
            <div class="Produtos-Pag-Home-Produtos" id="produtos-container">

            </div>
        </div>           
    </main>

    <a class="scroll-to-top" href="#header">↑</a>

    <footer>
        <p>© 2024 Nome da Loja</p>
    </footer>

    <script src="produtosPaginaHome.js"></script>
    <script src="carrossel.js"></script>
    <script src="menu.js"></script>
</body>
</html>