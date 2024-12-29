<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>E-bookeria</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #1c1c1c !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            padding: 0 20px;
        }

        .navbar .brand-logo {
            color: #840143 !important;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .navbar .nav-wrapper a:hover {
            color: #840143 !important;
        }

        .content {
            flex: 1;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            color: #840143;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .row {
            margin-bottom: 0;
        }

        /* Custom Horizontal Rule */
        hr {
            border: 0;
            height: 2px;
            background: #840143;
            margin: 40px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background-color: #1c1c1c;
            color: #888;
            text-align: center;
            padding: 15px 0;
            margin-top: 20px;
            font-size: 0.9rem;
            position: relative;
        }

        .footer p {
            margin: 0;
            letter-spacing: 0.5px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title,
        .card,
        .footer {
            animation: fadeIn 0.8s ease forwards;
        }

        .hero {
            background-color: #840143;
            color: white;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero .btn {
            background-color: #141414;
            color: white;
            padding: 15px 40px;
            font-size: 1rem;
            border-radius: 50px;
            text-transform: uppercase;
        }

        .hero .btn:hover {
            background-color: #840143;
        }

        .card-content {
            padding: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

    </style>
</head>

<body>

    <div class="hero">
        <h1><img src="img/logo.png" width="164px" height="164px"></h1>
        <p>E-bookeria a loja de ebooks que você precisa!</p>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container" id="ebooks">
            <h2 class="section-title">Ebooks</h2>
            <hr>
            <div class="row">
                <!-- Card 1 -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/atividadescristas.png" alt="Ebook 1">
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/AtividadesCristas" class="btn waves-effect waves-light" style="background-color: #840143; width: 100%; height: 100%; display: block;">Comprar Agora</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/pequenosOracao.png" alt="Ebook 2">
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookPequenosEmOracoes" class="btn waves-effect waves-light" style="background-color: #840143; width: 100%; height: 100%; display: block;">Comprar Agora</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/amoremchamas.png" alt="Ebook 3">
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookAmorEmChamas" class="btn waves-effect waves-light" style="background-color: #840143; width: 100%; height: 100%; display: block;">Comprar Agora</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/pascoa.png" alt="Ebook 4">
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookPascoa" class="btn waves-effect waves-light" style="background-color: #840143; width: 100%; height: 100%; display: block;">Comprar Agora</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/2000desenhos.png" alt="Ebook 5">
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookDesenhos" class="btn waves-effect waves-light" style="background-color: #840143; width: 100%; height: 100%; display: block;">Comprar Agora</a>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/materiaisespeciais.png" alt="Ebook 6">
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookMateriaisEspeciais" class="btn waves-effect waves-light" style="background-color: #840143; width: 100%; height: 100%; display: block;">Comprar Agora</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 SeuEbook. Todos os direitos reservados.</p>
    </div>

    <!-- Import Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
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
</script>

</html>