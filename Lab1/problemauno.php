<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio #1 - Problema 1</title>
</head>
<body>
    <h2>Cálculo de Área y Perímetro de un Círculo</h2>
    <form method="POST">
        <label for="radio">Ingrese el radio (dato real):</label>
        <input type="number" name="radio" step="any" id="radio" required>
        <input type="submit" value="Calcular">
    </form>
    <hr>
    <?php
    // Verificamos si el usuario ha enviado el dato
    if ($_POST) {
        // 1. Entrada de datos [cite: 19]
        $radio = $_POST['radio'];
        $pi = M_PI; // Constante matemática para Pi

        // 2. Proceso: Cálculos matemáticos [cite: 19, 64]
        $area = $pi * pow($radio, 2);      // Fórmula: Área = π * r² [cite: 60]
        $perimetro = 2 * $pi * $radio;    // Fórmula: Perímetro = 2 * π * r [cite: 60]

        // 3. Salida: Mostrar resultados por pantalla [cite: 19, 65]
        echo "<h3>Resultados para el Radio: $radio</h3>";
        
        // Mostramos el área con 4 decimales
        echo "El <b>Área</b> de la circunferencia es: " . number_format($area, 4) . "<br>";
        
        // Mostramos el perímetro con 4 decimales
        echo "El <b>Perímetro</b> de la circunferencia es: " . number_format($perimetro, 4);
    }
    ?>
</body>
</html>