
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Horario Escolar</title>
</head>
<body>
    <?php
    //este es el archivo facil usando lo que sabia es el momento
    //esto declara los array y los array dimensionales
    $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];

    $horas = [
        "8:15 - 9:10",
        "9:10 - 10:05",
        "10:05 - 11:00",
        "11:00 - 11:30",
        "11:30 - 12:25",
        "12:25 - 13:20",
        "13:20 - 14:15",
        "14:15 - 15:00"
    ];

    $horario = [
        ["IPEII", "DWENC", "IPEII", "DWESV", "DIINW"],
        ["DWESV", "DWENC", "DWENC", "DWESV", "OPT"],
        ["DWESV", "DIINW", "DWENC", "OPT", "DASP"],
        ["RECREO"],
        ["PI", "DIINW", "DIINW", "SASP", "DWESV"],
        ["DEAPW", "PI", "DEAPW", "OPT", "DWESV"],
        ["DWENC", "DEAPW", "DEAPW", "IPEII", "Tutorización Dual"],
        ["DWENC", "", "", "", ""]
    ];
    ?>

    <table border="1" style="border-collapse: collapse; text-align: center;">
        <thead>
            <tr>
                <th>Horario</th>
                <?php 
                //esto es lo que muestra los dias en la tabla 
                foreach ($dias as $dia) {
                    echo "<th>$dia</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            
            //este bucle muestra las horas del horario y las pone en negrita con la etiqueta 
            foreach ($horas as $indice_hora => $hora_texto) {
                echo "<tr>";
                echo "<td><strong>$hora_texto</strong></td>";
                // si el indice de la hora es igual a 3 que en este caso es el del recreo pone un color que decido.
                if ($indice_hora == 3) {
                    echo '<td colspan="5" style="background-color: #0055ff;">RECREO</td>';
                } else {
                    //que el indice no councido con esa franja horaria declaro una variable color y recorro el array bidimensional de asignaturas
                    // cuando recorre se array y es igual lo que coincide con el valor que esta recorriendo se pone en la variable se pone en la variable color el color que he querido yo.
                    foreach ($horario[$indice_hora] as $asignatura) {
                        $color = "";
                        if ($asignatura == "DWENC") {
                            $color = "#df3d3a";
                        } elseif ($asignatura == "DWESV") {
                            $color = "#df8e32";
                        } elseif ($asignatura == "DEAPW") {
                            $color = "#e6d65d";
                        } elseif ($asignatura == "DIINW") {
                            $color = "#66ca89";
                        } elseif ($asignatura == "DASP") {
                            $color = "#73a8e8";
                        } elseif ($asignatura == "SASP") {
                            $color = "#c084fc";
                        } elseif ($asignatura == "IPEII") {
                            $color = "#ca4d94";
                        } elseif ($asignatura == "PI") {
                            $color = "#ddd6fe";
                        } elseif ($asignatura == "OPT") {
                            $color = "#4885d0";
                        } elseif ($asignatura == "Tutorización Dual") {
                            $color = "#99f6e4";
                        } else {
                            $color = "transparent";
                        }
                        if ($color != "transparent") {
                            echo "<td style='background-color: $color;'>$asignatura</td>";
                        } else {
                            echo "<td></td>";
                        }
                    }
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th colspan="2">Materias</th>
            </tr>
            <tr>
                <th>Abreviatura</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <tr><td style="background-color: #ffcccb;">DWENC</td><td>Desarrollo web en entorno cliente</td></tr>
            <tr><td style="background-color: #fed7aa;">DWESV</td><td>Desarrollo web en entorno servidor</td></tr>
            <tr><td style="background-color: #fef08a;">DEAPW</td><td>Despliegue de aplicaciones web</td></tr>
            <tr><td style="background-color: #bbf7d0;">DIINW</td><td>Diseño de interfaces web</td></tr>
            <tr><td style="background-color: #bfdbfe;">DASP</td><td>Digitalización aplicada a los sectores productivos</td></tr>
            <tr><td style="background-color: #c084fc;">SASP</td><td>Sostenibilidad aplicada al sistema productivo</td></tr>
            <tr><td style="background-color: #fbcfe8;">IPEII</td><td>Itinerario personal para la empleabilidad II</td></tr>
            <tr><td style="background-color: #ddd6fe;">PI</td><td>Proyecto Intermodular</td></tr>
            <tr><td style="background-color: #cbd5e1;">OPT</td><td>Optativa</td></tr>
        </tbody>
    </table>

</body>
</html>
