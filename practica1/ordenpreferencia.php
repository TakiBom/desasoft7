<?php
// Caso 1: Sin paréntesis
// La multiplicación (*) tiene prioridad sobre la suma (+)
$resultado1 = 2 + 3 * 4; 
echo "1. Sin paréntesis (2 + 3 * 4): El resultado es $resultado1\n";
// Explicación: 3 * 4 = 12 -> 12 + 2 = 14
echo "<br>";
// Caso 2: Con paréntesis
// Los paréntesis obligan a PHP a sumar primero
$resultado2 = (2 + 3) * 4;
echo "2. Con paréntesis (2 + 3) * 4: El resultado es $resultado2\n";
// Explicación: 2 + 3 = 5 -> 5 * 4 = 20
?>