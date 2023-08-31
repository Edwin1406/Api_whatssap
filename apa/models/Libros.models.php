<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Libros
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Libros";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($libro_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Libros WHERE libro_id = $libro_id";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($titulo, $fecha_publicacion, $editorial, $genero, $sinopsis, $autor_id,)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Libros(titulo,fecha_publicacion,editorial,genero,sinopsis,autor_id,) values ( '$titulo', '$fecha_publicacion', '$editorial', '$genero', '$sinopsis', $autor_id )";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($libro_id, $titulo, $fecha_publicacion, $editorial, $genero, $sinopsis, $autor_id,)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Libros set titulo='$titulo',fecha_publicacion='$fecha_publicacion',editorial='$editorial',genero='$genero',sinopsis='$sinopsis',autor_id=$autor_id where libro_id= $libro_id";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($libro_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Libros where libro_id = $libro_id";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
