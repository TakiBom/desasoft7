<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio #1 - Problema 2</title>
</head>
<body>
    <h2>Conversor de Pulgadas a Centímetros</h2>
    <form method="POST">
        <label for="pulgadas">Ingrese la cantidad en pulgadas:</label>
        <input type="number" name="pulgadas" step="any" id="pulgadas" required>
        <input type="submit" value="Convertir">
    </form>
    <hr>
    <?php
    // Verificamos si el usuario envió el formulario
    if ($_POST) {
        // 1. Entrada: Leer las pulgadas ingresadas [cite: 215]
        $pulgadas = $_POST['pulgadas'];
        // 2. Proceso: Realizar la conversión [cite: 213]
        // Constante de conversión: 1 pulgada = 2.54 cm 
        $factor = 2.54;
        $centimetros = $pulgadas * $factor;
        // 3. Salida: Imprimir el Resultado [cite: 213]
        echo "<h3>Resultado de la Conversión:</h3>";
        echo "<b>$pulgadas</b> pulgadas equivalen a <b>" . number_format($centimetros, 2) . "</b> centímetros.";
    }
    ?>
</body>
</html>