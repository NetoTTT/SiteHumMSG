<?php
session_start();

include("cn.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_password = trim($_POST['admin_password']);

    if (!empty($admin_password)) {
        $sql = "SELECT * FROM adm WHERE  senha='$admin_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: adm_show.php");
            exit();
        } else {
            $error = 'Senha de administrador incorreta!';
        }
    } else {
        $error = 'Por favor, insira a senha de administrador.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login do Administrador</title>
</head>
<body>
    <h2>Login do Administrador</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label for="admin_password">Senha do Administrador:</label>
            <input type="password" id="admin_password" name="admin_password" required>
        </div>
        <div>
            <input type="submit" value="Entrar">
        </div>
    </form>
    <?php if (!empty($error)): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>
</body>
</html>
