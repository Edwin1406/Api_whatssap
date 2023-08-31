<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Autores.models.php");
error_reporting(0);

$Autores = new Autores;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Autores->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $autor_id = $_POST["autor_id"];
        $datos = array();
        $datos = $Autores->uno($autor_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        // $autor_id = $_POST["autor_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];
        $genero_favorito = $_POST["genero_favorito"];
        $biografia = $_POST["biografia"];

        $datos = array();
        $datos = $Autores->Insertar( $nombre, $apellido, $fecha_nacimiento, $nacionalidad, $genero_favorito, $biografia);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $autor_id = $_POST["autor_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];
        $genero_favorito = $_POST["genero_favorito"];
        $biografia = $_POST["biografia"];
        $datos = array();
        $datos = $Autores->Actualizar($autor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad, $genero_favorito, $biografia);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $autor_id = $_POST["autor_id"];
        $datos = array();
        $datos = $Autores->Eliminar($autor_id);
        echo json_encode($datos);
        break;
}
