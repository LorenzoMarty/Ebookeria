<?php

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

// Conexão com o banco de dados
require_once "conexao.php";
$conexao = conectar();

// Diretório onde as imagens serão salvas
$uploadDir = "img/ebook/";

// Adicionar eBook
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_ebook'])) {
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];
    $ordem = $_POST['ordem']; // Ordem de exibição

    // Upload da imagem
    if (!empty($_FILES['imagem']['name'])) {
        $fileName = time() . "_" . basename($_FILES["imagem"]["name"]);
        $filePath = $uploadDir . $fileName;

        // Verifica se o arquivo é uma imagem válida
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes) && $_FILES["imagem"]["size"] < 2 * 1024 * 1024) {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $filePath)) {
                $sql = "INSERT INTO ebooks (titulo, imagem, link, ordem) VALUES ('$titulo', '$filePath', '$link', '$ordem')";
                if ($conexao->query($sql) === TRUE) {
                    echo "<script>alert('Ebook adicionado com sucesso!'); window.location='admin.php';</script>";
                } else {
                    echo "<script>alert('Erro ao adicionar ebook!');</script>";
                }
            } else {
                echo "<script>alert('Erro ao fazer upload da imagem!');</script>";
            }
        } else {
            echo "<script>alert('Formato inválido ou tamanho excede 2MB!');</script>";
        }
    } else {
        echo "<script>alert('Por favor, selecione uma imagem!');</script>";
    }
}

// Editar eBook
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_ebook'])) {
    $id = $_POST['id_ebook'];
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];
    $ordem = $_POST['ordem']; // Ordem de exibição

    // Se uma nova imagem for enviada, faz o upload e atualiza o caminho no BD
    if (!empty($_FILES['imagem']['name'])) {
        $fileName = time() . "_" . basename($_FILES["imagem"]["name"]);
        $filePath = $uploadDir . $fileName;

        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes) && $_FILES["imagem"]["size"] < 2 * 1024 * 1024) {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $filePath)) {
                // Excluir imagem antiga
                $result = $conexao->query("SELECT imagem FROM ebooks WHERE id_ebook=$id");
                $row = $result->fetch_assoc();
                if (file_exists($row['imagem'])) {
                    unlink($row['imagem']);
                }

                $sql = "UPDATE ebooks SET titulo='$titulo', imagem='$filePath', link='$link', ordem='$ordem' WHERE id_ebook=$id";
            } else {
                echo "<script>alert('Erro ao fazer upload da nova imagem!');</script>";
            }
        } else {
            echo "<script>alert('Formato inválido ou tamanho excede 2MB!');</script>";
        }
    } else {
        $sql = "UPDATE ebooks SET titulo='$titulo', link='$link', ordem='$ordem' WHERE id_ebook=$id";
    }

    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Ebook atualizado com sucesso!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar ebook!');</script>";
    }
}

// Excluir eBook
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $result = $conexao->query("SELECT imagem FROM ebooks WHERE id_ebook=$id");
    $row = $result->fetch_assoc();

    // Exclui a imagem do diretório
    if (file_exists($row['imagem'])) {
        unlink($row['imagem']);
    }

    $sql = "DELETE FROM ebooks WHERE id_ebook=$id";
    $conexao->query($sql);
    header("Location: admin.php");
    exit();
}

// Buscar dados para edição
$ebook_edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result_edit = $conexao->query("SELECT * FROM ebooks WHERE id_ebook=$id");
    if ($result_edit->num_rows > 0) {
        $ebook_edit = $result_edit->fetch_assoc();
    }
}

// Buscar eBooks
$result = $conexao->query("SELECT * FROM ebooks ORDER BY ordem ASC");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="adm.css">
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="#" class="brand-logo center">
            <img src="img/icone.png" alt="Logo" style="height: 50px;">
        </a>
    </div>

    <div class="container">
        <h3 class="center">Gerenciar eBooks</h3>
        <a href="logout.php" class="btn red">Sair</a>

        <!-- Formulário para adicionar/editar eBook -->
        <form method="POST" enctype="multipart/form-data" class="card-panel">
            <input type="hidden" name="id_ebook" value="<?= $ebook_edit['id_ebook'] ?? ''; ?>">

            <div class="input-field">
                <input type="text" name="titulo" value="<?= $ebook_edit['titulo'] ?? ''; ?>" required>
                <label for="titulo" <?= isset($ebook_edit) ? 'class="active"' : ''; ?>>Título do eBook</label>
            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>Imagem</span>
                    <input type="file" name="imagem" accept="image/*" id="image-upload">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" id="image-name" placeholder="Selecione uma imagem"
                        readonly>
                </div>
            </div>

            <div class="input-field">
                <input type="text" name="link" value="<?= $ebook_edit['link'] ?? ''; ?>" required>
                <label for="link" <?= isset($ebook_edit) ? 'class="active"' : ''; ?>>URL do eBook</label>
            </div>

            <div class="input-field">
                <input type="number" name="ordem" value="<?= $ebook_edit['ordem'] ?? ''; ?>" required min="1">
                <label for="ordem" <?= isset($ebook_edit) ? 'class="active"' : ''; ?>>Ordem de Exibição</label>
            </div>

            <?php if ($ebook_edit): ?>
                <button type="submit" name="edit_ebook" class="btn orange waves-effect waves-light">Atualizar eBook</button>
                <a href="admin.php" class="btn grey waves-effect waves-light">Cancelar</a>
            <?php else: ?>
                <button type="submit" name="add_ebook" class="btn waves-effect waves-light">Adicionar eBook</button>
            <?php endif; ?>
        </form>

        <!-- Tabela de eBooks -->
        <table class="striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagem</th>
                    <th>Link</th>
                    <th>Ordem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_ebook']; ?></td>
                        <td><?= $row['titulo']; ?></td>
                        <td><img src="<?= $row['imagem']; ?>" width="50"></td>
                        <td><a href="<?= $row['link']; ?>" target="_blank">Ver</a></td>
                        <td><?= $row['ordem']; ?></td>
                        <td>
                            <a href="admin.php?edit=<?= $row['id_ebook']; ?>" class="btn blue">Editar</a>
                            <a href="admin.php?delete=<?= $row['id_ebook']; ?>" class="btn red"
                                onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="theme-toggle">
            <i class="material-icons" id="theme-icon">brightness_4</i>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const themeToggle = document.querySelector(".theme-toggle");
            const themeIcon = document.getElementById("theme-icon");

            // Verifica o tema atual e aplica a classe correspondente
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-theme');
                themeIcon.textContent = "brightness_7"; // Ícone para tema claro
            } else {
                document.body.classList.add('light-theme');
                themeIcon.textContent = "brightness_4"; // Ícone para tema escuro
            }

            // Alterna entre os temas claro e escuro
            themeToggle.addEventListener("click", () => {
                document.body.classList.toggle("dark-theme");
                document.body.classList.toggle("light-theme");

                // Altera o ícone conforme o tema
                if (document.body.classList.contains("dark-theme")) {
                    themeIcon.textContent = "brightness_7"; // Ícone para tema claro
                    localStorage.setItem('theme', 'dark'); // Armazena a escolha no localStorage
                } else {
                    themeIcon.textContent = "brightness_4"; // Ícone para tema escuro
                    localStorage.setItem('theme', 'light'); // Armazena a escolha no localStorage
                }
            });
        });
    </script>


</body>

</html>

<?php
$conexao->close();
?>