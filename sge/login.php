<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        User Name <input type="text" name="user" id="user">
        Contraseña <input type="text" name="passw" id="passw">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    require("db.php");
    session_start();

    // Este es el objeto de tipo conexion para la BD $conn->
    if(isset($_POST['passw'])){
        $pcheck = $salt.$_POST['passw'];
        $pcifrado = hash("sha256",$pcheck);
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=:us AND password=:pw");
        $stmt->bindParam(':us', $_POST['user']);
        $stmt->bindParam(':pw', $pcifrado);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        if(count($stmt->fetchAll())==1){
            $_SESSION['autorizado']=true;
            $conn = null;
            header("Location:home.php");
        }  
            
    }
?>
