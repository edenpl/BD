<?php session_start(); ?>

<html>
  <head>
    <title> Inicio </title>
    <?php
      include_once("../Services/include_important.php"); 
      require_once("../../Repositories/Classes/conexion.php");
      include_once("../Models/Stock.php");
      include_once("../Models/Persona.php");
      $connection = new Conexion;

    ?>
  </head>

  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbar">
        <div class="navbar-nav">
            <a class="nav-link active" href="#">Inicio</a>
            <a class="nav-link" href="#">ABCD</a>
            <a class="nav-link" href="#">DEFG</a>
            <a class="nav-link" href="#">GHIJ</a>

            
        </div>
      </div>
      <button class="btn btn-danger" id="logout_button" align="right"> Cerrar Sesión </button>
    </div>
  </nav>

    <br>

    <div class="container">

    <?php
        $conn = $connection->OpenConnection();
        $id = $_SESSION["id"];
        // $query = "SELECT DISTINCT ev.id \"id_evento\" , ev.nombre \"nombre_evento\"
        //           FROM sesion S, sesion_usuario SU, Evento ev 
        //           WHERE (id_usuario = $id AND S.id = SU.id_sesion) AND ev.id = S.id_evento";
        
        $query = "SELECT id_stock, nombre, cantidad, precio, id_sucursal
                  FROM stock_productos";
        $query2 = "SELECT id, nombre, apellido, edad, telefono FROM";
        
        if ($_SESSION["rol"] == "2")
        {
            $query2 = $query2 . " personal";
        }
        else
        {
            $query2 = $query2 . " cliente_usuario";
        }
    
        $result = mysqli_query($conn, $query);
    
        $result2 = mysqli_query($conn, $query2);
        $temp = mysqli_fetch_array($result2);
        $usuario = new Persona($temp, 0);
    ?>

    
    <h1 class="display-4">Bienvenido a tu Inicio, <?php echo $usuario->nombre;?></h1>
    <br><br>

    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> <h4> Producto </h4> </th>
                <th scope="col"> <h4> Stock Disponible </h4> </th>
                <th scope="col"> <h4> Precio del Producto </h4> </th>
                <th scope="col"> <h4> Sede </h4> </th>
            </tr>
        </thead>
        
        <tbody>
        
            <?php
                $ids = [];
                        
                while ($registro = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    
                    $current_stock = new Stock( $registro);
                    $datos = $current_stock->get_values();
                    echo "<th scope=\"row\"> ";
                        echo $registro["nombre"];
                    echo "</th>";

                    echo "<td>";
                        echo $registro["cantidad"];
                    echo "</td>";
                        

                    echo "<td>";
                    echo 's/.';
                    echo $registro['precio'];
                    echo "</td>";

                    echo "<td>";
                    echo $registro['id_sucursal'];
                    echo "</td>";

                    echo "<td>";
                    ?>
                    <a href="admin_view.php?id_stock=<?php echo $current_stock->id_stock; echo "?id_usuario=" ?>" 
                    class="btn btn-secondary">Reservar</a>

                    <?php
                    
                    echo "</td>";

                    echo "</tr>";
                    array_push($ids,$registro["nombre"]);
                }

            ?>

        </tbody>
    </table>


    </div>
    
    <br>
        
    <div class="container">
    <a href="#" class="btn btn-success"> Comprar</a>
    </div>
    <br><br><br>
    </body>
    
</html>







<script>


// Cerrar sesión
$('#logout_button').click(function()
{
    $.ajax({
        url:'main_view.php?logout=true',
        type:'GET',
        success: function() 
        {
            alertify.confirm('¿Desea cerrar su sesión?',
            function()
            {
                alertify.set('notifier','position', 'top-center');
                alertify.message("Hasta luego.", 4);
                window.setTimeout(function()
                {
                    window.location="login_page.php";    
                } , 2500); 
            },
            function()
            {
                alertify.set('notifier','position', 'top-center');
                alertify.message("Siga con nosotros.", 4);
            }

            ).setHeader("Atención");
            
    	}
    })

})
</script>

<style>
    .ajs-message { color: #31708f;  background-color: #d9edf7;  border-color: #31708f; }
</style>


<?php


function session_finish()
{
    if ($_GET['logout'] = 'true')
    {
        session_unset();
        session_destroy();
    }
}
?>
