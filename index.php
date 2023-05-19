<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada - Aula 11</title>
    <style>

/* Utilizada para estética da página (Fonte, alinhamento, bgcolor) */
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            background: linear-gradient(to right, #c1acb3, #c1acb3);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

/* Utilizada para as box(caixas) onde você digita seu número, redimensionando, mudando largura */

        #num {
            padding: 5px;
            border-radius: 5px;
            border: none;
            outline: none;
            width: 30%;
            margin-bottom: 20px;
        }
        form {
            padding: 1em;

/* Utilizada para as box(caixas) do botão Enviar */

        }
        input[type="submit"] {
            padding: 5px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            background-color: #000000;
            color: #fff;
            font-weight: bold;
        }
        .multiplication-table {
            margin-top: 25px;

/* Utilizada para manter o alinhamento das linhas (Centralizar e quebrar)  */
        }
        .multiplication-row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;

/* Utilizada como background de cada digito */

        }
        .multiplication-item {
            background-color: #000000;
            padding: 5px 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1><p style="color:black">Tabuada Desejada</h1></p>
    <div class="box_form">
        <form action="index.php" method="GET">
            <div>
                <label for="number"><h2><p style="color:black">Insira o número que deseja: </label><br></p></h2>
                <input type="number" name="num" id="num" value="<?php echo (isset($_GET['num'])) ? $_GET['num'] : '' ?>" placeholder="Por favor, insira o número desejado!">
            </div>
            <div>
                <label for="repetitions"><h2><p style="color:black">Insira a quantidade de vezes de repetição desejada: </label><br></p></h2>
                <input type="number" name="repetitions" id="repetitions" value="<?php echo (isset($_GET['repetitions'])) ? $_GET['repetitions'] : '' ?>" placeholder="Por favor, insira a quantidade de vezes de repetição desejada!"></br>
    </br><input type="submit" value="Enviar">
        </form>
        <div class="multiplication-table">


<!-- A função: generateMultiplicationRow gera uma única linha de uma tabela de multiplicação, recebendo três parâmetros (numero, repeticoes, repetitions) -->

        <?php
        function generateMultiplicationRow($numero, $repetitions, $repeticoes = 1) {
            if ($repeticoes <= $repetitions) {

// echo serve para printar as tags HTML que formam uma linha da tabela de multiplicação.

                echo "<div class='multiplication-row'>";

// numero: O número que será multiplicado.

                echo "<div class='multiplication-item'>$numero</div>";
                echo "<div class='multiplication-item'>x</div>";

// repetitions: O número total de repetições desejadas.
// repeticoes: O número atual desejado. 

                echo "<div class='multiplication-item'>$repeticoes</div>";
                echo "<div class='multiplication-item'>=</div>";
                echo "<div class='multiplication-item'>" . ($repeticoes * $numero) . "</div>";
                echo "</div>";
                generateMultiplicationRow($numero, $repetitions, $repeticoes + 1);
            }
        }
        
// empty: Usada para verificar se uma variável está vazia.

// Se $_GET['num'] e $_GET['repetitions'] não estiverem vazios,significa que os valores desejados foram digitados.

// Após a verificação se as variáveis não estiverem vazia, os valores são atribuídos às variáveis locais ($numero, $repetitions).   
// para serem usados como argumentos na função ja mencionada: generateMultiplicationRow($numero, $repetitions).
    
        if (!empty($_GET['num']) && !empty($_GET['repetitions'])) {
            $numero = $_GET['num'];
            $repetitions = $_GET['repetitions'];
            generateMultiplicationRow($numero, $repetitions);
        }
        ?>
        </div>
    </div>
</body>
</html>