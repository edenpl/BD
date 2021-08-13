<?php

class Stock
{
    public  $id_stock;
    public  $nombre;
    public  $cantidad;
    public  $precio;
    public  $id_sucursal;

    public function __construct($result_array)
    {
        $this->id_stock = $result_array["id_stock"];
        $this->nombre = $result_array["nombre"];
        $this->cantidad = $result_array["cantidad"];
        $this->precio = $result_array["precio"];
        $this->id_sucursal = $result_array["id_sucursal"];
    }

    public function get_values()
    {
        $values = [

            "id_stock" => "$this->id_stock",
            "nombre" => "$this->nombre",
            "cantidad" => "$this->cantidad",
            "precio" => "$this->precio",
            "id_sucursal" => "$this->id_sucursal",
        ];
        return $values;
    }

}

