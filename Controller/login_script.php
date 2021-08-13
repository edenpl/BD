<?php
    session_start();
    require_once("../Repositories/Classes/Conexion.php");
    $connection = new Conexion;

    $conn = $connection->OpenConnection();

    $username = $_POST["user"];
    $password = $_POST["password"];

    $_SESSION["username"] = "$username";
    
       
    $query1 = "SELECT id FROM personal WHERE username='$username' AND password='$password'";
    $query2 = "SELECT id FROM cliente_usuario WHERE username='$username' AND password='$password'";

	$result1=mysqli_query($conn, $query1);
    $result2=mysqli_query($conn, $query2);
    
    if(mysqli_num_rows($result1) > 0)
	{
        $rol = 2;
        $_SESSION['rol'] = $rol;
        echo 2;
    }
        
    else if (mysqli_num_rows($result2) > 0)
    {
        $rol = 0;
        $_SESSION['rol'] = $rol;
        echo 0;
    }
    else
    {
        echo 3;
    }
    
    $connection->CloseConnection();
    exit;
?>