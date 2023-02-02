<?php
    include("db.php");
    $user = $_POST['user'];
    $pw = $_POST['password'];
    $em = $_POST['email'];
    $r = $_POST['rol'];

    $pantes = $salt.$p1;
    print_r hash_algos("sha256",$pw);

    $stmt = $conn -> prepare("INSERT INTO users()VALUES(?,?,?,?)");
    $stmt->execute()





?>