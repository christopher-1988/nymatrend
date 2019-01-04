if ($stmt=$mysqli->prepare($cnslt)) {
    /* obtener un array asociativo */
    while ($fila = $stmt->fetch_assoc()) {
        printf ("%s (%s)\n", $fila["cod_coll"], $fila["name_coll"]);
    }
    /* liberar el conjunto de resultados */
    $stmt->free();
}

            
$city = "Amersfoort";

/* crear una sentencia preparada */
if ($stmt = $mysqli->prepare("SELECT District FROM City WHERE Name=?")) {

    /* ligar parámetros para marcadores */
    $stmt->bind_param("s", $city);

    /* ejecutar la consulta */
    $stmt->execute();

    /* ligar variables de resultado */
    $stmt->bind_result($district);

    /* obtener valor */
    $stmt->fetch();

    printf("%s is in district %s\n", $city, $district);

    /* cerrar sentencia */
    $stmt->close();
}
