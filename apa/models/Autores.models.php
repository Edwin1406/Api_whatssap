<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Autores
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Autores";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($autor_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Autores WHERE autor_id = $autor_id";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($nombre, $apellido, $fecha_nacimiento, $nacionalidad, $genero_favorito, $biografia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Autores(nombre,apellido,fecha_nacimiento,nacionalidad,genero_favorito,biografia) values ( '$nombre', '$apellido', '$fecha_nacimiento', '$nacionalidad', '$genero_favorito', '$biografia')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($autor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad, $genero_favorito, $biografia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Autores set nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',nacionalidad='$nacionalidad',genero_favorito='$genero_favorito',biografia='$biografia' where autor_id= $autor_id";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($autor_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Autores where autor_id = $autor_id";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
