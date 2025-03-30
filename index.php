<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>E-bookeria</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Hero Section -->
    <div class="hero">
        <h1>
            <img src="img/logo.png" width="164px" height="164px" alt="Logo">
        </h1>
        <p>E-bookeria, a loja de ebooks que você precisa!</p>
    </div>

    <!-- Content Section -->
    <div class="content">
        <div class="container" id="ebooks">
            <h2 class="section-title">Ebooks</h2>
            <hr>
            <div class="row">
                <!-- Card 1 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/atividadescristas.png" alt="Ebook Atividades Cristãs"
                                class="responsive-img">
                            <div class="overlay">
                                <p>Atividades Cristãs</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/AtividadesCristas"
                                class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/pequenosOracao.png" alt="Ebook Pequenos em Oração"
                                class="responsive-img">
                            <div class="overlay">
                                <p>Pequenos em Oração</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookPequenosEmOracoes"
                                class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/amoremchamas.png" alt="Ebook Amor em Chamas" class="responsive-img">
                            <div class="overlay">
                                <p>Amor em Chamas</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookAmorEmChamas"
                                class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/pascoa.png" alt="Ebook Páscoa" class="responsive-img">
                            <div class="overlay">
                                <p>Páscoa</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookPascoa"
                                class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/2000desenhos.png" alt="Ebook 2000 Desenhos" class="responsive-img">
                            <div class="overlay">
                                <p>2000 Desenhos para colorir</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookDesenhos"
                                class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/materiaisespeciais.png" alt="Ebook Materiais Especiais"
                                class="responsive-img">
                            <div class="overlay">
                                <p>Materiais Especiais</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookMateriaisEspeciais"
                                class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="theme-toggle">
                <i class="material-icons" id="theme-icon">brightness_4</i>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 E-bookeria. Todos os direitos reservados.</p>
    </div>

    <!-- Import Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Animação da hero section
        gsap.from(".hero", {
            opacity: 0,
            y: -100,
            duration: 1,
            ease: "power3.out"
        });

        // Animação da seção de ebooks
        gsap.from(".section-title", {
            opacity: 0,
            y: -50,
            duration: 1,
            delay: 0.5,
            ease: "power3.out"
        });

        gsap.from(".card", {
            opacity: 0,
            y: 50,
            duration: 1,
            stagger: 0.2, // Garante que cada card será animado com um pequeno atraso
            ease: "power3.out",
            delay: 1
        });

        // Animação do footer
        gsap.from(".footer", {
            opacity: 0,
            y: 50,
            duration: 1,
            delay: 1.5,
            ease: "power3.out"
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.querySelector(".theme-toggle");
    const themeIcon = document.getElementById("theme-icon");

    // Alterna entre os temas claro e escuro
    themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("dark-theme");

        // Altera o ícone conforme o tema
        if (document.body.classList.contains("dark-theme")) {
            themeIcon.textContent = "brightness_7"; // Ícone para tema claro
        } else {
            themeIcon.textContent = "brightness_4"; // Ícone para tema escuro
        }
    });
});

</script>

</html>