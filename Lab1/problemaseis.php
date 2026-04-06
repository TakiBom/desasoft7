<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Matemática - Lab #1</title>
    <style>
        /* UI: Fondo Matemático (Papel Cuadriculado) */
        body {
            background-color: #e5e7eb;
            background-image: 
                linear-gradient(#d1d5db 1px, transparent 1px),
                linear-gradient(90deg, #d1d5db 1px, transparent 1px);
            background-size: 20px 20px;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .math-card {
            background: #ffffff;
            width: 400px;
            padding: 25px;
            border: 2px solid #374151;
            box-shadow: 10px 10px 0px #374151;
            border-radius: 4px;
        }

        h2 {
            text-align: center;
            color: #111827;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #374151;
            padding-bottom: 10px;
            margin-top: 0;
        }

        .input-box {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #374151;
            font-size: 0.9rem;
        }

        input[type="number"], .op-display {
            width: 100%;
            padding: 10px;
            border: 2px solid #374151;
            background: #f9fafb;
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            box-sizing: border-box;
            text-align: right;
        }

        /* Grid de Botones tipo Calculadora Real */
        .calc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 20px;
        }

        .calc-btn {
            background: #f3f4f6;
            border: 2px solid #374151;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            font-family: 'Courier New', monospace;
        }

        .calc-btn:hover {
            background: #d1d5db;
        }

        .btn-op {
            background: #374151;
            color: white;
        }

        .btn-op:hover {
            background: #1f2937;
        }

        .btn-equal {
            grid-column: span 4;
            background: #111827;
            color: white;
            text-transform: uppercase;
        }

        .math-result {
            margin-top: 20px;
            background: #1f2937;
            color: #10b981;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

<div class="math-card">
    <h2>Calculadora</h2>
    
    <form method="post" id="calcForm">
        <div class="input-box">
            <label>Variable A:</label>
            <input type="number" name="val1" id="val1" value="<?php echo isset($_POST['val1']) ? $_POST['val1'] : ''; ?>" placeholder="0" required>
        </div>

        <div class="input-box">
            <label>Variable B:</label>
            <input type="number" name="val2" id="val2" value="<?php echo isset($_POST['val2']) ? $_POST['val2'] : ''; ?>" placeholder="0" required>
        </div>

        <div class="input-box">
            <label>Operación Seleccionada:</label>
            <select name="op" id="op_select" style="display:none;">
                <option value="sum" <?php if(isset($_POST['op']) && $_POST['op'] == 'sum') echo 'selected'; ?>>+</option>
                <option value="sub" <?php if(isset($_POST['op']) && $_POST['op'] == 'sub') echo 'selected'; ?>>-</option>
                <option value="mul" <?php if(isset($_POST['op']) && $_POST['op'] == 'mul') echo 'selected'; ?>>*</option>
                <option value="div" <?php if(isset($_POST['op']) && $_POST['op'] == 'div') echo 'selected'; ?>>/</option>
            </select>
            <div class="op-display" id="visual_op">
                <?php 
                    $visual = "Suma (+)";
                    if(isset($_POST['op'])){
                        if($_POST['op'] == 'sub') $visual = "Resta (-)";
                        if($_POST['op'] == 'mul') $visual = "Multi (×)";
                        if($_POST['op'] == 'div') $visual = "División (/)";
                    }
                    echo $visual;
                ?>
            </div>
        </div>

        <div class="calc-grid">
            <button type="button" class="calc-btn" onclick="addNum(7)">7</button>
            <button type="button" class="calc-btn" onclick="addNum(8)">8</button>
            <button type="button" class="calc-btn" onclick="addNum(9)">9</button>
            <button type="button" class="calc-btn btn-op" onclick="setOp('mul')">×</button>

            <button type="button" class="calc-btn" onclick="addNum(4)">4</button>
            <button type="button" class="calc-btn" onclick="addNum(5)">5</button>
            <button type="button" class="calc-btn" onclick="addNum(6)">6</button>
            <button type="button" class="calc-btn btn-op" onclick="setOp('sub')">-</button>

            <button type="button" class="calc-btn" onclick="addNum(1)">1</button>
            <button type="button" class="calc-btn" onclick="addNum(2)">2</button>
            <button type="button" class="calc-btn" onclick="addNum(3)">3</button>
            <button type="button" class="calc-btn btn-op" onclick="setOp('sum')">+</button>

            <button type="button" class="calc-btn" onclick="document.getElementById('val1').value=''; document.getElementById('val2').value='';">C</button>
            <button type="button" class="calc-btn" onclick="addNum(0)">0</button>
            <button type="button" class="calc-btn" onclick="setOp('div')">/</button>
            <button type="submit" name="exec" class="calc-btn btn-equal">=</button>
        </div>
    </form>

    <script>
        // Función para ayudar a llenar los inputs con los botones
        function addNum(num) {
            let v1 = document.getElementById('val1');
            let v2 = document.getElementById('val2');
            // Si el primer campo está vacío o enfocado, llena ese, si no el segundo
            if (document.activeElement.id === 'val2') {
                v2.value += num;
            } else {
                v1.value += num;
            }
        }

        function setOp(opValue) {
            document.getElementById('op_select').value = opValue;
            let text = "";
            if(opValue === 'sum') text = "Suma (+)";
            if(opValue === 'sub') text = "Resta (-)";
            if(opValue === 'mul') text = "Multi (×)";
            if(opValue === 'div') text = "División (/)";
            document.getElementById('visual_op').innerText = text;
        }
    </script>

    <?php
    if (isset($_POST['exec'])) {
        $a = intval($_POST['val1']);
        $b = intval($_POST['val2']);
        $operacion = $_POST['op'];
        $resultado = 0;
        $simbolo = "";

        switch ($operacion) {
            case "sum": $resultado = $a + $b; $simbolo = "+"; break;
            case "sub": $resultado = $a - $b; $simbolo = "-"; break;
            case "mul": $resultado = $a * $b; $simbolo = "×"; break;
            case "div": 
                $resultado = ($b != 0) ? floor($a / $b) : "Error (Div/0)"; 
                $simbolo = "/"; 
                break;
        }

        echo "<div class='math-result'>";
        echo "RESULTADO ENTERO:<br>";
        echo "<span style='color: #fff;'>$a $simbolo $b = </span>";
        echo "<b>$resultado</b>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>