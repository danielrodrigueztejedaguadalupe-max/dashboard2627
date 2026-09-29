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
    //este es el horario usando un archivo asociativo y foreach
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
        "Lunes"     => ["IPEII", "DWESV", "DWESV", "RECREO", "PI", "DEAPW", "DWENC", "DWENC"],
        "Martes"    => ["DWENC", "DWENC", "DIINW", "RECREO", "DIINW", "PI", "DEAPW", ""],
        "Miércoles" => ["IPEII", "DWENC", "DWENC", "RECREO", "DIINW", "DEAPW", "DEAPW", ""],
        "Jueves"    => ["DWESV", "DWESV", "OPT", "RECREO", "SASP", "OPT", "IPEII", ""],
        "Viernes"   => ["DIINW", "OPT", "DASP", "RECREO", "DWESV", "DWESV", "Tutorización Dual", ""]
    ];

    $materias = [
        "DWENC" => "Desarrollo web en entorno cliente",
        "DWESV" => "Desarrollo web en entorno servidor",
        "DEAPW" => "Despliegue de aplicaciones web",
        "DIINW" => "Diseño de interfaces web",
        "DASP"  => "Digitalización aplicada a los sectores productivos",
        "SASP"  => "Sostenibilidad aplicada al sistema productivo",
        "IPEII" => "Itinerario personal para la empleabilidad II",
        "PI"    => "Proyecto Intermodular",
        "OPT"   => "Optativa"
    ];

    $colores = [
        "DWENC"              => "#df3d3a",
        "DWESV"              => "#df8e32",
        "DEAPW"              => "#e6d65d",
        "DIINW"              => "#66ca89",
        "DASP"               => "#73a8e8",
        "SASP"               => "#c084fc",
        "IPEII"              => "#ca4d94",
        "PI"                 => "#ddd6fe",
        "OPT"                => "#4885d0",
        "Tutorización Dual" => "#99f6e4"
    ];
    ?>

    <table border="1" style="border-collapse: collapse; text-align: center;">
        <thead>
            <tr>
                <th>Horario</th>
                <?php 
                foreach (array_keys($horario) as $dia) {
                    echo "<th>$dia</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($horas as $indice_hora => $hora_texto) {
                echo "<tr>";
                echo "<td><strong>$hora_texto</strong></td>";
                
                if ($indice_hora == 3) {
                    echo '<td colspan="5" style="background-color: #0055ff;">RECREO</td>';
                } else {
                    foreach ($horario as $dia => $bloques) {
                        $asignatura = $bloques[$indice_hora];
                        if (!empty($asignatura) && isset($colores[$asignatura])) {
                            $color = $colores[$asignatura];
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
            <?php
            foreach ($materias as $codigo => $descripcion) {
                $color_leyenda = isset($colores[$codigo]) ? $colores[$codigo] : "transparent";
                echo "<tr>";
                echo "<td style='background-color: $color_leyenda; text-align: center; font-weight: bold;'>$codigo</td>";
                echo "<td>$descripcion</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

