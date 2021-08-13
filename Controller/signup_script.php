<?php
    session_start();

    require_once("../Repositories/Classes/Conexion.php");

    $connection = new Conexion;
    $conn = $connection->OpenConnection();

    $name = $_POST["newName"];
    $last_name = $_POST["newLastName"];
    $age = $_POST["newAge"];
    $creditcard = $_POST["newCreditCard"];
    $cellphone = $_POST["newCellphone"];
    $address = $_POST["newAddress"];
    $email = $_POST["newEmail"];
    $username = $_POST["newUser"];
    $password = $_POST["newPassword"];
    

    $_SESSION["username"] = "$username";
    
               
    $query = "INSERT INTO  cliente_usuario (`nombre`, `apellido`, `edad`, `tarjeta_credito`, `telefono`, `direccion`, `e_mail`, `username`, `password`) 
    VALUES ('$name', '$last_name', '$age', '$creditcard', '$cellphone', '$address', '$email', '$username', '$password');";

    $result = mysqli_query($conn, $query);
    

    $connection->CloseConnection($conn);
    exit;
?>