<!DOCTYPE html>
<html lang="es">
<head>

	<title>Sistema de Ventas Online</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/login.css">
    <?php
      include_once("../Services/include_important.php"); 
      require_once("../../Repositories/Classes/conexion.php");
      
      $connection = new Conexion;
    ?>
	
    
</head>


<body>

<header>
    <h1 class="display-3" id=titulo>Bienvenido a Electronic Store</h1>
</header>

<form id="login_form">
  <div class="form-group">

  <div class="col">
        <label >Ingresa tu nombre de usuario: </label>
        <input type="text" class="form-control" placeholder="Nombre de usuario" id="user" name="user">
    </div>

    <div class="col">
        <label >Ingresa tu clave de usuario: </label>
        <input type="password" class="form-control" placeholder="Clave de Usuario" id="password" name="password">

    </div>
  </div>
  <button type="button" class="btn btn-primary" id ="submit_button">Iniciar Sesión</button>
</form>

<div id="registrarse-enlace">
    ¿No eres usuario de Electronic Store?
    <a href="signup.php">Regístrate</a>
</div>
<script>
    function formEsValido()
    {
        var nombre_de_usuario = $("#user");
        var clave_de_usuario = $("#password");

        if(nombre_de_usuario.val() == "")
        {
            var op = alertify.alert("Debe colocar su nombre de usuario.").setHeader("Atención");

            return false;
            
        }
        else if(clave_de_usuario.val() == "")
        {
            alertify.alert("Debe colocar su clave de usuario" ).setHeader("Atención");
            return false;
        }

        return true;
    }

    $(document).ready( function() 
    { 
        $("#submit_button").click( function() 
        {
            if(formEsValido())
            {
                cadena = $("#login_form").serialize();

                $.ajax(
                {
                    type: 'POST',
                    url: "../../Controller/login_script.php",
                    data: cadena,
                    success: function(data) 
                    {
                        if(data == 0)
                        {
                            alertify.success("Inicio de sesión exitoso");

                            window.setTimeout(function()
                            {
                                window.location="main_view.php";
                            } , 2000);
                        }
                        else if (data == 1)
                        {
                            alertify.success("Inicio de sesión exitoso");

                            window.setTimeout(function()
                            {
                                window.location="admin_view.php";
                            } , 2000);
                        }
                        else if (data == 2)
                        {
                            alertify.success("Inicio de sesión exitoso");

                            window.setTimeout(function()
                            {
                                window.location="employer_view.php";
                            } , 2000);
                        }
                        else if (data ==3)
						{
							alertify.error("Los datos ingresados son incorrectos.")
						}
                        else
                        {
                            alertify.error("Ha ocurrido un error." )
                            alertify.error(data )
                        }
                    }
                    
                })
            }
            
        })
    })
</script>
</body>
</html>

