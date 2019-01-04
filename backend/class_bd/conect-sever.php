<?php
	
//$link = mysqli_connect("www.colegiopadrediaz.com.ve","colegiop_joseph","Colegio2015","colegiop_padrediaz") or die("Error " . mysqli_error($link));


$mysqli = new mysqli("www.nymastrend.com.ve","nymastre_develop","55AlexandeR4487", "nymastre_dbproject");
/* comprueba la conexion */
if (mysqli_connect_errno()) {
    echo("Connect failed: %s\n". mysqli_connect_error());
    exit();
}

/* comprobar si el servidor sigue vivo */
//if ($mysqli->ping()) {
    //printf ("¡La conexión está bien!\n");
//} else {
    //printf ("Error: %s\n", $mysqli->error);
//}

//$mysqli->close();


	
?>