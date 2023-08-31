<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Libros.models.php");
error_reporting(0);

$Libros = new Libros;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Libros->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $libro_id = $_POST["libro_id"];
        $datos = array();
        $datos = $Libros->uno($libro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        // $libro_id = $_POST["libro_id"];
        $titulo = $_POST["titulo"];
        $editorial = $_POST["editorial"];
        $genero = $_POST["genero"];
        $sinopsis = $_POST["sinopsis"];
        $fecha_publicacion = $_POST["fecha_publicacion"];
        $autor_id = $_POST["autor_id"];

        $datos = array();
        $datos = $Libros->Insertar( $titulo, $editorial, $genero, $sinopsis,$fecha_publicacion ,$autor_id);
        echo json_encode($datos);
        break;


    // case 'insertar':
    //     // $libro_id = $_POST["libro_id"];
    //     $titulo = $_POST["titulo"];
    //     $fecha_publicacion = $_POST["fecha_publicacion"];
    //     $editorial = $_POST["editorial"];
    //     $genero = $_POST["genero"];
    //     $sinopsis = $_POST["sinopsis"];
    //     $autor_id = $_POST["autor_id"];
    
    //     $datos = array();
    //     $datos = $Libros->Insertar($titulo, $fecha_publicacion, $editorial, $genero, $sinopsis, $autor_id);
    
    //     if ($datos) {
    //         echo json_encode($datos);
    //     } else {
    //         $errorMensaje = "Error al insertar el libro en la base de datos.";
    //         echo json_encode(array("error" => $errorMensaje));
    //     }
    //     break;
    


        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $libro_id = $_POST["libro_id"];
        $titulo = $_POST["titulo"];
        $editorial = $_POST["editorial"];
        $genero = $_POST["genero"];
        $sinopsis = $_POST["sinopsis"];
        $fecha_publicacion = $_POST["fecha_publicacion"];
        $autor_id = $_POST["autor_id"];;
        $datos = array();
        $datos = $Libros->Actualizar($libro_id, $titulo, $editorial, $genero, $sinopsis,$fecha_publicacion ,$autor_id);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $libro_id = $_POST["libro_id"];
        $datos = array();
        $datos = $Libros->eliminar($libro_id);
        echo json_encode($datos);
        break;
}
