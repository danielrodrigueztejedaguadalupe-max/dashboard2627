<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario Escolar</title>
</head>
<body>

    <?php
    //Este es el archivo dos arrays asociativos y usando for 
    $horas = [
        "H1" => "8:15 - 9:10",
        "H2" => "9:10 - 10:05",
        "H3" => "10:05 - 11:00",
        "H4" => "11:00 - 11:30",
        "H5" => "11:30 - 12:25",
        "H6" => "12:25 - 13:20",
        "H7" => "13:20 - 14:15",
        "H8" => "14:15 - 15:00"
    ];

    $horario = [
        "Lunes"     => ["H1" => "IPEII", "H2" => "DWESV", "H3" => "DWESV", "H4" => "RECREO", "H5" => "PI", "H6" => "DEAPW", "H7" => "DWENC", "H8" => "DWENC"],
        "Martes"    => ["H1" => "DWENC", "H2" => "DWENC", "H3" => "DIINW", "H4" => "RECREO", "H5" => "DIINW", "H6" => "PI", "H7" => "DEAPW", "H8" => ""],
        "Miércoles" => ["H1" => "IPEII", "H2" => "DWENC", "H3" => "DWENC", "H4" => "RECREO", "H5" => "DIINW", "H6" => "DEAPW", "H7" => "DEAPW", "H8" => ""],
        "Jueves"    => ["H1" => "DWESV", "H2" => "DWESV", "H3" => "OPT",   "H4" => "RECREO", "H5" => "SASP", "H6" => "OPT",   "H7" => "IPEII", "H8" => ""],
        "Viernes"   => ["H1" => "DIINW", "H2" => "OPT",   "H3" => "DASP",  "H4" => "RECREO", "H5" => "DWESV", "H6" => "DWESV", "H7" => "Tutorización Dual", "H8" => ""]
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

    $claves_dias = array_keys($horario);
    $claves_horas = array_keys($horas);
    $valores_horas = array_values($horas);
    ?>

    <table border="1" style="border-collapse: collapse; text-align: center;">
        <thead>
            <tr>
                <th>Horario</th>
                <?php 
                for ($i = 0; $i < count($claves_dias); $i++) {
                    echo "<th>" . $claves_dias[$i] . "</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($claves_horas); $i++) {
                $id_hora = $claves_horas[$i];
                $texto_hora = $valores_horas[$i];

                echo "<tr>";
                echo "<td><strong>$texto_hora</strong></td>";
                
                if ($id_hora == "H4") {
                    echo '<td colspan="5" style="background-color: #0055ff;">RECREO</td>';
                } else {
                    for ($j = 0; $j < count($claves_dias); $j++) {
                        $dia = $claves_dias[$j];
                        $asignatura = $horario[$dia][$id_hora];

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
            $claves_materias = array_keys($materias);
            for ($i = 0; $i < count($claves_materias); $i++) {
                $codigo = $claves_materias[$i];
                $descripcion = $materias[$codigo];
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
