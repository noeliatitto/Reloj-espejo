<!DOCTYPE html>
<html>
<head>
    <title>Reloj en el Espejo</title>
</head>
<body>

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

</body>
</html>