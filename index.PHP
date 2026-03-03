<!DOCTYPE html>
<html>
<head>
    <title>Reloj en el Espejo</title>

    <style>
        body {
            margin: 0;
            font-family: 'Calibri', sans-serif;
            background: linear-gradient(to right, #cf4e4e, rgb(197, 132, 74));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #3d1648;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #d10065;
            font-size: 60px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border-radius: 25px;
            border: 1px solid #390327;
            font-size: 16px;
            text-align: center;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 8px rgba(108,99,255,0.3);
            outline: none;
        }

        input[type="submit"] {
            background-color: #6c63ff;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #574fd6;
            transform: translateY(-2px);
        }

        h3 {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            background-color: #1e5993;
            padding: 10px;
            border-radius: 10px;
        }
    </style>

</head>
<body>

<div>
<h2>Calcular Hora Real</h2>

<form method="POST">
    Ingrese hora vista en el espejo (HH:MM):
    <input type="text" name="hora" required placeholder="Ej: 10:25">
    <input type="submit" value="Calcular">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $entrada = $_POST["hora"];

    if (!preg_match("/^\d{1,2}:\d{2}$/", $entrada)) {
        echo "<h3 style='color:red;'>Formato incorrecto. Use HH:MM</h3>";
    } 
    else {

        list($hora, $minuto) = explode(":", $entrada);

        $hora = (int)$hora;
        $minuto = (int)$minuto;

        if ($hora > 12 || $minuto > 60) {
            echo "<h3 style='color:red;'>Formato de hora o minuto no válido</h3>";
        }
        else {

            $hora_real = 12 - $hora;
            $minuto_real = 60 - $minuto;

            if ($minuto_real == 60) {
                $minuto_real = 0;
            }

            if ($hora_real == 0) {
                $hora_real = 12;
            }

            echo "<h3>Hora real: " .
                str_pad($hora_real, 2, "0", STR_PAD_LEFT) . ":" .
                str_pad($minuto_real, 2, "0", STR_PAD_LEFT) .
                "</h3>";
        }
    }
}
?>

</div>

</body>
</html>

</body>

</html>
