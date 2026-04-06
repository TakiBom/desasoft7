<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de entrada del dato</title>
</head>
<body>
    <h2>Registro de Usuario - Problema #5</h2>
    <form method="post" action="problemacinco.php">
        Ingrese su nombre:
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        Ingrese su Edad:
        <input type="text" name="edad" id="edad" required>
        <br><br>
        <input type="submit" value="confirmar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 1. TRIMMING: Eliminar espacios vacíos accidentales al inicio o al final 
        $nombreCrudo = trim($_POST['nombre']);
        $edadCruda = trim($_POST['edad']);
        // 2. SANITIZACIÓN: Limpiar caracteres no deseados para evitar scripts maliciosos 
        $nombreSanitizado = htmlspecialchars($nombreCrudo);
        // 3. NORMALIZACIÓN: Asegurar que los datos sigan el mismo formato (ej. todo en minúsculas) 
        $nombreFinal = strtolower($nombreSanitizado);
        // Convertir edad a entero para validación
        $edad = intval($edadCruda);
        echo "<h3>Resultado del Procesamiento</h3>";
        echo "El nombre (normalizado) es: " . $nombreFinal . "<br>";
        // Validación de mayoría de edad para elecciones 2028 
        if (isset($edad) && $edad >= 18) {
            echo "Usted tiene $edad años. Puede votar en las próximas elecciones 2028. ";
        } else {
            echo "Usted tiene $edad años. Usted no es mayor de edad. ";
        }
    }
    ?>
</body>
</html>