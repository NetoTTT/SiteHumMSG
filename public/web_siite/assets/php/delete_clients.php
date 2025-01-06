<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected_clients']) && !empty($_POST['selected_clients'])) {
        include("cn.php");

        $selected_clients = $_POST['selected_clients'];

        $placeholders = implode(',', array_fill(0, count($selected_clients), '?'));
        $sql = "DELETE FROM clientes WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(str_repeat('i', count($selected_clients)), ...$selected_clients);

        if ($stmt->execute()) {
            header("Location: adm_show.php");
            exit();
        } else {
            echo "Erro ao excluir os clientes.";
        }

        $stmt->close();
        $conn->close();
    } else {
        header("Location: adm_show.php");
        exit();
    }
} else {
    header("Location: adm_show.php");
    exit();
}
?>
