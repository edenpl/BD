<?php
function reservar()
{
    require_once("../Repositories/Classes/Conexion.php");


    $connection = new Conexion;
    $conn = $connection->OpenConnection();


    $id_stock = $_GET["id_stock"];
    $id_usuario = $_GET["id"];
    $query3 = "INSERT INTO reservacion (`id_cliente`, `id_producto`) 
    VALUES ('$usuario->id', '$id_stock');";
    $result3 = mysqli_query($conn, $query3);
}
    
?>