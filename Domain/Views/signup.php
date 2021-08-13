<!DOCTYPE html>
<html lang="es">
<head>

	<title>Sistema de Ventas Online</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/signup.css">
    <?php
      include_once("../Services/include_important.php"); 
      require_once("../../Repositories/Classes/conexion.php");
      
      $connection = new Conexion;
    ?>
    
</head>
<body>

<header>
    <h1 class="display-4" id=titulo>Bienvenido a Delta Store</h1>
</header>

<form id="signup_form">
  <div class="form-group">
  <div class="col">
        <label >Ingresa su nombres: </label>
        <input type="text" class="form-control" placeholder="Nombres " id="newName" name="newName">
    </div>
    <div class="col">
        <label >Ingresa sus apellidos: </label>
        <input type="text" class="form-control" placeholder="Apellidos" id="newLastName" name="newLastName">
    </div>
    <div class="col">
        <label >Ingresa su edad: </label>
        <input type="text" class="form-control" placeholder="Edad" id="newAge" name="newAge">
    </div>
    <div class="col">
        <label >Ingresa su tarjeta de crédito: </label>
        <input type="text" class="form-control" placeholder="Tarjeta de Crédito" id="newCreditCard" name="newCreditCard">
    </div>
    <div class="col">
        <label >Ingresa su número de celular: </label>
        <input type="text" class="form-control" placeholder="Número de Celular" id="newCellphone" name="newCellphone">
    </div>
    <div class="col">
        <label >Ingresa su dirección: </label>
        <input type="text" class="form-control" placeholder="Dirección" id="newAddress" name="newAddress">
    </div>
    <div class="col">
        <label >Ingresa su correo electrónico: </label>
        <input type="text" class="form-control" placeholder="Correo Electrónico" id="newEmail" name="newEmail">
    </div>
    <div class="col">
        <label >Ingresa un nombre de usuario: </label>
        <input type="text" class="form-control" placeholder="Nombre de usuario" id="newUser" name="newUser">
    </div>
    <div class="col">
        <label >Ingresa una clave de usuario: </label>
        <input type="password" class="form-control" placeholder="Clave de Usuario" id="newPassword" name="newPassword">
    </div>
    
  </div>

  <br>
  <button type="button" class="btn btn-primary" id ="submit_button">Registrarse</button>
  
</form>
</body>
</html>

<script>

function validateForm()
    {
        var nombres = $("#newName");
        var apellidos = $("#newLastName");
        var edad = $("#newAge");
        var credit_card = $("#newCreditCard");
        var cellphone = $("#newCellphone");
        var address = $("#newAddress");
        var email = $("#newEmail");
        var user = $("#newUser");
        var password = $("#newPassword");

        if( nombres.val() == "")
        {
            var op = alertify.alert("Debe colocar sus nombres." );
            return false;
        }
        else if( apellidos.val() == "")
        {
            var op = alertify.alert("Debe colocar sus apellidos." );
            return false;
        }
        else if( edad.val() == "")
        {
            var op = alertify.alert("Debe colocar su edad." );
            return false;
        }
        else if( credit_card.val() == "")
        {
            var op = alertify.alert("Debe colocar su tarjeta de credito." );
            return false;
        }
        else if( cellphone.val() == "")
        {
            var op = alertify.alert("Debe colocar su numero de celular.");
            return false;
        }
        else if( address.val() == "")
        {
            var op = alertify.alert("Debe colocar su direccion." );
            return false;
        }
        else if( email.val() == "")
        {
            var op = alertify.alert("Debe colocar su email." );
            return false;
        }
        else if( user.val() == "")
        {
            var op = alertify.alert("Debe colocar su Username." );
            return false;
        }
        
        else if ( password.val() == "")
        {
            var op = alertify.alert("Coloque las claves de usuario." );
            return false;
        }

        return true;
    }



    $(document).ready( function() 
    { 
        $("#submit_button").click( function() 
        {
        
            if(validateForm())
            {
                cadena = $("#signup_form").serialize();
                alert(cadena);

                $.ajax(
                {
                    
                    type: 'POST',
                    url: "../../Controller/signup_script.php",
                    data: cadena,
                    success: function(data) 
                    {
                        if(data==0)
                        {
                            /*alertify.set('notifier','position', 'top-center');*/
                            message = alertify.success("El registro se realizó exitosamente");
                            
                            window.setTimeout(function()
                            {
                                message = alertify.success("Redirigiendo a la página principal ...");
                            } , 3000);

                            window.setTimeout(function()
                            {
                                window.location="../Views/main_view.php";
                            } , 6000);
                            
                        }
                        else 
						{
							alertify.error("No se pudo registrar sus usuario.")
						}
                    }
                    
                })
            }
        })
    })

</script>