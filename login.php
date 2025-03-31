<?php
session_start();

// Defina as credenciais fixas
$admin_email = "admin@ebookeria.com";
$admin_senha = "gustavo0311";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se as credenciais estão corretas
    if ($email === $admin_email && $senha === $admin_senha) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $erro = "E-mail ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: url('img/fundo.png') no-repeat center center/cover;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            backdrop-filter: blur(5px);
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: rgba(30, 30, 30, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h3 {
            font-size: 2rem;
            color: #ff4081;
            text-shadow: 2px 2px 10px rgba(255, 64, 129, 0.8);
            margin-bottom: 20px;
        }

        .input-field input {
            width: 100%;
            background: #333;
            border-radius: 8px;
            border: none;
            color: #fff;
            padding: 10px;
            margin: 10px 0;
        }

        .input-field label {
            color: #ff4081;
            display: block;
            text-align: left;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .btn {
            width: 100%;
            background: linear-gradient(145deg, #840143, #a50153);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 400;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            cursor: pointer;
        }

        .btn:hover {
            box-shadow: 0 0 15px #ff4081;
            transform: translateY(-3px);
        }

        .red-text {
            color: #ff4d4d;
            font-size: 0.9rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Login do Administrador</h3>

        <?php if (isset($erro)): ?>
            <p class="red-text"><?= $erro; ?></p>
        <?php endif; ?>

        <form method="POST">
            <div class="input-field">
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-field">
                <label for="senha">Senha</label>
                <input type="password" name="senha" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>
</body>

</html>