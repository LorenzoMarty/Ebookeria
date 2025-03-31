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

    <?php
    require_once "conexao.php";
    $conexao = conectar();

    // Modificado para ordenar os ebooks pela coluna 'ordem'
    $sql = "SELECT * FROM ebooks ORDER BY ordem ASC";
    $result = executarSQL($conexao, $sql);
    ?>

    <!-- Content Section -->
    <div class="content">
        <div class="container" id="ebooks">
            <h2 class="section-title">Ebooks</h2>
            <hr>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col s12 m6 l4">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?= $row['imagem']; ?>" alt="<?= $row['titulo']; ?>" class="responsive-img">
                                <div class="overlay">
                                    <p><?= $row['titulo']; ?></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <a href="<?= $row['link']; ?>" class="btn waves-effect waves-light">Acesse</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
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
