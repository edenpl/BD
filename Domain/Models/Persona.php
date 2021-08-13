<?php

class Persona
{
    public  $id;
    public  $nombre;
    public  $apellido;
    public  $edad;
    public  $telefono;
    

    public function __construct($result_array, $permiso)
    {
        $this->id = $result_array["id"];
        $this->nombre = $result_array["nombre"];
        $this->apellido = $result_array["apellido"];
        $this->edad = $result_array["edad"];
        $this->telefono = $result_array["telefono"];
        $this->permisos = $permiso;
    }

}