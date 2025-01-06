<?php
session_start();

include("cn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $email = $_POST['username'];
        $senha = $_POST['password'];

        $sql = "SELECT * FROM clientes WHERE email='$email' AND senha='$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nome'];
            echo "<script>alert('Login Validado'); window.location.href = 'login.html';</script>";
            exit();
        } else {
            echo "<script>alert('Erro ao Logar, Usuario não encontrado'); window.location.href = login.php';</script>";
        }

        $conn->close();
    } else {
        echo "<script>alert('Preencha os campos'); window.location.href = 'login.php';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="FormLogin.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.html">Dev Care</a>
        </div>
    </nav>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" method="POST" class="sign-in-form">
                    <h2 class="signin title">Login</h2>
                    <?php if (!empty($error)): ?>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" value="Entrar" class="btn solid">
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>
