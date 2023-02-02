<?php 
require('check_login.php');
require('db.php');

$stmt = $conn->prepare("SELECT * FROM golfistas");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
echo '<a href="newGolfer.php">Crear nuevo golfista</a> </br>';
foreach ($result as $row) {
    print $row["id"] ." - " .$row["nombre"] . " - " . $row["nacionalidad"]. " - "; 
    print $row["altura"] .$row["debut"] .$row["palmares"]. " ";
    print "<a href='editarGolfer.php?id=".$row["id"]."'>editar</a> <a href='borrarGolfer.php'>Borrar</a> <br/>" ;
}

?>