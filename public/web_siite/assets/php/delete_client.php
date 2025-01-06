<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include("cn.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: adm_show.php");
        exit();
    } else {
        echo "Erro ao excluir o cliente.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: adm_show.php");
    exit();
}
?>
