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
            background: radial-gradient(circle, #1c1c1c 0%, #141414 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-weight: 300;
            /* Definindo peso de fonte leve para o site todo */
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
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3rem;
            letter-spacing: 2px;
            color: #ff4081;
            text-shadow: 2px 2px 10px rgba(255, 64, 129, 0.8);
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
        }

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
            background: url('img/fundo.png') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            padding: 80px 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            /* Fonte fina */
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .hero .btn {
            background-color: #141414;
            color: white;
            padding: 15px 40px;
            font-size: 1rem;
            border-radius: 50px;
            text-transform: uppercase;
            font-weight: 300;
            /* Fonte fina */
        }

        .hero .btn:hover {
            background-color: #840143;
        }

        .btn {
            background: linear-gradient(145deg, #840143, #a50153);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: 300;
            /* Fonte fina */
            transition: all 0.3s ease;
            line-height: 1.5;
        }

        .row {
            margin-bottom: 30px;
        }

        .col {
            margin-bottom: 30px;
        }

        .btn:hover {
            box-shadow: 0 0 15px #ff4081;
            transform: translateY(-3px);
        }

        .card {
            background: linear-gradient(145deg, #1c1c1c, #232323);
            border-radius: 15px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5), -10px -10px 20px rgba(255, 255, 255, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        .card {
            margin: 0 15px 30px 15px;
        }

        .card-image img {
            object-fit: cover;
            height: 400px;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.7), -10px -10px 30px rgba(255, 255, 255, 0.1);
        }

        .card:hover .card-image img {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
        }

        .card-content {
            text-align: center;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .card:hover .card-image img {
            animation: float 3s ease-in-out infinite;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(0);
        }

        .card:hover .overlay {
            opacity: 1;
            transform: translateY(-10px);
        }
    </style>
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
                            <img src="img/ebook/atividadescristas.png" alt="Ebook Atividades Cristãs" class="responsive-img">
                            <div class="overlay">
                                <p>Atividades Cristãs</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/AtividadesCristas" class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/pequenosOracao.png" alt="Ebook Pequenos em Oração" class="responsive-img">
                            <div class="overlay">
                                <p>Pequenos em Oração</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookPequenosEmOracoes" class="btn waves-effect waves-light">Acesse</a>
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
                            <a href="https://www.clickproduto.com.br/EbookAmorEmChamas" class="btn waves-effect waves-light">Acesse</a>
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
                            <a href="https://www.clickproduto.com.br/EbookPascoa" class="btn waves-effect waves-light">Acesse</a>
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
                            <a href="https://www.clickproduto.com.br/EbookDesenhos" class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/ebook/materiaisespeciais.png" alt="Ebook Materiais Especiais" class="responsive-img">
                            <div class="overlay">
                                <p>Materiais Especiais</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <a href="https://www.clickproduto.com.br/EbookMateriaisEspeciais" class="btn waves-effect waves-light">Acesse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 E-bookeria. Todos os direitos reservados.</p>
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