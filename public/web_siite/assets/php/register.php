<?php

include("cn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registro cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao tentar cadastrar registro: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
