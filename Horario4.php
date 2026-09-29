<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario Escolar</title>
</head>
<body>

    <?php//este es el archivo que relaciona el horario 4 con las funcionesh4 en archivos diferentes
     require_once 'funciones.php'; ?>

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
                        $color = obtenerColor($asignatura, $colores);

                        if ($color !== "transparent") {
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
                $color_leyenda = obtenerColor($codigo, $colores);
                
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
