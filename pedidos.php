<?php
// Módulo básico para registrar pedidos de una tienda en línea

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cliente = trim($_POST["cliente"] ?? "");
    $producto = trim($_POST["producto"] ?? "");
    $cantidad = (int) ($_POST["cantidad"] ?? 0);

    if ($cliente === "" || $producto === "" || $cantidad <= 0) {
        $mensaje = "Debe completar correctamente todos los campos.";
    } else {
        $mensaje = "Pedido registrado correctamente para " . htmlspecialchars($cliente);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de pedidos</title>
</head>
<body>
    <h1>Gestión de pedidos</h1>

    <?php if ($mensaje !== ""): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="cliente">Nombre del cliente:</label>
        <input type="text" id="cliente" name="cliente" required>

        <br><br>

        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" required>

        <br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required>

        <br><br>

        <button type="submit">Registrar pedido</button>
    </form>
</body>
</html>
